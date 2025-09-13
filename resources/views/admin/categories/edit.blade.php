@extends('admin.layouts.app')

@section('title', 'Edit Category')

@push('styles')
<style>
.category-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.category-edit-header {
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

.category-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
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

.category-form-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.category-form-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.category-form-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.category-form-body {
    padding: 25px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #ffffff;
}

.form-control:focus, .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
    background: #ffffff;
}

.form-text {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-check-input:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
}

.form-check-label {
    color: #2c3e50;
    font-weight: 500;
    font-size: 14px;
}

.btn-form-submit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-form-submit:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
}

.btn-form-cancel {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 14px;
}

.btn-form-cancel:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.category-image-preview {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

.category-edit-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.category-edit-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 15px 20px;
}

.category-edit-sidebar-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.category-edit-sidebar-body {
    padding: 20px;
}

.category-info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f4;
}

.category-info-label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
}

.category-info-value {
    color: #6c757d;
    font-size: 14px;
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
    .category-edit-wrapper {
        padding: 15px;
    }
    
    .category-edit-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .category-edit-header h1 {
        font-size: 24px;
    }
    
    .category-form-body {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .category-edit-wrapper {
        padding: 10px;
    }
    
    .category-edit-header h1 {
        font-size: 20px;
    }
    
    .btn-back-categories {
        width: 100%;
        justify-content: center;
    }
    
    .category-form-body {
        padding: 15px;
    }
    
    .btn-form-submit,
    .btn-form-cancel {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
@endpush

@section('content')
<div class="category-edit-wrapper">
    <!-- Page Header -->
    <div class="category-edit-header">
        <div>
            <h1><i class="fas fa-edit me-2"></i>Edit Category</h1>
        </div>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="btn-back-categories">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Category Form Card -->
            <div class="category-form-card">
                <div class="category-form-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Category Information</h5>
                </div>
                <div class="category-form-body">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-control @error('parent_id') is-invalid @enderror" 
                                        id="parent_id" name="parent_id">
                                    <option value="">-- Main Category --</option>
                                    @foreach($parentCategories as $parent)
                                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Leave empty to create a main category</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        @if($category->image)
                            <div class="mb-2">
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" 
                                     class="category-image-preview">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Leave empty to keep current image. Recommended size: 300x300px. Max file size: 2MB.</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" 
                                   name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.categories.index') }}" class="btn-form-cancel">Cancel</a>
                            <button type="submit" class="btn-form-submit">
                                <i class="fas fa-save"></i> Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Category Info -->
            <div class="category-edit-sidebar">
                <div class="category-edit-sidebar-header">
                    <h6><i class="fas fa-info-circle me-2"></i>Category Info</h6>
                </div>
                <div class="category-edit-sidebar-body">
                    <div class="category-info-item">
                        <span class="category-info-label">Slug:</span>
                        <span class="category-info-value">{{ $category->slug }}</span>
                    </div>
                    <div class="category-info-item">
                        <span class="category-info-label">Products:</span>
                        <span class="category-info-value">{{ $category->products()->count() }}</span>
                    </div>
                    <div class="category-info-item">
                        <span class="category-info-label">Created:</span>
                        <span class="category-info-value">{{ $category->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="category-info-item">
                        <span class="category-info-label">Updated:</span>
                        <span class="category-info-value">{{ $category->updated_at->format('M d, Y') }}</span>
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
    const header = document.querySelector('.category-edit-header');
    const formCard = document.querySelector('.category-form-card');
    const sidebar = document.querySelector('.category-edit-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    if (formCard) formCard.classList.add('animate-fade-up');
    if (sidebar) sidebar.classList.add('animate-fade-up');
});
</script>
@endpush
