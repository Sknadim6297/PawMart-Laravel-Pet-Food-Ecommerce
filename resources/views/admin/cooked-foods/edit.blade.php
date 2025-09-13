@extends('admin.layouts.app')

@section('title', 'Edit Cooked Food Item')
@section('page-title', 'Edit Cooked Food Item')

@push('styles')
<style>
.cooked-food-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.cooked-food-edit-header {
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

.cooked-food-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.cooked-food-edit-header .breadcrumb-container {
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

.btn-back-foods {
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

.btn-back-foods:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.form-section {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.form-section h5 {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    margin: 0;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
}

.form-section-body {
    padding: 25px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #fff;
}

.form-control:focus, .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.25);
    background: #fff;
}
    
.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-text {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

.invalid-feedback {
    font-size: 12px;
    font-weight: 600;
}

.image-preview {
    border: 2px dashed #e9ecef;
    border-radius: 12px;
    padding: 25px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    background: #f8f9fa;
    margin-top: 10px;
}

.image-preview:hover {
    border-color: #fe5716;
    background: rgba(254, 87, 22, 0.05);
    transform: scale(1.02);
}

.image-preview.has-image {
    border-style: solid;
    border-color: #28a745;
    background: rgba(40, 167, 69, 0.05);
}

.preview-image {
    max-width: 200px;
    max-height: 200px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.preview-image:hover {
    transform: scale(1.05);
}

.current-image {
    max-width: 150px;
    max-height: 150px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.current-image:hover {
    transform: scale(1.05);
}

.current-image-info {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 15px;
    margin-top: 10px;
    text-align: center;
}

.current-image-info small {
    color: #6c757d;
    font-weight: 600;
    font-size: 12px;
}
    
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.category-option {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.category-option:hover {
    border-color: #fe5716;
    background: rgba(254, 87, 22, 0.05);
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.2);
}

.category-option.selected {
    border-color: #fe5716;
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.category-icon {
    font-size: 2.5rem;
    margin-bottom: 10px;
    transition: all 0.3s ease;
}

.category-option:hover .category-icon,
.category-option.selected .category-icon {
    transform: scale(1.1);
}

.slug-preview {
    font-family: 'Courier New', monospace;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 10px;
    margin-top: 8px;
    font-size: 13px;
    color: #6c757d;
    font-weight: 600;
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
    background: linear-gradient(135deg, #e55e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
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

.price-display {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
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
    .cooked-food-edit-wrapper {
        padding: 15px;
    }
    
    .cooked-food-edit-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .cooked-food-edit-header h1 {
        font-size: 24px;
    }
    
    .form-section-body {
        padding: 20px;
    }
    
    .category-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .btn-form-submit,
    .btn-form-cancel {
        width: 100%;
        margin-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .cooked-food-edit-wrapper {
        padding: 10px;
    }
    
    .cooked-food-edit-header h1 {
        font-size: 20px;
    }
    
    .form-section-body {
        padding: 15px;
    }
    
    .category-grid {
        grid-template-columns: 1fr;
    }
    
    .image-preview {
        padding: 20px;
    }
}
</style>
@endpush

@section('content')
<div class="cooked-food-edit-wrapper">
    <!-- Page Header -->
    <div class="cooked-food-edit-header">
        <div>
            <h1><i class="fas fa-utensils me-2"></i>Edit Cooked Food Item: {{ $cookedFood->name }}</h1>
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.cooked-foods.index') }}">Cooked Foods</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.cooked-foods.show', $cookedFood) }}">{{ $cookedFood->name }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.cooked-foods.index') }}" class="btn-back-foods">
                <i class="fas fa-arrow-left"></i> Back to Cooked Foods
            </a>
        </div>
    </div>

        <form action="{{ route('admin.cooked-foods.update', $cookedFood) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-lg-8">
                    <!-- Basic Information -->
                    <div class="form-section">
                        <h5><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                        <div class="form-section-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Item Name *</label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $cookedFood->name) }}" 
                                               placeholder="Enter item name"
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="slug-preview" id="slugPreview"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">URL Slug</label>
                                        <input type="text" 
                                               class="form-control @error('slug') is-invalid @enderror" 
                                               id="slug" 
                                               name="slug" 
                                               value="{{ old('slug', $cookedFood->slug) }}" 
                                               placeholder="Auto-generated from name">
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text">Leave empty to auto-generate from name</small>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Item Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" 
                                          name="description" 
                                          rows="4" 
                                          placeholder="Describe your cooked food item..."
                                          required>{{ old('description', $cookedFood->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Category Selection -->
                    <div class="form-section">
                        <h5><i class="fas fa-tags me-2"></i>Item Category *</h5>
                        <div class="form-section-body">
                            <div class="category-grid">
                            @php
                                $categoryIcons = [
                                    'fish' => 'fas fa-fish',
                                    'chicken' => 'fas fa-drumstick-bite',
                                    'meat' => 'fas fa-hamburger',
                                    'egg' => 'fas fa-egg',
                                    'other' => 'fas fa-utensils'
                                ];
                                $currentCategory = old('category', $cookedFood->category);
                            @endphp
                            
                            @foreach(\App\Models\CookedFood::getCategories() as $key => $label)
                                <div class="category-option {{ $currentCategory == $key ? 'selected' : '' }}" data-category="{{ $key }}">
                                    <i class="category-icon {{ $categoryIcons[$key] ?? 'fas fa-utensils' }}"></i>
                                    <div class="fw-bold">{{ $label }}</div>
                                </div>
                            @endforeach
                            </div>
                            
                            <input type="hidden" name="category" id="selectedCategory" value="{{ $currentCategory }}">
                            @error('category')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Price Details -->
                    <div class="form-section">
                        <h5><i class="fas fa-rupee-sign me-2"></i>Price Details</h5>
                        <div class="form-section-body">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price (₹) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" 
                                           class="form-control @error('price') is-invalid @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price', $cookedFood->price) }}" 
                                           step="0.01" 
                                           min="0" 
                                           placeholder="0.00"
                                           required>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Current Image -->
                    @if($cookedFood->image)
                    <div class="form-section">
                        <h5><i class="fas fa-image me-2"></i>Current Image</h5>
                        <div class="form-section-body">
                            <div class="current-image-info">
                                <img src="{{ $cookedFood->image_url }}" 
                                     alt="{{ $cookedFood->name }}" 
                                     class="current-image">
                                <p class="text-muted mt-2 mb-0">Current item image</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Upload New Image -->
                    <div class="form-section">
                        <h5><i class="fas fa-upload me-2"></i>{{ $cookedFood->image ? 'Update' : 'Upload' }} Item Image</h5>
                        <div class="form-section-body">
                            <div class="image-preview" id="imagePreview" onclick="document.getElementById('image').click()">
                                <div id="previewContent">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <h6 class="text-muted">Click to {{ $cookedFood->image ? 'update' : 'upload' }} image</h6>
                                    <p class="text-muted mb-0">JPG, PNG, GIF up to 2MB</p>
                                    @if($cookedFood->image)
                                        <small class="text-info">Leave empty to keep current image</small>
                                    @endif
                                </div>
                            </div>
                            
                            <input type="file" 
                                   class="form-control d-none @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-section">
                        <h5><i class="fas fa-toggle-on me-2"></i>Status</h5>
                        <div class="form-section-body">
                            <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                                <option value="active" {{ old('status', $cookedFood->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $cookedFood->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="form-section">
                <div class="form-section-body">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.cooked-foods.show', $cookedFood) }}" class="btn-form-cancel">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn-form-submit">
                            <i class="fas fa-save me-2"></i>Update Item
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.cooked-food-edit-header');
    const formSections = document.querySelectorAll('.form-section');
    
    if (header) header.classList.add('animate-fade-up');
    
    formSections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('animate-fade-up');
        }, index * 150);
    });
    
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const slugPreview = document.getElementById('slugPreview');
    
    function updateSlugPreview() {
        const slug = slugInput.value || generateSlug(nameInput.value);
        slugPreview.textContent = slug ? `URL: /cooked-foods/${slug}` : '';
    }
    
    if (nameInput && slugInput && slugPreview) {
        nameInput.addEventListener('input', function() {
            if (!slugInput.value) {
                updateSlugPreview();
            }
        });
        
        slugInput.addEventListener('input', updateSlugPreview);
        
        // Initial slug preview
        updateSlugPreview();
    }
    
    function generateSlug(text) {
        return text.toLowerCase()
                  .trim()
                  .replace(/[^\w\s-]/g, '')
                  .replace(/[\s_-]+/g, '-')
                  .replace(/^-+|-+$/g, '');
    }
    
    // Category selection
    const categoryOptions = document.querySelectorAll('.category-option');
    const selectedCategoryInput = document.getElementById('selectedCategory');
    
    categoryOptions.forEach(option => {
        option.addEventListener('click', function() {
            categoryOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            selectedCategoryInput.value = this.dataset.category;
        });
    });
    
    // Image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewContent = document.getElementById('previewContent');
    
    if (imageInput && imagePreview && previewContent) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.classList.add('has-image');
                    previewContent.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" class="preview-image">
                        <div class="mt-2">
                            <small class="text-muted">${file.name}</small>
                            <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="removeImage()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    window.removeImage = function() {
        if (imageInput && imagePreview && previewContent) {
            imageInput.value = '';
            imagePreview.classList.remove('has-image');
            previewContent.innerHTML = `
                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                <h6 class="text-muted">Click to {{ $cookedFood->image ? 'update' : 'upload' }} image</h6>
                <p class="text-muted mb-0">JPG, PNG, GIF up to 2MB</p>
                @if($cookedFood->image)
                    <small class="text-info">Leave empty to keep current image</small>
                @endif
            `;
        }
    };
    
    // Enhanced form validation feedback
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating Item...';
                submitBtn.disabled = true;
            }
        });
    }
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.form-control, .form-select, .btn-form-submit, .btn-form-cancel, .category-option');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            if (!this.classList.contains('category-option')) {
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        element.addEventListener('mouseleave', function() {
            if (!this.classList.contains('category-option') && !this.classList.contains('selected')) {
                this.style.transform = 'translateY(0)';
            }
        });
    });
});
</script>
@endpush
