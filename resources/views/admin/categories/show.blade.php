@extends('admin.layouts.app')

@section('title', 'Category Details')

@push('styles')
<style>
.category-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.category-show-header {
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

.category-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.btn-edit-category {
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

.btn-edit-category:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.btn-back-categories {
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

.btn-back-categories:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.category-details-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.category-details-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.category-details-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.category-details-body {
    padding: 25px;
}

.category-image-section {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
}

.category-image-main {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.category-image-placeholder {
    background: #e9ecef;
    border-radius: 12px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}

.category-info-section {
    padding-left: 20px;
}

.category-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 24px;
    margin-bottom: 15px;
}

.category-slug {
    color: #6c757d;
    font-size: 14px;
    margin-bottom: 20px;
}

.category-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.category-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.category-badge.active {
    background: #d4edda;
    color: #155724;
}

.category-badge.inactive {
    background: #f8d7da;
    color: #721c24;
}

.category-detail-row {
    display: flex;
    margin-bottom: 15px;
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f4;
}

.category-detail-label {
    font-weight: 600;
    color: #2c3e50;
    min-width: 120px;
    font-size: 14px;
}

.category-detail-value {
    color: #6c757d;
    flex: 1;
    font-size: 14px;
}

.category-description-section {
    margin-top: 25px;
    padding-top: 25px;
    border-top: 2px solid #f1f3f4;
}

.category-description-section h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
}

.category-description {
    color: #6c757d;
    line-height: 1.6;
    font-size: 14px;
}

.category-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.category-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 15px 20px;
}

.category-sidebar-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.category-sidebar-body {
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
    background: linear-gradient(135deg, #17a2b8, #20c997);
    color: white;
}

.btn-quick-view:hover {
    background: linear-gradient(135deg, #138496, #17a2b8);
    color: white;
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
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

.btn-quick-delete:disabled {
    background: #6c757d;
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-quick-delete:disabled:hover {
    background: #6c757d;
    transform: none;
    box-shadow: none;
}

.category-warning {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    color: #856404;
    padding: 10px;
    border-radius: 8px;
    font-size: 12px;
    margin-top: 10px;
    text-align: center;
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
    .category-show-wrapper {
        padding: 15px;
    }
    
    .category-show-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .category-show-header h1 {
        font-size: 24px;
    }
    
    .category-details-body {
        padding: 20px;
    }
    
    .category-info-section {
        padding-left: 0;
        margin-top: 20px;
    }
    
    .category-title {
        font-size: 20px;
    }
    
    .category-detail-row {
        flex-direction: column;
        gap: 5px;
    }
    
    .category-detail-label {
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .category-show-wrapper {
        padding: 10px;
    }
    
    .category-show-header h1 {
        font-size: 20px;
    }
    
    .btn-edit-category,
    .btn-back-categories {
        width: 100%;
        justify-content: center;
    }
    
    .category-details-body {
        padding: 15px;
    }
    
    .category-title {
        font-size: 18px;
    }
}
</style>
@endpush

@section('content')
<div class="category-show-wrapper">
    <!-- Page Header -->
    <div class="category-show-header">
        <div>
            <h1><i class="fas fa-folder me-2"></i>Category Details</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn-edit-category">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn-back-categories">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Category Details Card -->
            <div class="category-details-card">
                <div class="category-details-header">
                    <h5><i class="fas fa-info-circle me-2"></i>Category Information</h5>
                </div>
                <div class="category-details-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="category-image-section">
                                @if($category->image)
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" 
                                         class="category-image-main">
                                @else
                                    <div class="category-image-placeholder">
                                        <i class="fas fa-image fa-3x"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="category-info-section">
                                <h2 class="category-title">{{ $category->name }}</h2>
                                <p class="category-slug">Slug: {{ $category->slug }}</p>
                                
                                <div class="category-badges">
                                    @if($category->is_active)
                                        <span class="category-badge active">Active</span>
                                    @else
                                        <span class="category-badge inactive">Inactive</span>
                                    @endif
                                </div>

                                <div class="category-detail-row">
                                    <div class="category-detail-label">Sort Order:</div>
                                    <div class="category-detail-value">{{ $category->sort_order ?? 0 }}</div>
                                </div>

                                <div class="category-detail-row">
                                    <div class="category-detail-label">Products:</div>
                                    <div class="category-detail-value">{{ $category->products()->count() }}</div>
                                </div>

                                <div class="category-detail-row">
                                    <div class="category-detail-label">Created:</div>
                                    <div class="category-detail-value">{{ $category->created_at->format('M d, Y H:i') }}</div>
                                </div>

                                <div class="category-detail-row">
                                    <div class="category-detail-label">Updated:</div>
                                    <div class="category-detail-value">{{ $category->updated_at->format('M d, Y H:i') }}</div>
                                </div>

                                @if($category->description)
                                    <div class="category-description-section">
                                        <h6><i class="fas fa-align-left me-2"></i>Description</h6>
                                        <p class="category-description">{{ $category->description }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="category-sidebar">
                <div class="category-sidebar-header">
                    <h6><i class="fas fa-bolt me-2"></i>Quick Actions</h6>
                </div>
                <div class="category-sidebar-body">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn-quick-action btn-quick-edit">
                        <i class="fas fa-edit"></i> Edit Category
                    </a>
                    
                    <a href="{{ route('admin.products.index') }}?category={{ $category->id }}" class="btn-quick-action btn-quick-view">
                        <i class="fas fa-box"></i> View Products
                    </a>
                    
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-quick-action btn-quick-delete" 
                                {{ $category->products()->count() > 0 ? 'disabled' : '' }}>
                            <i class="fas fa-trash"></i> Delete Category
                        </button>
                    </form>
                    
                    @if($category->products()->count() > 0)
                        <div class="category-warning">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            Cannot delete category with products
                        </div>
                    @endif
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
    const header = document.querySelector('.category-show-header');
    const detailsCard = document.querySelector('.category-details-card');
    const sidebar = document.querySelector('.category-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    if (detailsCard) detailsCard.classList.add('animate-fade-up');
    if (sidebar) sidebar.classList.add('animate-fade-up');
});
</script>
@endpush
