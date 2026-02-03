@extends('admin.layouts.app')

@section('title', 'Edit About Content')

@push('styles')
<style>
/* ========================================
   ADMIN ABOUT CONTENT EDIT STYLES
======================================== */
.about-content-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.about-content-edit-header {
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

.about-content-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.header-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn-view-content {
    background: linear-gradient(135deg, #f59e0b, #d97706);
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

.btn-view-content:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    color: white;
    text-decoration: none;
}

.btn-back-content {
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

.btn-back-content:hover {
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

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
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
    max-width: 200px;
    max-height: 200px;
    border-radius: 12px;
    border: 2px solid #e9ecef;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
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
    max-height: 200px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(254, 87, 22, 0.2);
}

/* Dynamic Sections */
.dynamic-section {
    border: 2px dashed #e9ecef;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.dynamic-section:hover {
    border-color: #fe5716;
    background: rgba(254, 87, 22, 0.02);
}

.dynamic-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.dynamic-section-title {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Action Buttons */
.form-actions {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    padding: 25px;
    margin-top: 25px;
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

.btn-add-item {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.btn-add-item:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    color: white;
}

.btn-remove-item {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 8px 16px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
}

.btn-remove-item:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
    color: white;
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
    .about-content-edit-wrapper {
        padding: 15px;
    }
    
    .about-content-edit-header {
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .header-actions {
        justify-content: center;
    }
    
    .form-section-body {
        padding: 20px;
    }
    
    .form-actions {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .about-content-edit-wrapper {
        padding: 10px;
    }
    
    .about-content-edit-header {
        padding: 15px;
    }
    
    .form-section-body {
        padding: 15px;
    }
    
    .form-actions {
        padding: 15px;
    }
}
</style>
@endpush

@section('content')
<div class="about-content-edit-wrapper">
    <!-- Page Header -->
    <div class="about-content-edit-header">
        <div>
            <h1><i class="fas fa-edit me-2"></i>Edit About Content</h1>
            <p class="text-muted mb-0">Update your about page content and settings</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.about-content.show', $aboutContent->id) }}" class="btn-view-content">
                <i class="fas fa-eye"></i> View
            </a>
            <a href="{{ route('admin.about-content.index') }}" class="btn-back-content">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
    <form action="{{ route('admin.about-content.update', $aboutContent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="form-section-card">
            <div class="form-section-header">
                <i class="fas fa-info-circle"></i> Basic Information
            </div>
            <div class="form-section-body">
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading"></i> Page Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $aboutContent->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="is_active" class="form-label">
                                <i class="fas fa-toggle-on"></i> Status
                            </label>
                            <select class="form-select @error('is_active') is-invalid @enderror" 
                                    id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $aboutContent->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $aboutContent->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left"></i> Page Description
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="4">{{ old('description', $aboutContent->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="banner_image" class="form-label">
                            <i class="fas fa-image"></i> Banner Image
                        </label>
                        @if($aboutContent->banner_image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($aboutContent->banner_image) }}" alt="Current banner image" class="current-image">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="about_image" class="form-label">
                            <i class="fas fa-image"></i> About Image
                        </label>
                        @if($aboutContent->about_image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($aboutContent->about_image) }}" alt="Current about image" class="current-image">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="about_image" name="about_image" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
                
        <!-- Mission Section -->
        <div class="form-section-card">
            <div class="form-section-header">
                <i class="fas fa-bullseye"></i> Mission Section
            </div>
            <div class="form-section-body">
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mission_title" class="form-label">
                                <i class="fas fa-heading"></i> Mission Title
                            </label>
                            <input type="text" class="form-control @error('mission_title') is-invalid @enderror" 
                                   id="mission_title" name="mission_title" value="{{ old('mission_title', $aboutContent->mission_title) }}">
                            @error('mission_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mission_image" class="form-label">
                                <i class="fas fa-image"></i> Mission Image
                            </label>
                            @if($aboutContent->mission_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $aboutContent->mission_image) }}" 
                                         alt="Current Mission Image" class="current-image">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('mission_image') is-invalid @enderror" 
                                   id="mission_image" name="mission_image" accept="image/*">
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i> Leave empty to keep current image
                            </div>
                            @error('mission_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="mission_content" class="form-label">
                        <i class="fas fa-align-left"></i> Mission Content
                    </label>
                    <textarea class="form-control @error('mission_content') is-invalid @enderror" 
                              id="mission_content" name="mission_content" rows="4">{{ old('mission_content', $aboutContent->mission_content) }}</textarea>
                    @error('mission_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

                <!-- Vision Section -->
                <div class="section-header">
                    <h3 class="section-title"><i class="fas fa-eye me-2"></i>Vision Section</h3>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="vision_title" class="form-label">Vision Title</label>
                            <input type="text" class="form-control @error('vision_title') is-invalid @enderror" 
                                   id="vision_title" name="vision_title" value="{{ old('vision_title', $aboutContent->vision_title) }}">
                            @error('vision_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="vision_image" class="form-label">Vision Image</label>
                            @if($aboutContent->vision_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $aboutContent->vision_image) }}" 
                                         alt="Current Vision Image" class="current-image">
                                    <p class="text-muted mt-1"><small>Current image</small></p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('vision_image') is-invalid @enderror" 
                                   id="vision_image" name="vision_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                            @error('vision_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="vision_content" class="form-label">Vision Content</label>
                    <textarea class="form-control @error('vision_content') is-invalid @enderror" 
                              id="vision_content" name="vision_content" rows="4">{{ old('vision_content', $aboutContent->vision_content) }}</textarea>
                    @error('vision_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Features Section -->
                <div class="section-header">
                    <h3 class="section-title"><i class="fas fa-star me-2"></i>Features Section</h3>
                </div>
                
                <div id="features-container">
                    @if($aboutContent->features && count($aboutContent->features) > 0)
                        @foreach($aboutContent->features as $index => $feature)
                        <div class="feature-item dynamic-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Feature Item</h6>
                                <button type="button" class="btn btn-remove-item" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="features[{{ $index }}][title]" 
                                           placeholder="Feature Title" value="{{ $feature['title'] ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="features[{{ $index }}][icon]" 
                                           placeholder="Feature Icon" value="{{ $feature['icon'] ?? '' }}">
                                </div>
                            </div>
                            <textarea class="form-control" name="features[{{ $index }}][description]" 
                                      placeholder="Feature Description" rows="2">{{ $feature['description'] ?? '' }}</textarea>
                        </div>
                        @endforeach
                    @else
                        <div class="feature-item dynamic-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Feature Item</h6>
                                <button type="button" class="btn btn-remove-item" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="features[0][title]" placeholder="Feature Title">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="features[0][icon]" placeholder="Feature Icon">
                                </div>
                            </div>
                            <textarea class="form-control" name="features[0][description]" placeholder="Feature Description" rows="2"></textarea>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-add-item mb-4" onclick="addFeature()">
                    <i class="fas fa-plus me-1"></i> Add Feature
                </button>

                <!-- Gallery Section -->
                <div class="section-header">
                    <h3 class="section-title"><i class="fas fa-images me-2"></i>Gallery Section</h3>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="gallery_title" class="form-label">Gallery Title</label>
                        <input type="text" class="form-control" id="gallery_title" name="gallery_title" value="{{ old('gallery_title', $aboutContent->gallery_title ?? 'Pet Care Memories') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="gallery_subtitle" class="form-label">Gallery Subtitle</label>
                        <input type="text" class="form-control" id="gallery_subtitle" name="gallery_subtitle" value="{{ old('gallery_subtitle', $aboutContent->gallery_subtitle ?? 'Gallery Photos') }}">
                    </div>
                </div>
                
                <div id="gallery-container">
                    @if($aboutContent->gallery_images && count($aboutContent->gallery_images) > 0)
                        @foreach($aboutContent->gallery_images as $index => $galleryItem)
                        <div class="gallery-item dynamic-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Gallery Item</h6>
                                <button type="button" class="btn btn-remove-item" onclick="removeGallery(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            @if(isset($galleryItem['image']))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $galleryItem['image']) }}" 
                                         alt="Gallery Image" class="current-image">
                                    <p class="text-muted mt-1"><small>Current image</small></p>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" class="form-control mb-2" name="gallery[{{ $index }}][image]" accept="image/*">
                                    <small class="text-muted">Leave empty to keep current image</small>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="gallery[{{ $index }}][caption]" 
                                           placeholder="Image Caption" value="{{ $galleryItem['caption'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="gallery-item dynamic-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Gallery Item</h6>
                                <button type="button" class="btn btn-remove-item" onclick="removeGallery(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" class="form-control mb-2" name="gallery[0][image]" accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="gallery[0][caption]" placeholder="Image Caption">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-add-item mb-4" onclick="addGallery()">
                    <i class="fas fa-plus me-1"></i> Add Gallery Image
                </button>

                <!-- Registration Section -->
                <div class="section-header">
                    <h3 class="section-title"><i class="fas fa-user-plus me-2"></i>Registration Section</h3>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="register_title" class="form-label">Registration Title</label>
                        <input type="text" class="form-control" id="register_title" name="register_title" value="{{ old('register_title', $aboutContent->register_title ?? 'Register your pet with us and Get 5% off their next order') }}">
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="register_description" class="form-label">Registration Description</label>
                        <textarea class="form-control" id="register_description" name="register_description" rows="3">{{ old('register_description', $aboutContent->register_description ?? 'We are your local dog home boarding service giving you complete') }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="register_image" class="form-label">Registration Image</label>
                        @if($aboutContent->register_image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($aboutContent->register_image) }}" alt="Current registration image" class="img-thumbnail" style="max-height: 100px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="register_image" name="register_image" accept="image/*">
                    </div>
                </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <div class="d-flex gap-3 justify-content-end">
                <a href="{{ route('admin.about-content.index') }}" class="btn-form-cancel">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn-form-submit">
                    <i class="fas fa-save"></i> Update About Content
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.about-content-edit-header');
    const formCards = document.querySelectorAll('.form-section-card, .form-actions');
    
    if (header) header.classList.add('animate-fade-up');
    
    formCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 150);
    });
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.btn-add-item, .btn-remove-item');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
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

let featureIndex = {{ $aboutContent->features ? count($aboutContent->features) : 1 }};
let galleryIndex = {{ $aboutContent->gallery_images ? count($aboutContent->gallery_images) : 1 }};

function addFeature() {
    const container = document.getElementById('features-container');
    const newFeature = `
        <div class="feature-item dynamic-section">
            <div class="dynamic-section-header">
                <h6 class="dynamic-section-title">
                    <i class="fas fa-star"></i> Feature Item
                </h6>
                <button type="button" class="btn-remove-item" onclick="removeFeature(this)">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" name="features[${featureIndex}][title]" placeholder="Feature Title">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" name="features[${featureIndex}][icon]" placeholder="Feature Icon">
                </div>
            </div>
            <textarea class="form-control" name="features[${featureIndex}][description]" placeholder="Feature Description" rows="2"></textarea>
        </div>`;
    container.insertAdjacentHTML('beforeend', newFeature);
    featureIndex++;
}

function removeFeature(btn) {
    btn.closest('.feature-item').remove();
}



function addGallery() {
    const container = document.getElementById('gallery-container');
    const newGallery = `
        <div class="gallery-item dynamic-section">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Gallery Item</h6>
                <button type="button" class="btn btn-remove-item" onclick="removeGallery(this)">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="file" class="form-control mb-2" name="gallery[${galleryIndex}][image]" accept="image/*">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control mb-2" name="gallery[${galleryIndex}][caption]" placeholder="Image Caption">
                </div>
            </div>
        </div>`;
    container.insertAdjacentHTML('beforeend', newGallery);
    galleryIndex++;
}

function removeGallery(btn) {
    btn.closest('.gallery-item').remove();
}
</script>
@endpush
@endsection
