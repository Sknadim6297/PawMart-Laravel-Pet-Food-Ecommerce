@extends('admin.layouts.app')

@section('title', 'View About Content')

@push('styles')
<style>
/* ========================================
   ADMIN ABOUT CONTENT SHOW STYLES
======================================== */
.about-content-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.about-content-show-header {
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

.about-content-show-header h1 {
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

.btn-edit-content {
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

.btn-edit-content:hover {
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

/* Detail Cards */
.detail-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.detail-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.section-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 25px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.info-row {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    border-left: 4px solid #fe5716;
    transition: all 0.3s ease;
}

.info-row:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.1);
}

.info-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-value {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-active {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.status-inactive {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
}

.image-preview {
    max-width: 250px;
    max-height: 250px;
    border-radius: 12px;
    border: 2px solid #e9ecef;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.image-preview:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.feature-item, .statistic-item, .gallery-item {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    border-left: 4px solid #fe5716;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.feature-item:hover, .statistic-item:hover, .gallery-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    color: #fe5716;
    font-size: 24px;
    margin-right: 15px;
}

.empty-state {
    text-align: center;
    color: #6c757d;
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 15px;
    border: 2px dashed #e9ecef;
}

.empty-state-icon {
    font-size: 4rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.empty-state h5 {
    color: #6c757d;
    margin-bottom: 10px;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 0;
}

/* Action Buttons */
.action-buttons {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    padding: 25px;
    margin-top: 25px;
}

.btn-action {
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    margin-left: 10px;
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-edit {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-view-website {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
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
    .about-content-show-wrapper {
        padding: 15px;
    }
    
    .about-content-show-header {
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .header-actions {
        justify-content: center;
    }
    
    .info-row {
        padding: 15px;
    }
    
    .action-buttons {
        padding: 20px;
    }
    
    .btn-action {
        margin: 5px;
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .about-content-show-wrapper {
        padding: 10px;
    }
    
    .about-content-show-header {
        padding: 15px;
    }
    
    .info-row {
        padding: 12px;
    }
    
    .action-buttons {
        padding: 15px;
    }
}
</style>
@endpush

@section('content')
<div class="about-content-show-wrapper">
    <div class="about-content-show-header animate-fade-up">
        <h1><i class="fas fa-info-circle"></i> About Content Details</h1>
        <div class="header-actions">
            <a href="{{ route('admin.about-content.edit', $aboutContent->id) }}" class="btn-edit-content">
                <i class="fas fa-edit"></i> Edit Content
            </a>
            <a href="{{ route('admin.about-content.index') }}" class="btn-back-content">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
    
    <div class="detail-card animate-fade-up">
        
        <div class="detail-body">
            <!-- Basic Information -->
            <div class="section-header">
                <i class="fas fa-info-circle"></i>
                <h3 class="section-title">Basic Information</h3>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-heading"></i>
                            Page Title
                        </div>
                        <p class="info-value">{{ $aboutContent->title ?: 'Not set' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-toggle-on"></i>
                            Status
                        </div>
                        <p class="info-value">
                            <span class="status-badge {{ $aboutContent->is_active ? 'status-active' : 'status-inactive' }}">
                                {{ $aboutContent->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="info-row mb-4">
                <div class="info-label">
                    <i class="fas fa-align-left"></i>
                    Page Description
                </div>
                <p class="info-value">{{ $aboutContent->description ?: 'Not set' }}</p>
            </div>
            
            <div class="row mb-4">
                @if($aboutContent->banner_image)
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-image"></i>
                            Banner Image
                        </div>
                        <img src="{{ Storage::url($aboutContent->banner_image) }}" 
                             alt="Banner Image" class="image-preview">
                    </div>
                </div>
                @endif
                @if($aboutContent->about_image)
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-image"></i>
                            About Image
                        </div>
                        <img src="{{ Storage::url($aboutContent->about_image) }}" 
                             alt="About Image" class="image-preview">
                    </div>
                </div>
                @endif
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Status</div>
                        <span class="status-badge {{ $aboutContent->is_active ? 'status-active' : 'status-inactive' }}">
                            <i class="fas {{ $aboutContent->is_active ? 'fa-check' : 'fa-times' }} me-1"></i>
                            {{ $aboutContent->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Created Date</div>
                        <p class="info-value">{{ $aboutContent->created_at->format('M d, Y H:i A') }}</p>
                    </div>
                </div>
            </div>
            
            @if($aboutContent->main_image)
            <div class="info-row mb-4">
                <div class="info-label">Main Image</div>
                <div>
                    <img src="{{ asset('storage/' . $aboutContent->main_image) }}" 
                         alt="Main Image" class="image-preview">
                </div>
            </div>
            @endif

            <!-- Mission Section -->
            <div class="section-header">
                <i class="fas fa-bullseye"></i>
                <h3 class="section-title">Mission Section</h3>
            </div>
            
            @if($aboutContent->mission_title || $aboutContent->mission_content || $aboutContent->mission_image)
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="info-row">
                            <div class="info-label">
                                <i class="fas fa-heading"></i>
                                Mission Title
                            </div>
                            <p class="info-value">{{ $aboutContent->mission_title ?: 'Not set' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($aboutContent->mission_image)
                        <div class="info-row">
                            <div class="info-label">
                                <i class="fas fa-image"></i>
                                Mission Image
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $aboutContent->mission_image) }}" 
                                     alt="Mission Image" class="image-preview">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                @if($aboutContent->mission_content)
                <div class="info-row mb-4">
                    <div class="info-label">
                        <i class="fas fa-align-left"></i>
                        Mission Content
                    </div>
                    <p class="info-value">{{ $aboutContent->mission_content }}</p>
                </div>
                @endif
            @else
                <div class="empty-state mb-4">
                    <div class="empty-state-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h5>No Mission Content</h5>
                    <p>Mission section has not been configured yet.</p>
                </div>
            @endif

            <!-- Vision Section -->
            <div class="section-header">
                <i class="fas fa-eye"></i>
                <h3 class="section-title">Vision Section</h3>
            </div>
            
            @if($aboutContent->vision_title || $aboutContent->vision_content || $aboutContent->vision_image)
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="info-row">
                            <div class="info-label">Vision Title</div>
                            <p class="info-value">{{ $aboutContent->vision_title ?: 'Not set' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($aboutContent->vision_image)
                        <div class="info-row">
                            <div class="info-label">Vision Image</div>
                            <div>
                                <img src="{{ asset('storage/' . $aboutContent->vision_image) }}" 
                                     alt="Vision Image" class="image-preview">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                @if($aboutContent->vision_content)
                <div class="info-row mb-4">
                    <div class="info-label">Vision Content</div>
                    <p class="info-value">{{ $aboutContent->vision_content }}</p>
                </div>
                @endif
            @else
                <div class="empty-state mb-4">
                    <i class="fas fa-eye fa-3x mb-3"></i>
                    <h5>No Vision Content</h5>
                    <p>Vision section has not been configured yet.</p>
                </div>
            @endif

            <!-- Features Section -->
            <div class="section-header">
                <h3 class="section-title"><i class="fas fa-star me-2"></i>Features Section</h3>
            </div>
            
            @if($aboutContent->features && count($aboutContent->features) > 0)
                <div class="row">
                    @foreach($aboutContent->features as $feature)
                    <div class="col-md-6 mb-3">
                        <div class="feature-item">
                            <div class="d-flex align-items-start">
                                @if(isset($feature['icon']))
                                    <i class="{{ $feature['icon'] }} feature-icon"></i>
                                @endif
                                <div>
                                    <h6 class="fw-bold mb-2">{{ $feature['title'] ?? 'Untitled Feature' }}</h6>
                                    <p class="mb-0 text-muted">{{ $feature['description'] ?? 'No description' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state mb-4">
                    <i class="fas fa-star fa-3x mb-3"></i>
                    <h5>No Features</h5>
                    <p>No features have been added yet.</p>
                </div>
            @endif

            <!-- Statistics Section -->
            <div class="section-header">
                <h3 class="section-title"><i class="fas fa-chart-bar me-2"></i>Statistics Section</h3>
            </div>
            
            @if($aboutContent->statistics && count($aboutContent->statistics) > 0)
                <div class="row">
                    @foreach($aboutContent->statistics as $statistic)
                    <div class="col-md-4 mb-3">
                        <div class="statistic-item text-center">
                            <h3 class="fw-bold text-primary mb-2">{{ $statistic['number'] ?? '0' }}</h3>
                            <p class="mb-0 text-muted">{{ $statistic['label'] ?? 'Untitled Statistic' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state mb-4">
                    <i class="fas fa-chart-bar fa-3x mb-3"></i>
                    <h5>No Statistics</h5>
                    <p>No statistics have been added yet.</p>
                </div>
            @endif

            <!-- Gallery Section -->
            <div class="section-header">
                <h3 class="section-title"><i class="fas fa-images me-2"></i>Gallery Section</h3>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Gallery Title</div>
                        <p class="info-value">{{ $aboutContent->gallery_title ?: 'Not set' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <div class="info-label">Gallery Subtitle</div>
                        <p class="info-value">{{ $aboutContent->gallery_subtitle ?: 'Not set' }}</p>
                    </div>
                </div>
            </div>
            
            @if($aboutContent->gallery_images && count($aboutContent->gallery_images) > 0)
                <div class="row">
                    @foreach($aboutContent->gallery_images as $galleryItem)
                    <div class="col-md-4 mb-3">
                        <div class="gallery-item">
                            @if(isset($galleryItem['image']))
                                <img src="{{ asset('storage/' . $galleryItem['image']) }}" 
                                     alt="Gallery Image" class="image-preview w-100">
                            @endif
                            @if(isset($galleryItem['caption']))
                                <p class="mb-0 text-muted mt-2">{{ $galleryItem['caption'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state mb-4">
                    <i class="fas fa-images fa-3x mb-3"></i>
                    <h5>No Gallery Images</h5>
                    <p>No gallery images have been added yet.</p>
                </div>
            @endif

            <!-- Registration Section -->
            <div class="section-header">
                <h3 class="section-title"><i class="fas fa-user-plus me-2"></i>Registration Section</h3>
            </div>
            
            <div class="info-row mb-4">
                <div class="info-label">Registration Title</div>
                <p class="info-value">{{ $aboutContent->register_title ?: 'Not set' }}</p>
            </div>
            
            <div class="info-row mb-4">
                <div class="info-label">Registration Description</div>
                <p class="info-value">{{ $aboutContent->register_description ?: 'Not set' }}</p>
            </div>
            
            @if($aboutContent->register_image)
                <div class="info-row mb-4">
                    <div class="info-label">Registration Image</div>
                    <img src="{{ Storage::url($aboutContent->register_image) }}" 
                         alt="Registration Image" class="image-preview" style="max-height: 200px;">
                </div>
            @endif

            <!-- Actions -->
            <div class="d-flex gap-3 justify-content-end mt-5 pt-4 border-top">
                <form action="{{ route('admin.about-content.destroy', $aboutContent->id) }}" 
                      method="POST" class="d-inline" 
                      onsubmit="return confirm('Are you sure you want to delete this about content? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Content
                    </button>
                </form>
                <a href="{{ route('admin.about-content.edit', $aboutContent->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>Edit Content
                </a>
                <a href="{{ route('about') }}" class="btn btn-primary" target="_blank">
                    <i class="fas fa-external-link-alt me-2"></i>View on Website
                </a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations to page elements
    const elements = document.querySelectorAll('.animate-fade-up');
    elements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Add hover effects to action buttons
    const actionButtons = document.querySelectorAll('.btn-action');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add hover effects to info rows
    const infoRows = document.querySelectorAll('.info-row');
    infoRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});
</script>
@endpush

@endsection
