<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\ExportService;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderItems.product', 'orderItems.cookedFood']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                      
                      // Only search by phone if the column exists
                      if (\Illuminate\Support\Facades\Schema::hasColumn('users', 'phone')) {
                          $userQuery->orWhere('phone', 'like', "%{$search}%");
                      }
                  });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Payment status filter
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Payment method filter
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }

        // Date filter
        if ($request->filled('date_range')) {
            $dateRange = $request->date_range;
            $now = now();
            
            switch ($dateRange) {
                case 'today':
                    $query->whereDate('created_at', $now->toDateString());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [
                        $now->copy()->startOfWeek(),
                        $now->copy()->endOfWeek()
                    ]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', $now->month)
                          ->whereYear('created_at', $now->year);
                    break;
                case 'year':
                    $query->whereYear('created_at', $now->year);
                    break;
            }
        }

        // Custom date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Amount range filter
        if ($request->filled('amount_min')) {
            $query->where('total_amount', '>=', $request->amount_min);
        }
        if ($request->filled('amount_max')) {
            $query->where('total_amount', '<=', $request->amount_max);
        }

        // Sort functionality
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if (in_array($sortBy, ['created_at', 'total_amount', 'status', 'payment_status', 'order_number'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->orderBy('created_at', 'desc'); // Default sort
        }

        $orders = $query->paginate(15)->withQueryString();
        
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'orderItems.cookedFood']);
        
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully'
        ]);
    }

    /**
     * Export orders to CSV
     */
    public function exportCSV(Request $request)
    {
        $orders = Order::with(['user', 'orderItems.product', 'orderItems.cookedFood'])
                      ->orderBy('created_at', 'desc')
                      ->get();

        $headers = ['Order ID', 'Customer', 'Email', 'Total Amount', 'Status', 'Item Count', 'Date'];
        $rows = $orders->map(function($order) {
            return [
                '#' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
                $order->user->name ?? 'N/A',
                $order->user->email ?? 'N/A',
                '₹' . number_format($order->total_amount, 2),
                ucfirst($order->status),
                $order->orderItems->count(),
                $order->created_at->format('Y-m-d H:i')
            ];
        })->toArray();

        return ExportService::toCSV($rows, 'orders-' . now()->format('Y-m-d-H-i-s') . '.csv', $headers);
    }

    /**
     * Export orders to PDF
     */
    public function exportPDF(Request $request)
    {
        $orders = Order::with(['user', 'orderItems.product', 'orderItems.cookedFood'])
                      ->orderBy('created_at', 'desc')
                      ->get();

        $headers = ['Order ID', 'Customer', 'Email', 'Total Amount', 'Status', 'Item Count', 'Date'];
        $rows = $orders->map(function($order) {
            return [
                '#' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
                $order->user->name ?? 'N/A',
                $order->user->email ?? 'N/A',
                '₹' . number_format($order->total_amount, 2),
                ucfirst($order->status),
                $order->orderItems->count(),
                $order->created_at->format('Y-m-d H:i')
            ];
        })->toArray();

        $html = ExportService::generateHTMLTable(
            $headers,
            $rows,
            'Orders Report - ' . now()->format('M d, Y')
        );

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 15,
        ]);
        
        $mpdf->WriteHTML($html);
        
        return response($mpdf->Output('', 'S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="orders-' . now()->format('Y-m-d-H-i-s') . '.pdf"',
        ]);
    }
}
