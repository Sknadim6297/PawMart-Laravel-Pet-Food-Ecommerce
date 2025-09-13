@extends('admin.layouts.app')

@section('title', 'Review Details')

<<<<<<< HEAD
@push('styles')
<style>
.review-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.review-show-header {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.review-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.btn-back-reviews {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.btn-back-reviews:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.review-details-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.review-details-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.review-details-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.review-details-body {
    padding: 25px;
}

.product-info-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.product-info-card:hover {
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.1);
}

.product-image {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

.product-details {
    padding-left: 15px;
}

.product-name {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 8px;
}

.product-info-item {
    color: #6c757d;
    font-size: 13px;
    margin-bottom: 4px;
}

.btn-view-product {
    background: linear-gradient(135deg, #17a2b8, #20c997);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 12px;
    margin-top: 10px;
}

.btn-view-product:hover {
    background: linear-gradient(135deg, #138496, #17a2b8);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
    text-decoration: none;
}

.reviewer-info-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.reviewer-info-card:hover {
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.1);
}

.reviewer-info-table {
    width: 100%;
}

.reviewer-info-table td {
    padding: 8px 0;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: top;
}

.reviewer-info-table td:first-child {
    font-weight: 600;
    color: #2c3e50;
    min-width: 120px;
    font-size: 13px;
}

.reviewer-info-table td:last-child {
    color: #6c757d;
    font-size: 13px;
}

.user-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.user-badge.registered {
    background: #d4edda;
    color: #155724;
}

.user-badge.guest {
    background: #f8d7da;
    color: #721c24;
}

.status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.status-badge.approved {
    background: #d4edda;
    color: #155724;
}

.status-badge.pending {
    background: #fff3cd;
    color: #856404;
}

.review-rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.review-rating .stars {
    color: #ffc107;
}

.review-rating .rating-text {
    color: #6c757d;
    font-size: 12px;
    font-weight: 600;
}

.review-comment-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.review-comment-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.review-comment-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.review-comment-body {
    padding: 25px;
}

.review-comment-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    color: #2c3e50;
    line-height: 1.6;
    font-size: 14px;
    font-style: italic;
}

.review-actions-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.review-actions-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.review-actions-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.review-actions-body {
    padding: 25px;
}

.btn-action {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.btn-action:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

.btn-approve {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.btn-approve:hover {
    background: linear-gradient(135deg, #1e7e34, #17a2b8);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-reject {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    color: white;
}

.btn-reject:hover {
    background: linear-gradient(135deg, #e0a800, #e55e14);
    color: white;
    box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545, #e74c3c);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c82333, #d63031);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.other-reviews-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.other-reviews-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.other-reviews-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.other-reviews-body {
    padding: 25px;
}

.other-reviews-table {
    width: 100%;
    border-collapse: collapse;
}

.other-reviews-table th {
    background: #f8f9fa;
    color: #2c3e50;
    font-weight: 600;
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #e9ecef;
    font-size: 13px;
}

.other-reviews-table td {
    padding: 12px;
    border-bottom: 1px solid #f1f3f4;
    font-size: 13px;
}

.other-reviews-table tbody tr:hover {
    background: #f8f9fa;
}

.btn-view-review {
    background: #17a2b8;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 12px;
}

.btn-view-review:hover {
    background: #138496;
    color: white;
    transform: translateY(-1px);
    text-decoration: none;
}

.btn-view-all {
    background: linear-gradient(135deg, #17a2b8, #20c997);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
    margin-top: 15px;
}

.btn-view-all:hover {
    background: linear-gradient(135deg, #138496, #17a2b8);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
    text-decoration: none;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-up {
    animation: fadeInUp 0.6s ease-out;
}

@media (max-width: 768px) {
    .review-show-wrapper {
        padding: 15px;
    }
    
    .review-show-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .review-show-header h1 {
        font-size: 24px;
    }
    
    .review-details-body {
        padding: 20px;
    }
    
    .product-info-card,
    .reviewer-info-card {
        margin-bottom: 20px;
    }
    
    .btn-action {
        width: 100%;
        margin-right: 0;
    }
}

@media (max-width: 480px) {
    .review-show-wrapper {
        padding: 10px;
    }
    
    .review-show-header h1 {
        font-size: 20px;
    }
    
    .review-details-body {
        padding: 15px;
    }
    
    .product-info-card,
    .reviewer-info-card {
        padding: 15px;
    }
    
    .other-reviews-table {
        font-size: 11px;
    }
    
    .other-reviews-table th,
    .other-reviews-table td {
        padding: 8px;
    }
}
</style>
@endpush

@section('content')
<div class="review-show-wrapper">
    <!-- Page Header -->
    <div class="review-show-header">
        <div>
            <h1><i class="fas fa-star me-2"></i>Review Details</h1>
        </div>
        <div>
            <a href="{{ route('admin.reviews.index') }}" class="btn-back-reviews">
                <i class="fas fa-arrow-left"></i> Back to Reviews
            </a>
        </div>
    </div>

    <!-- Review Details -->
    <div class="review-details-card">
        <div class="review-details-header">
            <h5><i class="fas fa-info-circle me-2"></i>Review Information</h5>
        </div>
        <div class="review-details-body">

            <div class="row">
                <!-- Product Information -->
                <div class="col-md-6">
                    <div class="product-info-card">
                        <div class="d-flex align-items-start">
                            @if($review->product->image)
                                <img src="{{ asset('storage/' . $review->product->image) }}" 
                                     alt="{{ $review->product->name }}" 
                                     class="product-image">
                            @endif
                            <div class="product-details">
                                <h6 class="product-name">{{ $review->product->name }}</h6>
                                <p class="product-info-item">SKU: {{ $review->product->sku }}</p>
                                <p class="product-info-item">Category: {{ $review->product->category->name }}</p>
                                @if($review->product->brand)
                                    <p class="product-info-item">Brand: {{ $review->product->brand->name }}</p>
                                @endif
                                <p class="product-info-item">Price: ₹{{ number_format($review->product->price, 2) }}</p>
                                <a href="{{ route('admin.products.show', $review->product) }}" 
                                   class="btn-view-product">
                                    <i class="fas fa-eye"></i> View Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviewer Information -->
                <div class="col-md-6">
                    <div class="reviewer-info-card">
                        <table class="reviewer-info-table">
                            <tr>
                                <td>Name:</td>
                                <td>{{ $review->name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $review->email }}</td>
                            </tr>
                            <tr>
                                <td>User Account:</td>
                                <td>
                                    @if($review->user)
                                        <span class="user-badge registered">Registered User</span>
                                        <br>
                                        <small class="text-muted">User ID: {{ $review->user->id }}</small>
                                    @else
                                        <span class="user-badge guest">Guest User</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Rating:</td>
                                <td>
                                    <div class="review-rating">
                                        <div class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="rating-text">{{ $review->rating }}/5</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    @if($review->is_approved)
                                        <span class="status-badge approved">Approved</span>
                                    @else
                                        <span class="status-badge pending">Pending Approval</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Submitted:</td>
                                <td>
                                    {{ $review->created_at->format('F d, Y \a\t h:i A') }}
                                    <br>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Review Comment -->
    <div class="review-comment-card">
        <div class="review-comment-header">
            <h5><i class="fas fa-comment me-2"></i>Review Comment</h5>
        </div>
        <div class="review-comment-body">
            <div class="review-comment-text">
                {{ $review->comment }}
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="review-actions-card">
        <div class="review-actions-header">
            <h5><i class="fas fa-bolt me-2"></i>Actions</h5>
        </div>
        <div class="review-actions-body">
            @if($review->is_approved)
                <form action="{{ route('admin.reviews.reject', $review) }}" 
                      method="POST" class="d-inline" 
                      onsubmit="return confirm('Are you sure you want to reject this review?')">
                    @csrf
                    <button type="submit" class="btn-action btn-reject">
                        <i class="fas fa-times"></i> Reject Review
                    </button>
                </form>
            @else
                <form action="{{ route('admin.reviews.approve', $review) }}" 
                      method="POST" class="d-inline" 
                      onsubmit="return confirm('Are you sure you want to approve this review?')">
                    @csrf
                    <button type="submit" class="btn-action btn-approve">
                        <i class="fas fa-check"></i> Approve Review
                    </button>
                </form>
            @endif
            
            <form action="{{ route('admin.reviews.destroy', $review) }}" 
                  method="POST" class="d-inline" 
                  onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-action btn-delete">
                    <i class="fas fa-trash"></i> Delete Review
                </button>
            </form>
        </div>
    </div>

    <!-- Other Reviews for this Product -->
    @if($review->product->reviews()->count() > 1)
    <div class="other-reviews-card">
        <div class="other-reviews-header">
            <h5><i class="fas fa-list me-2"></i>Other Reviews for this Product</h5>
        </div>
        <div class="other-reviews-body">
            <div class="table-responsive">
                <table class="other-reviews-table">
                    <thead>
                        <tr>
                            <th>Reviewer</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($review->product->reviews()->where('id', '!=', $review->id)->latest()->limit(5)->get() as $otherReview)
                        <tr>
                            <td>{{ $otherReview->name }}</td>
                            <td>
                                <div class="review-rating">
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $otherReview->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </td>
                            <td>{{ Str::limit($otherReview->comment, 50) }}</td>
                            <td>
                                @if($otherReview->is_approved)
                                    <span class="status-badge approved">Approved</span>
                                @else
                                    <span class="status-badge pending">Pending</span>
                                @endif
                            </td>
                            <td>{{ $otherReview->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.reviews.show', $otherReview) }}" 
                                   class="btn-view-review">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($review->product->reviews()->count() > 6)
                <div class="text-center mt-3">
                    <a href="{{ route('admin.reviews.index', ['product_id' => $review->product->id]) }}" 
                       class="btn-view-all">
                        <i class="fas fa-list me-2"></i>View All Reviews for this Product
                    </a>
                </div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.review-show-header');
    const cards = document.querySelectorAll('.review-details-card, .review-comment-card, .review-actions-card, .other-reviews-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 150);
    });
});
</script>
@endpush
=======
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Review Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Reviews
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Product Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Product Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        @if($review->product->image)
                                            <img src="{{ asset('storage/' . $review->product->image) }}" 
                                                 alt="{{ $review->product->name }}" 
                                                 class="img-thumbnail mr-3" style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6>{{ $review->product->name }}</h6>
                                            <p class="text-muted mb-1">SKU: {{ $review->product->sku }}</p>
                                            <p class="text-muted mb-1">Category: {{ $review->product->category->name }}</p>
                                            @if($review->product->brand)
                                                <p class="text-muted mb-1">Brand: {{ $review->product->brand->name }}</p>
                                            @endif
                                            <p class="text-muted">Price: ₹{{ number_format($review->product->price, 2) }}</p>
                                            <a href="{{ route('admin.products.show', $review->product) }}" 
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> View Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviewer Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Reviewer Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Name:</strong></td>
                                            <td>{{ $review->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td>{{ $review->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>User Account:</strong></td>
                                            <td>
                                                @if($review->user)
                                                    <span class="badge badge-success">Registered User</span>
                                                    <br>
                                                    <small class="text-muted">User ID: {{ $review->user->id }}</small>
                                                @else
                                                    <span class="badge badge-secondary">Guest User</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rating:</strong></td>
                                            <td>
                                                <div class="rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $review->rating)
                                                            <i class="fas fa-star text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-muted"></i>
                                                        @endif
                                                    @endfor
                                                    <span class="ml-2">{{ $review->rating }}/5</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if($review->is_approved)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-warning">Pending Approval</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Submitted:</strong></td>
                                            <td>
                                                {{ $review->created_at->format('F d, Y \a\t h:i A') }}
                                                <br>
                                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Comment -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Review Comment</h5>
                                </div>
                                <div class="card-body">
                                    <div class="bg-light p-3 rounded">
                                        {{ $review->comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group" role="group">
                                        @if($review->is_approved)
                                            <form action="{{ route('admin.reviews.reject', $review) }}" 
                                                  method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Are you sure you want to reject this review?')">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-times"></i> Reject Review
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.reviews.approve', $review) }}" 
                                                  method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Are you sure you want to approve this review?')">
                                                @csrf
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-check"></i> Approve Review
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.reviews.destroy', $review) }}" 
                                              method="POST" class="d-inline ml-2" 
                                              onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Delete Review
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other Reviews for this Product -->
                    @if($review->product->reviews()->count() > 1)
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Other Reviews for this Product</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Reviewer</th>
                                                    <th>Rating</th>
                                                    <th>Comment</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($review->product->reviews()->where('id', '!=', $review->id)->latest()->limit(5)->get() as $otherReview)
                                                <tr>
                                                    <td>{{ $otherReview->name }}</td>
                                                    <td>
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $otherReview->rating)
                                                                <i class="fas fa-star text-warning"></i>
                                                            @else
                                                                <i class="far fa-star text-muted"></i>
                                                            @endif
                                                        @endfor
                                                    </td>
                                                    <td>{{ Str::limit($otherReview->comment, 50) }}</td>
                                                    <td>
                                                        @if($otherReview->is_approved)
                                                            <span class="badge badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $otherReview->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.reviews.show', $otherReview) }}" 
                                                           class="btn btn-sm btn-outline-primary">View</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @if($review->product->reviews()->count() > 6)
                                        <div class="text-center mt-3">
                                            <a href="{{ route('admin.reviews.index', ['product_id' => $review->product->id]) }}" 
                                               class="btn btn-outline-primary">
                                                View All Reviews for this Product
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> origin/main
