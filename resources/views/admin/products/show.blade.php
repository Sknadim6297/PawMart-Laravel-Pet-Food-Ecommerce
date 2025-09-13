@extends('admin.layouts.app')

@section('title', 'Product Details')

@push('styles')
<style>
.product-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.product-show-header {
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

.product-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.btn-edit-product {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
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

.btn-edit-product:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.btn-back-products {
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

.btn-back-products:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.product-details-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.product-details-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.product-details-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.product-details-body {
    padding: 25px;
}

.product-image-section {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
}

.product-image-main {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.product-image-placeholder {
    background: #e9ecef;
    border-radius: 12px;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}

.product-gallery {
    margin-top: 20px;
}

.product-gallery h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
}

.gallery-image {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.gallery-image:hover {
    transform: scale(1.05);
}

.product-info-section {
    padding-left: 20px;
}

.product-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 24px;
    margin-bottom: 20px;
}

.product-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.product-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-badge.active {
    background: #d4edda;
    color: #155724;
}

.product-badge.inactive {
    background: #f8d7da;
    color: #721c24;
}

.product-badge.featured {
    background: #cce5ff;
    color: #004085;
}

.product-badge.healthy {
    background: #d1ecf1;
    color: #0c5460;
}

.product-badge.deal {
    background: #fff3cd;
    color: #856404;
}

.product-detail-row {
    display: flex;
    margin-bottom: 15px;
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f4;
}

.product-detail-label {
    font-weight: 600;
    color: #2c3e50;
    min-width: 120px;
    font-size: 14px;
}

.product-detail-value {
    color: #6c757d;
    flex: 1;
    font-size: 14px;
}

.product-price {
    font-size: 18px;
    font-weight: 700;
}

.product-price-original {
    text-decoration: line-through;
    color: #6c757d;
    margin-right: 8px;
}

.product-price-sale {
    color: #dc3545;
}

.product-discount {
    color: #28a745;
    font-size: 12px;
    font-weight: 600;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.product-rating .stars {
    color: #ffc107;
}

.product-rating .count {
    color: #6c757d;
    font-size: 12px;
}

.product-description-section {
    margin-top: 25px;
    padding-top: 25px;
    border-top: 2px solid #f1f3f4;
}

.product-description-section h5 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
}

.product-description {
    color: #6c757d;
    line-height: 1.6;
    font-size: 14px;
}

.product-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.product-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 15px 20px;
}

.product-sidebar-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.product-sidebar-body {
    padding: 20px;
}

.btn-quick-action {
    width: 100%;
    margin-bottom: 10px;
    padding: 12px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
}

.btn-quick-action:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

.btn-quick-edit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
}

.btn-quick-edit:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-quick-view {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.btn-quick-view:hover {
    background: linear-gradient(135deg, #1e7e34, #17a2b8);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-quick-delete {
    background: linear-gradient(135deg, #dc3545, #e74c3c);
    color: white;
}

.btn-quick-delete:hover {
    background: linear-gradient(135deg, #c82333, #d63031);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.product-stats-section {
    text-align: center;
    padding: 20px;
}

.product-stat {
    margin-bottom: 15px;
}

.product-stat-number {
    font-size: 24px;
    font-weight: 700;
    color: #fe5716;
    display: block;
}

.product-stat-label {
    color: #6c757d;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.product-meta-info {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
}

.product-meta-info small {
    color: #6c757d;
    font-size: 11px;
    line-height: 1.4;
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
    .product-show-wrapper {
        padding: 15px;
    }
    
    .product-show-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .product-show-header h1 {
        font-size: 24px;
    }
    
    .product-details-body {
        padding: 20px;
    }
    
    .product-info-section {
        padding-left: 0;
        margin-top: 20px;
    }
    
    .product-title {
        font-size: 20px;
    }
    
    .product-detail-row {
        flex-direction: column;
        gap: 5px;
    }
    
    .product-detail-label {
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .product-show-wrapper {
        padding: 10px;
    }
    
    .product-show-header h1 {
        font-size: 20px;
    }
    
    .btn-edit-product,
    .btn-back-products {
        width: 100%;
        justify-content: center;
    }
    
    .product-details-body {
        padding: 15px;
    }
    
    .product-title {
        font-size: 18px;
    }
}
</style>
@endpush

@section('content')
<div class="product-show-wrapper">
    <!-- Page Header -->
    <div class="product-show-header">
        <div>
            <h1><i class="fas fa-box me-2"></i>Product Details: {{ $product->name }}</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn-edit-product">
                <i class="fas fa-edit"></i> Edit Product
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn-back-products">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Product Details Card -->
            <div class="product-details-card">
                <div class="product-details-header">
                    <h5><i class="fas fa-info-circle me-2"></i>Product Information</h5>
                </div>
                <div class="product-details-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-image-section">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                         class="product-image-main">
                                @else
                                    <div class="product-image-placeholder">
                                        <i class="fas fa-image fa-3x"></i>
                                    </div>
                                @endif

                                @if($product->gallery && count($product->gallery) > 0)
                                    <div class="product-gallery">
                                        <h6><i class="fas fa-images me-2"></i>Gallery Images</h6>
                                        <div class="row g-2">
                                            @foreach($product->gallery as $image)
                                                <div class="col-3">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery" 
                                                         class="gallery-image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="product-info-section">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                
                                <div class="product-badges">
                                    <span class="product-badge {{ $product->is_active ? 'active' : 'inactive' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    
                                    @if($product->is_featured)
                                        <span class="product-badge featured">Featured</span>
                                    @endif

                                    @if($product->is_healthy)
                                        <span class="product-badge healthy">Healthy</span>
                                    @endif

                                    @if($product->is_deal_of_week)
                                        <span class="product-badge deal">Deal of Week</span>
                                    @endif
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">SKU:</div>
                                    <div class="product-detail-value">{{ $product->sku }}</div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Category:</div>
                                    <div class="product-detail-value">
                                        @if($product->category)
                                            <span class="badge bg-info">{{ $product->category->name }}</span>
                                        @else
                                            <span class="text-muted">No category</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Brand:</div>
                                    <div class="product-detail-value">
                                        @if($product->brand)
                                            <span class="badge bg-success">{{ $product->brand->name }}</span>
                                        @else
                                            <span class="text-muted">No brand</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Price:</div>
                                    <div class="product-detail-value">
                                        <div class="product-price">
                                            @if($product->sale_price)
                                                <span class="product-price-original">₹{{ number_format($product->price, 2) }}</span>
                                                <span class="product-price-sale">₹{{ number_format($product->sale_price, 2) }}</span>
                                                <span class="product-discount">({{ $product->discount_percentage }}% off)</span>
                                            @else
                                                ₹{{ number_format($product->price, 2) }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Stock:</div>
                                    <div class="product-detail-value">
                                        <span class="badge {{ $product->stock_quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->stock_quantity }} units
                                        </span>
                                    </div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Rating:</div>
                                    <div class="product-detail-value">
                                        <div class="product-rating">
                                            <div class="stars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $product->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="count">({{ $product->reviews_count }} reviews)</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-detail-row">
                                    <div class="product-detail-label">Sort Order:</div>
                                    <div class="product-detail-value">{{ $product->sort_order }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($product->short_description)
                        <div class="product-description-section">
                            <h5><i class="fas fa-align-left me-2"></i>Short Description</h5>
                            <p class="product-description">{{ $product->short_description }}</p>
                        </div>
                    @endif

                    <div class="product-description-section">
                        <h5><i class="fas fa-file-text me-2"></i>Description</h5>
                        <div class="product-description">{!! nl2br(e($product->description)) !!}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="product-sidebar">
                <div class="product-sidebar-header">
                    <h6><i class="fas fa-bolt me-2"></i>Quick Actions</h6>
                </div>
                <div class="product-sidebar-body">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn-quick-action btn-quick-edit">
                        <i class="fas fa-edit"></i> Edit Product
                    </a>
                    
                    <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="btn-quick-action btn-quick-view">
                        <i class="fas fa-external-link-alt"></i> View on Frontend
                    </a>
                    
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-quick-action btn-quick-delete">
                            <i class="fas fa-trash"></i> Delete Product
                        </button>
                    </form>
                </div>
            </div>

            <!-- Product Statistics -->
            <div class="product-sidebar">
                <div class="product-sidebar-header">
                    <h6><i class="fas fa-chart-bar me-2"></i>Product Statistics</h6>
                </div>
                <div class="product-stats-section">
                    <div class="row">
                        <div class="col-6">
                            <div class="product-stat">
                                <span class="product-stat-number">{{ $product->rating }}</span>
                                <span class="product-stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-stat">
                                <span class="product-stat-number">{{ $product->reviews_count }}</span>
                                <span class="product-stat-label">Reviews</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-meta-info">
                        <small>
                            <strong>Created:</strong> {{ $product->created_at->format('M d, Y H:i') }}<br>
                            <strong>Updated:</strong> {{ $product->updated_at->format('M d, Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.product-show-header');
    const detailsCard = document.querySelector('.product-details-card');
    const sidebars = document.querySelectorAll('.product-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    if (detailsCard) detailsCard.classList.add('animate-fade-up');
    
    sidebars.forEach((sidebar, index) => {
        setTimeout(() => {
            sidebar.classList.add('animate-fade-up');
        }, index * 200);
    });
});
</script>
@endpush
