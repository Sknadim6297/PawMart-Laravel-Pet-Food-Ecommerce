@extends('admin.layouts.app')

@section('title', 'Brand Details - ' . $brand->name)

@push('styles')
<style>
/* ========================================
   BRAND SHOW STYLES
======================================== */
.brand-show-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.brand-header {
    background: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #fe5716;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.brand-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.brand-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.brand-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.brand-content {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.brand-content-header {
    background: #f8f9fa;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
}

.brand-content-header h3 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.brand-content-body {
    padding: 25px;
}

.brand-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.info-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #fe5716;
}

.info-section h4 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 16px;
    display: flex;
    align-items: center;
}

.info-section h4 i {
    margin-right: 8px;
    color: #fe5716;
}

.info-item {
    margin-bottom: 12px;
}

.info-label {
    font-weight: 600;
    color: #495057;
    font-size: 14px;
    margin-bottom: 4px;
}

.info-value {
    color: #6c757d;
    font-size: 14px;
    line-height: 1.5;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.status-badge.active {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
}

.status-badge.inactive {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.brand-images {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.image-container {
    text-align: center;
    background: white;
    padding: 15px;
    border-radius: 10px;
    border: 2px dashed #dee2e6;
}

.image-container img {
    max-width: 100%;
    max-height: 150px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 150px;
    color: #6c757d;
    font-size: 48px;
    background: #f8f9fa;
    border-radius: 8px;
}

.image-label {
    margin-top: 10px;
    font-weight: 600;
    color: #495057;
    font-size: 14px;
}

.products-section {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.products-header {
    background: #f8f9fa;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.products-header h3 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.products-count {
    background: #fe5716;
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.empty-state {
    text-align: center;
    padding: 40px 25px;
    color: #6c757d;
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 15px;
    color: #dee2e6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .brand-show-wrapper {
        padding: 15px;
    }
    
    .brand-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .brand-actions {
        width: 100%;
        justify-content: flex-start;
    }
    
    .brand-info-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .brand-images {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .brand-actions {
        flex-direction: column;
        width: 100%;
    }
    
    .brand-actions .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endpush

@section('content')
<div class="brand-show-wrapper">
    <!-- Header -->
    <div class="brand-header">
        <div>
            <h1>{{ $brand->name }}</h1>
            <p>View and manage brand details</p>
        </div>
        <div class="brand-actions">
            <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit Brand
            </a>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <!-- Brand Information -->
    <div class="brand-content">
        <div class="brand-content-header">
            <h3><i class="fas fa-info-circle"></i> Brand Information</h3>
        </div>
        <div class="brand-content-body">
            <div class="brand-info-grid">
                <!-- Basic Information -->
                <div class="info-section">
                    <h4><i class="fas fa-tag"></i> Basic Information</h4>
                    
                    <div class="info-item">
                        <div class="info-label">Brand Name</div>
                        <div class="info-value">{{ $brand->name }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Slug</div>
                        <div class="info-value">{{ $brand->slug }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="status-badge {{ $brand->status ? 'active' : 'inactive' }}">
                                <i class="fas fa-circle me-1"></i>
                                {{ $brand->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Sort Order</div>
                        <div class="info-value">{{ $brand->sort_order ?? 'No order set' }}</div>
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="info-section">
                    <h4><i class="fas fa-search"></i> SEO Information</h4>
                    
                    <div class="info-item">
                        <div class="info-label">Meta Title</div>
                        <div class="info-value">{{ $brand->meta_title ?: 'No meta title set' }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Meta Description</div>
                        <div class="info-value">{{ $brand->meta_description ?: 'No meta description set' }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Meta Keywords</div>
                        <div class="info-value">{{ $brand->meta_keywords ?: 'No meta keywords set' }}</div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="info-section">
                    <h4><i class="fas fa-clock"></i> Timestamps</h4>
                    
                    <div class="info-item">
                        <div class="info-label">Created At</div>
                        <div class="info-value">{{ $brand->created_at->format('M d, Y h:i A') }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Last Updated</div>
                        <div class="info-value">{{ $brand->updated_at->format('M d, Y h:i A') }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Time Since Creation</div>
                        <div class="info-value">{{ $brand->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>

            <!-- Brand Images -->
            <div class="brand-images">
                <div class="image-container">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="Brand Logo">
                    @else
                        <div class="image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    <div class="image-label">Brand Logo</div>
                </div>
                
                <div class="image-container">
                    @if($brand->user_image)
                        <img src="{{ asset('storage/' . $brand->user_image) }}" alt="User Image">
                    @else
                        <div class="image-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                    <div class="image-label">User Image</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Associated Products -->
    <div class="products-section">
        <div class="products-header">
            <h3><i class="fas fa-box"></i> Associated Products</h3>
            <span class="products-count">{{ $brand->products->count() }}</span>
        </div>
        
        @if($brand->products->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="10%">Image</th>
                            <th width="30%">Product Name</th>
                            <th width="15%">SKU</th>
                            <th width="15%">Price</th>
                            <th width="15%">Stock</th>
                            <th width="10%">Status</th>
                            <th width="5%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand->products as $product)
                        <tr>
                            <td>
                                @if($product->featured_image)
                                    <img src="{{ asset('storage/' . $product->featured_image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="rounded"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <h6 class="mb-0 fw-semibold">{{ Str::limit($product->name, 30) }}</h6>
                                    <small class="text-muted">ID: {{ $product->id }}</small>
                                </div>
                            </td>
                            <td>{{ $product->sku ?: 'No SKU' }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge {{ $product->stock_quantity > 10 ? 'bg-success' : ($product->stock_quantity > 0 ? 'bg-warning' : 'bg-danger') }}">
                                    {{ $product->stock_quantity }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $product->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   title="View Product">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h5>No Products Found</h5>
                <p>This brand doesn't have any associated products yet.</p>
                <a href="{{ route('admin.products.create', ['brand' => $brand->id]) }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Product to Brand
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Add any JavaScript functionality here if needed
    console.log('Brand show page loaded');
});
</script>
@endpush