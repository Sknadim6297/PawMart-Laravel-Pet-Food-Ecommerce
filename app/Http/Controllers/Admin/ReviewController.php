<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use App\Services\ExportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews
     */
    public function index(Request $request)
    {
        $query = Review::with(['product', 'user']);

        // Filter by approval status
        if ($request->has('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        // Filter by product
        if ($request->has('product_id') && $request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        // Filter by rating
        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        // Search by reviewer name or comment
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('comment', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $reviews = $query->orderBy('created_at', 'desc')->paginate(20);
        $products = Product::orderBy('name')->get();

        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    /**
     * Display the specified review
     */
    public function show(Review $review)
    {
        $review->load(['product', 'user']);
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Approve a review
     */
    public function approve(Review $review)
    {
        DB::beginTransaction();
        try {
            $review->update(['is_approved' => true]);
            $this->updateProductRating($review->product);
            
            DB::commit();
            
            // Return JSON response for AJAX requests
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Review approved successfully.',
                    'status' => 'approved'
                ]);
            }
            
            return redirect()->back()->with('success', 'Review approved successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error approving review: ' . $e->getMessage());
            
            // Return JSON error for AJAX requests
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to approve review: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Failed to approve review.');
        }
    }

    /**
     * Reject/Unapprove a review
     */
    public function reject(Review $review)
    {
        DB::beginTransaction();
        try {
            $review->update(['is_approved' => false]);
            $this->updateProductRating($review->product);
            
            DB::commit();
            
            // Return JSON response for AJAX requests
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Review rejected successfully.',
                    'status' => 'rejected'
                ]);
            }
            
            return redirect()->back()->with('success', 'Review rejected successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error rejecting review: ' . $e->getMessage());
            
            // Return JSON error for AJAX requests
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to reject review: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Failed to reject review.');
        }
    }

    /**
     * Remove the specified review from storage
     */
    public function destroy(Review $review)
    {
        DB::beginTransaction();
        try {
            $product = $review->product;
            $review->delete();
            $this->updateProductRating($product);
            
            DB::commit();
            return redirect()->back()->with('success', 'Review deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to delete review.');
        }
    }

    /**
     * Reply to a review
     */
    public function reply(Request $request, Review $review)
    {
        $request->validate([
            'admin_reply' => 'required|string|max:1000'
        ]);

        try {
            $review->update([
                'admin_reply' => $request->admin_reply,
                'replied_at' => now()
            ]);

            // Return JSON response for AJAX requests
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reply posted successfully.',
                    'admin_reply' => $review->admin_reply,
                    'replied_at' => $review->replied_at->format('M d, Y h:i A')
                ]);
            }

            return redirect()->back()->with('success', 'Reply posted successfully.');
        } catch (\Exception $e) {
            Log::error('Error posting reply: ' . $e->getMessage());

            // Return JSON error for AJAX requests
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to post reply: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to post reply.');
        }
    }

    /**
     * Bulk approve reviews
     */
    public function bulkApprove(Request $request)
    {
        $reviewIds = $request->review_ids;
        
        if (!$reviewIds) {
            return redirect()->back()->with('error', 'No reviews selected.');
        }

        DB::beginTransaction();
        try {
            $reviews = Review::whereIn('id', $reviewIds)->get();
            
            foreach ($reviews as $review) {
                $review->update(['is_approved' => true]);
                $this->updateProductRating($review->product);
            }
            
            DB::commit();
            return redirect()->back()->with('success', count($reviewIds) . ' reviews approved successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to approve reviews.');
        }
    }

    /**
     * Bulk delete reviews
     */
    public function bulkDelete(Request $request)
    {
        $reviewIds = $request->review_ids;
        
        if (!$reviewIds) {
            return redirect()->back()->with('error', 'No reviews selected.');
        }

        DB::beginTransaction();
        try {
            $reviews = Review::whereIn('id', $reviewIds)->get();
            $products = collect();
            
            foreach ($reviews as $review) {
                $products->push($review->product);
                $review->delete();
            }
            
            // Update ratings for affected products
            foreach ($products->unique('id') as $product) {
                $this->updateProductRating($product);
            }
            
            DB::commit();
            return redirect()->back()->with('success', count($reviewIds) . ' reviews deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to delete reviews.');
        }
    }

    /**
     * Update product rating and review count
     */
    private function updateProductRating(Product $product)
    {
        $approvedReviews = $product->reviews()->where('is_approved', true)->get();
        $totalReviews = $product->reviews()->count();
        
        if ($approvedReviews->count() > 0) {
            $averageRating = $approvedReviews->avg('rating');
            $product->update([
                'rating' => round($averageRating, 1),
                'reviews_count' => $totalReviews
            ]);
        } else {
            $product->update([
                'rating' => 0,
                'reviews_count' => $totalReviews
            ]);
        }
    }

    /**
     * Export reviews to CSV
     */
    public function exportCSV(Request $request)
    {
        $query = Review::with(['product', 'user']);

        // Apply same filters as index
        if ($request->has('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        if ($request->has('product_id') && $request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('comment', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $reviews = $query->orderBy('created_at', 'desc')->get();

        $headers = ['ID', 'Product', 'Reviewer Name', 'Email', 'Rating', 'Comment', 'Status', 'Date'];
        $rows = $reviews->map(function($review) {
            return [
                $review->id,
                $review->product->name ?? 'N/A',
                $review->name,
                $review->email,
                $review->rating . ' Stars',
                substr($review->comment, 0, 50) . '...',
                $review->is_approved ? 'Approved' : 'Pending',
                $review->created_at->format('Y-m-d H:i')
            ];
        })->toArray();

        return ExportService::toCSV($rows, 'reviews-' . now()->format('Y-m-d-H-i-s') . '.csv', $headers);
    }

    /**
     * Export reviews to PDF
     */
    public function exportPDF(Request $request)
    {
        $query = Review::with(['product', 'user']);

        // Apply same filters as index
        if ($request->has('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        if ($request->has('product_id') && $request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('comment', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $reviews = $query->orderBy('created_at', 'desc')->get();

        $headers = ['ID', 'Product', 'Reviewer Name', 'Email', 'Rating', 'Comment', 'Status', 'Date'];
        $rows = $reviews->map(function($review) {
            return [
                $review->id,
                $review->product->name ?? 'N/A',
                $review->name,
                $review->email,
                $review->rating . ' Stars',
                substr($review->comment, 0, 50) . '...',
                $review->is_approved ? 'Approved' : 'Pending',
                $review->created_at->format('Y-m-d H:i')
            ];
        })->toArray();

        $html = ExportService::generateHTMLTable(
            $headers,
            $rows,
            'Reviews Report - ' . now()->format('M d, Y')
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
            'Content-Disposition' => 'attachment; filename="reviews-' . now()->format('Y-m-d-H-i-s') . '.pdf"',
        ]);
    }
}

