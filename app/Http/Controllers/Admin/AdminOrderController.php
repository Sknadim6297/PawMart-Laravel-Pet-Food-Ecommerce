<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\ExportService;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product', 'orderItems.cookedFood'])
                      ->orderBy('created_at', 'desc')
                      ->paginate(15);
        
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
