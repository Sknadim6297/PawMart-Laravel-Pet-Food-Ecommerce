<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ExportService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by registration date
        if ($request->has('date_filter') && $request->date_filter) {
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        // Filter by order status
        if ($request->has('order_filter') && $request->order_filter) {
            switch ($request->order_filter) {
                case 'with_orders':
                    $query->whereHas('orders');
                    break;
                case 'no_orders':
                    $query->whereDoesntHave('orders');
                    break;
            }
        }

        // Order by latest first
        $customers = $query->withCount(['orders', 'wishlists'])
                          ->with(['orders' => function($q) {
                              $q->latest()->limit(1);
                          }])
                          ->orderBy('created_at', 'desc')
                          ->paginate(15);

        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $customer)
    {
        $customer->load(['orders.orderItems.product', 'wishlists.product', 'addresses']);
        
        // Calculate customer statistics
        $stats = [
            'total_orders' => $customer->orders()->count(),
            'total_spent' => $customer->orders()->sum('total_amount'),
            'avg_order_value' => $customer->orders()->avg('total_amount') ?: 0,
            'last_order' => $customer->orders()->latest()->first(),
            'favorite_products' => $customer->wishlists()->with('product')->get(),
            'recent_orders' => $customer->orders()->with('orderItems.product')->latest()->limit(5)->get()
        ];

        return view('admin.customers.show', compact('customer', 'stats'));
    }

    public function toggleStatus(Request $request, User $customer)
    {
        $customer->update([
            'is_active' => !$customer->is_active
        ]);

        $status = $customer->is_active ? 'activated' : 'deactivated';
        
        return response()->json([
            'success' => true,
            'message' => "Customer has been {$status} successfully.",
            'is_active' => $customer->is_active
        ]);
    }

    public function destroy(User $customer)
    {
        // Check if customer has orders
        if ($customer->orders()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete customer with existing orders.'
            ], 400);
        }

        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer deleted successfully.'
        ]);
    }

    /**
     * Export customers to CSV
     */
    public function exportCSV(Request $request)
    {
        $query = User::query();

        // Apply same filters as index
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('date_filter') && $request->date_filter) {
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        if ($request->has('order_filter') && $request->order_filter) {
            switch ($request->order_filter) {
                case 'with_orders':
                    $query->whereHas('orders');
                    break;
                case 'no_orders':
                    $query->whereDoesntHave('orders');
                    break;
            }
        }

        $customers = $query->withCount(['orders', 'wishlists'])
                          ->orderBy('created_at', 'desc')
                          ->get();

        $headers = ['ID', 'Name', 'Email', 'Phone', 'Total Orders', 'Total Spent', 'Status', 'Registration Date'];
        $rows = $customers->map(function($customer) {
            $totalSpent = $customer->orders()->sum('total_amount');
            return [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone ?? 'N/A',
                $customer->orders_count,
                '₹' . number_format($totalSpent, 2),
                $customer->is_active ? 'Active' : 'Inactive',
                $customer->created_at->format('Y-m-d')
            ];
        })->toArray();

        return ExportService::toCSV($rows, 'customers-' . now()->format('Y-m-d-H-i-s') . '.csv', $headers);
    }

    /**
     * Export customers to PDF
     */
    public function exportPDF(Request $request)
    {
        $query = User::query();

        // Apply same filters as index
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('date_filter') && $request->date_filter) {
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        if ($request->has('order_filter') && $request->order_filter) {
            switch ($request->order_filter) {
                case 'with_orders':
                    $query->whereHas('orders');
                    break;
                case 'no_orders':
                    $query->whereDoesntHave('orders');
                    break;
            }
        }

        $customers = $query->withCount(['orders', 'wishlists'])
                          ->orderBy('created_at', 'desc')
                          ->get();

        $headers = ['ID', 'Name', 'Email', 'Phone', 'Total Orders', 'Total Spent', 'Status', 'Registration Date'];
        $rows = $customers->map(function($customer) {
            $totalSpent = $customer->orders()->sum('total_amount');
            return [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone ?? 'N/A',
                $customer->orders_count,
                '₹' . number_format($totalSpent, 2),
                $customer->is_active ? 'Active' : 'Inactive',
                $customer->created_at->format('Y-m-d')
            ];
        })->toArray();

        $html = ExportService::generateHTMLTable(
            $headers,
            $rows,
            'Customers Report - ' . now()->format('M d, Y')
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
            'Content-Disposition' => 'attachment; filename="customers-' . now()->format('Y-m-d-H-i-s') . '.pdf"',
        ]);
    }
}
