@extends('admin.layouts.app')

@section('title', 'Edit Brand')

@push('styles')
<style>
.brand-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.brand-edit-header {
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

.brand-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.brand-edit-header .breadcrumb-container {
    margin-top: 10px;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
    font-size: 14px;
}

.breadcrumb-item {
    color: #6c757d;
}

.breadcrumb-item a {
    color: #fe5716;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #e54e14;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #fe5716;
    font-weight: 600;
}

.btn-back-brands {
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
    margin-top: 10px;
}

.btn-back-brands:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.brand-form-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.brand-form-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.brand-form-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.brand-form-body {
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

.brand-image-preview {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
    border: 3px solid #e9ecef;
    margin-top: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.brand-image-preview:hover {
    transform: scale(1.05);
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.2);
}

.file-upload-area {
    border: 2px dashed #e9ecef;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
    background: #f8f9fa;
    margin-top: 10px;
}

.file-upload-area:hover {
    border-color: #fe5716;
    background: rgba(254, 87, 22, 0.05);
}

.file-upload-area.dragover {
    border-color: #fe5716;
    background: rgba(254, 87, 22, 0.1);
    transform: scale(1.02);
}

.form-check-input {
    width: 20px;
    height: 20px;
    margin-top: 0.25em;
}

.form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-check-input:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.25);
}

.form-switch .form-check-input {
    width: 40px;
    height: 20px;
    margin-top: 0.25em;
}

.form-switch .form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-switch .form-check-input:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.25);
}

.current-image-info {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 15px;
    margin-top: 10px;
}

.current-image-info small {
    color: #6c757d;
    font-weight: 600;
    font-size: 12px;
}

.brand-edit-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.brand-edit-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 15px 20px;
}

.brand-edit-sidebar-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.brand-edit-sidebar-body {
    padding: 20px;
}

.brand-info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f4;
}

.brand-info-label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
}

.brand-info-value {
    color: #6c757d;
    font-size: 14px;
}

.brand-logo-preview {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 12px;
    border: 3px solid #e9ecef;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.brand-logo-preview:hover {
    transform: scale(1.05);
    border-color: #fe5716;
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.2);
}

.brand-info-item:hover {
    background: rgba(254, 87, 22, 0.05);
    border-radius: 8px;
    padding: 12px 8px;
    transition: all 0.3s ease;
}

.brand-stats-card {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.brand-stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.brand-stats-card h6 {
    color: white;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 16px;
}

.brand-stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.brand-stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 15px;
    transition: all 0.3s ease;
}

.brand-stat-item:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.05);
}

.brand-stat-value {
    color: white;
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 5px;
}

.brand-stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
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
    .brand-edit-wrapper {
        padding: 15px;
    }
    
    .brand-edit-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .brand-edit-header h1 {
        font-size: 24px;
    }
    
    .brand-form-body {
        padding: 20px;
    }
    
    .brand-edit-sidebar-body {
        padding: 15px;
    }
    
    .brand-stats-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .btn-form-submit,
    .btn-form-cancel {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .brand-logo-preview {
        width: 100px;
        height: 100px;
    }
    
    .brand-image-preview {
        width: 60px;
        height: 60px;
    }
}

@media (max-width: 480px) {
    .brand-edit-wrapper {
        padding: 10px;
    }
    
    .brand-edit-header {
        padding: 15px;
    }
    
    .brand-edit-header h1 {
        font-size: 20px;
    }
    
    .brand-form-body {
        padding: 15px;
    }
    
    .brand-edit-sidebar-body {
        padding: 12px;
    }
    
    .brand-stat-value {
        font-size: 16px;
    }
    
    .brand-stat-label {
        font-size: 10px;
    }
    
    .file-upload-area {
        padding: 15px;
    }
    
    .current-image-info {
        padding: 10px;
    }
}
</style>
@endpush

@section('content')
<div class="brand-edit-wrapper">
    <!-- Page Header -->
    <div class="brand-edit-header">
        <div>
            <h1><i class="fas fa-edit me-2"></i>Edit Brand: {{ $brand->name }}</h1>
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">Brands</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.brands.index') }}" class="btn-back-brands">
                <i class="fas fa-arrow-left"></i> Back to Brands
            </a>
        </div>
    </div>

    <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <!-- Brand Information -->
                <div class="brand-form-card">
                    <div class="brand-form-header">
                        <h5><i class="fas fa-info-circle me-2"></i>Brand Information</h5>
                    </div>
                    <div class="brand-form-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Brand Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $brand->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">URL Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug', $brand->slug) }}" 
                                           placeholder="Auto-generated from name">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave empty to auto-generate from brand name</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Brand Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                           id="logo" name="logo" accept="image/*">
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                                    @if($brand->logo)
                                        <div class="current-image-info">
                                            <small>Current logo:</small>
                                            <img src="{{ Storage::url($brand->logo) }}" alt="Current Logo" 
                                                 class="brand-image-preview">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="user_image" class="form-label">User Image</label>
                                    <input type="file" class="form-control @error('user_image') is-invalid @enderror" 
                                           id="user_image" name="user_image" accept="image/*">
                                    @error('user_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                                    @if($brand->user_image)
                                        <div class="current-image-info">
                                            <small>Current image:</small>
                                            <img src="{{ Storage::url($brand->user_image) }}" alt="Current User Image" 
                                                 class="brand-image-preview">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="brand-form-card">
                    <div class="brand-form-header">
                        <h5><i class="fas fa-search me-2"></i>SEO Information</h5>
                    </div>
                    <div class="brand-form-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                                   id="meta_title" name="meta_title" value="{{ old('meta_title', $brand->meta_title) }}" 
                                   maxlength="255">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <textarea class="form-control @error('meta_keywords') is-invalid @enderror" 
                                      id="meta_keywords" name="meta_keywords" rows="3" 
                                      placeholder="Separate keywords with commas">{{ old('meta_keywords', $brand->meta_keywords) }}</textarea>
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                      id="meta_description" name="meta_description" rows="3" 
                                      maxlength="500">{{ old('meta_description', $brand->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Brand Settings -->
                <div class="brand-edit-sidebar">
                    <div class="brand-edit-sidebar-header">
                        <h6><i class="fas fa-cog me-2"></i>Brand Settings</h6>
                    </div>
                    <div class="brand-edit-sidebar-body">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $brand->sort_order) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Lower numbers appear first</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" 
                                       value="1" {{ old('status', $brand->status) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active Status
                                </label>
                            </div>
                            <div class="form-text">Enable to make brand visible on website</div>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.brands.index') }}" class="btn-form-cancel">Cancel</a>
                            <button type="submit" class="btn-form-submit">Update Brand</button>
                        </div>
                    </div>
                </div>

                <!-- Current Logo -->
                @if($brand->logo)
                <div class="brand-edit-sidebar">
                    <div class="brand-edit-sidebar-header">
                        <h6><i class="fas fa-image me-2"></i>Current Logo</h6>
                    </div>
                    <div class="brand-edit-sidebar-body text-center">
                        <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" 
                             class="brand-logo-preview">
                    </div>
                </div>
                @endif

                <!-- Brand Statistics -->
                <div class="brand-edit-sidebar">
                    <div class="brand-edit-sidebar-header">
                        <h6><i class="fas fa-chart-bar me-2"></i>Brand Statistics</h6>
                    </div>
                    <div class="brand-edit-sidebar-body">
                        <div class="brand-stats-card">
                            <h6><i class="fas fa-boxes me-2"></i>Product Count</h6>
                            <div class="brand-stats-grid">
                                <div class="brand-stat-item">
                                    <div class="brand-stat-value">{{ $brand->products_count ?? 0 }}</div>
                                    <div class="brand-stat-label">Products</div>
                                </div>
                                <div class="brand-stat-item">
                                    <div class="brand-stat-value">{{ $brand->active_products_count ?? 0 }}</div>
                                    <div class="brand-stat-label">Active</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="brand-info-item">
                            <span class="brand-info-label">Created:</span>
                            <span class="brand-info-value">{{ $brand->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="brand-info-item">
                            <span class="brand-info-label">Last Updated:</span>
                            <span class="brand-info-value">{{ $brand->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.brand-edit-header');
    const formCards = document.querySelectorAll('.brand-form-card');
    const sidebars = document.querySelectorAll('.brand-edit-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    
    formCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 150);
    });
    
    sidebars.forEach((sidebar, index) => {
        setTimeout(() => {
            sidebar.classList.add('animate-fade-up');
        }, index * 200);
    });
    
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            if (!slugInput.value || slugInput.dataset.autoGenerated !== 'false') {
                const slug = this.value.toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugInput.value = slug;
                slugInput.dataset.autoGenerated = 'true';
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.autoGenerated = 'false';
        });
    }
    
    // Enhanced file upload interactions
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Show file info
                const fileName = file.name;
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                console.log(`Selected file: ${fileName} (${fileSize} MB)`);
                
                // Preview image if it's an image file
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // You could add a preview here if needed
                        console.log('Image loaded for preview');
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });
    
    // Enhanced form validation feedback
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating Brand...';
                submitBtn.disabled = true;
            }
        });
    }
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.form-control, .form-select, .btn-form-submit, .btn-form-cancel');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
@endsection
