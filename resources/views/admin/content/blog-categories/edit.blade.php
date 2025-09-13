@extends('admin.layouts.app')

@section('title', 'Edit Blog Category')
@section('page-title', 'Edit Blog Category')

@push('styles')
<style>
/* ========================================
   ADMIN BLOG CATEGORY EDIT STYLES
======================================== */
.blog-category-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.blog-category-edit-header {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 15px;
}

.blog-category-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
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

/* Form Cards */
.form-section-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.form-section-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.form-section-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-section-body {
    padding: 25px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 3px rgba(254, 87, 22, 0.1);
    outline: none;
}

.form-text {
    color: #6c757d;
    font-size: 13px;
    margin-top: 5px;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 13px;
    margin-top: 5px;
}

/* Image Preview */
.current-image {
    padding: 15px;
    border: 2px dashed #e9ecef;
    border-radius: 12px;
    text-align: center;
    background: #f8f9fa;
    margin-bottom: 15px;
}

.current-image img {
    max-width: 200px;
    max-height: 150px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.image-preview {
    margin-top: 15px;
    padding: 15px;
    border: 2px dashed #fe5716;
    border-radius: 12px;
    text-align: center;
    background: rgba(254, 87, 22, 0.05);
}

.image-preview img {
    max-width: 200px;
    max-height: 150px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(254, 87, 22, 0.2);
}

/* Action Buttons */
.form-actions {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    padding: 25px;
}

.btn-form-submit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.btn-form-submit:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.4);
    color: white;
}

.btn-form-cancel {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.btn-form-cancel:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

/* Sidebar */
.blog-category-edit-sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.category-settings-card, .category-stats-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.category-settings-card:hover, .category-stats-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.category-settings-header, .category-stats-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.category-settings-body, .category-stats-body {
    padding: 25px;
}

/* Form Switch */
.form-check-input {
    width: 3em;
    height: 1.5em;
    border-radius: 1em;
    background-color: #e9ecef;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-check-input:focus {
    box-shadow: 0 0 0 3px rgba(254, 87, 22, 0.1);
}

.form-check-label {
    color: #2c3e50;
    font-weight: 600;
    margin-left: 10px;
}

/* Stats */
.stat-item {
    padding: 12px 0;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-item:last-child {
    border-bottom: none;
}

.stat-label {
    color: #6c757d;
    font-weight: 500;
}

.stat-value {
    color: #2c3e50;
    font-weight: 600;
}

/* Animations */
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

/* Responsive Design */
@media (max-width: 768px) {
    .blog-category-edit-wrapper {
        padding: 15px;
    }
    
    .blog-category-edit-header {
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .form-section-body {
        padding: 20px;
    }
    
    .form-actions {
        padding: 20px;
    }
    
    .category-settings-body, .category-stats-body {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .blog-category-edit-wrapper {
        padding: 10px;
    }
    
    .blog-category-edit-header {
        padding: 15px;
    }
    
    .form-section-body {
        padding: 15px;
    }
    
    .form-actions {
        padding: 15px;
    }
    
    .category-settings-body, .category-stats-body {
        padding: 15px;
    }
}
</style>
@endpush

@section('content')
<div class="blog-category-edit-wrapper">
    <!-- Page Header -->
    <div class="blog-category-edit-header">
        <div>
            <h1><i class="fas fa-edit me-2"></i>Edit Blog Category</h1>
            <p class="text-muted mb-0">Update blog category information</p>
        </div>
        <div>
            <a href="{{ route('admin.content.blog-categories.index') }}" class="btn-back-categories">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('admin.content.blog-categories.update', $blogCategory) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Basic Information -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <i class="fas fa-info-circle"></i> Category Information
                    </div>
                    <div class="form-section-body">
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-folder"></i> Category Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $blogCategory->name) }}" 
                                   placeholder="Enter category name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left"></i> Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Enter category description">{{ old('description', $blogCategory->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Image -->
                        @if($blogCategory->image)
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-image"></i> Current Image
                            </label>
                            <div class="current-image">
                                <img src="{{ asset($blogCategory->image) }}" alt="{{ $blogCategory->name }}">
                            </div>
                        </div>
                        @endif

                        <!-- New Image -->
                        <div class="mb-4">
                            <label for="image" class="form-label">
                                <i class="fas fa-upload"></i> Category Image
                            </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i>
                                @if($blogCategory->image)
                                    Upload a new image to replace the current one
                                @else
                                    Upload an image for this category (optional)
                                @endif
                            </div>
                        </div>

                        <!-- Sort Order -->
                        <div class="mb-4">
                            <label for="sort_order" class="form-label">
                                <i class="fas fa-sort-numeric-down"></i> Sort Order
                            </label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $blogCategory->sort_order ?? 0) }}" 
                                   min="0" placeholder="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i>
                                Lower numbers appear first
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.content.blog-categories.index') }}" class="btn-form-cancel">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn-form-submit">
                                <i class="fas fa-save"></i> Update Category
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="blog-category-edit-sidebar">
                <!-- Category Settings -->
                <div class="category-settings-card">
                    <div class="category-settings-header">
                        <i class="fas fa-cog"></i> Category Settings
                    </div>
                    <div class="category-settings-body">
                        <!-- Status -->
                        <div class="mb-3">
                            <input type="hidden" name="status" value="0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" 
                                       value="1" {{ old('status', $blogCategory->status) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active Status
                                </label>
                            </div>
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i>
                                Enable to make this category visible
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Stats -->
                <div class="category-stats-card">
                    <div class="category-stats-header">
                        <i class="fas fa-chart-bar"></i> Category Stats
                    </div>
                    <div class="category-stats-body">
                        <div class="stat-item">
                            <span class="stat-label">Total Blogs:</span>
                            <span class="stat-value">{{ $blogCategory->blogs_count ?? 0 }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Created:</span>
                            <span class="stat-value">{{ $blogCategory->created_at->format('M j, Y') }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Last Updated:</span>
                            <span class="stat-value">{{ $blogCategory->updated_at->format('M j, Y') }}</span>
                        </div>
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
    const header = document.querySelector('.blog-category-edit-header');
    const formCards = document.querySelectorAll('.form-section-card, .form-actions');
    const sidebarCards = document.querySelectorAll('.category-settings-card, .category-stats-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    formCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 150);
    });
    
    sidebarCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 600);
    });
    
    // Image preview
    const imageInput = document.getElementById('image');
    
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create or update preview
                let preview = document.querySelector('.image-preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.className = 'image-preview';
                    imageInput.parentNode.appendChild(preview);
                }
                preview.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <small class="d-block text-muted mt-2">New image preview</small>
                `;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Form submission loading state
    const form = document.querySelector('form');
    const submitBtn = document.querySelector('.btn-form-submit');
    
    form.addEventListener('submit', function() {
        const originalContent = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
        submitBtn.disabled = true;
        
        // Re-enable button after 10 seconds as fallback
        setTimeout(() => {
            submitBtn.innerHTML = originalContent;
            submitBtn.disabled = false;
        }, 10000);
    });
});
</script>
@endpush
