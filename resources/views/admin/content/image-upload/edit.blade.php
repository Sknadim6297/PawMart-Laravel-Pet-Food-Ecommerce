@extends('admin.layouts.app')

@section('title', 'Edit Image - ' . $imageUploadUpload->title)
@section('page-title', 'Edit Image')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-dark fw-bold mb-1">✏️ Edit Image</h2>
            <p class="text-muted mb-0">Update image information and metadata</p>
        </div>
        <a href="{{ route('admin.content.image-upload.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Images
        </a>
    </div>

    <div class="row">
        <!-- File Preview -->
        <div class="col-lg-5">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold text-dark">🖼️ File Preview</h5>
                </div>
                <div class="card-body text-center">
                    @if(str_starts_with($imageUploadUpload->mime_type, 'image/'))
                        <img src="{{ asset($imageUploadUpload->path) }}" alt="{{ $imageUploadUpload->title }}" 
                             class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                    @else
                        <div class="py-5">
                            @switch(true)
                                @case(str_contains($imageUpload->mime_type, 'pdf'))
                                    <i class="fas fa-file-pdf fa-5x text-danger mb-3"></i>
                                    @break
                                @case(str_contains($imageUpload->mime_type, 'word'))
                                    <i class="fas fa-file-word fa-5x text-primary mb-3"></i>
                                    @break
                                @case(str_contains($imageUpload->mime_type, 'excel'))
                                    <i class="fas fa-file-excel fa-5x text-success mb-3"></i>
                                    @break
                                @case(str_contains($imageUpload->mime_type, 'powerpoint'))
                                    <i class="fas fa-file-powerpoint fa-5x text-warning mb-3"></i>
                                    @break
                                @default
                                    <i class="fas fa-file fa-5x text-muted mb-3"></i>
                            @endswitch
                            <h5 class="text-muted">{{ strtoupper(pathinfo($imageUpload->original_name, PATHINFO_EXTENSION)) }} File</h5>
                        </div>
                    @endif
                </div>
            </div>

            <!-- File Information -->
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold text-dark">📊 File Information</h5>
                </div>
                <div class="card-body">
                    <div class="info-item mb-3">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">Original Name:</strong>
                            <span class="text-muted">{{ $imageUpload->original_name }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item mb-3">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">File Size:</strong>
                            <span class="text-muted">{{ $imageUpload->formatted_size }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item mb-3">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">MIME Type:</strong>
                            <span class="text-muted">{{ $imageUpload->mime_type }}</span>
                        </div>
                    </div>

                    @if($imageUpload->width && $imageUpload->height)
                        <div class="info-item mb-3">
                            <div class="d-flex justify-content-between">
                                <strong class="text-dark">Dimensions:</strong>
                                <span class="text-muted">{{ $imageUpload->dimensions }}</span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="info-item mb-3">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">Uploaded:</strong>
                            <span class="text-muted">{{ $imageUpload->created_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                    
                    <div class="info-item mb-3">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">Uploaded By:</strong>
                            <span class="text-muted">{{ $imageUpload->user->name ?? 'Unknown' }}</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="d-flex justify-content-between">
                            <strong class="text-dark">Status:</strong>
                            <span class="badge {{ $imageUpload->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $imageUpload->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold text-dark">✏️ Edit File Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.content.image-upload.update', $imageUploadUpload) }}" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold text-dark">
                                📄 Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $imageUploadUpload->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle text-primary"></i>
                                A descriptive title for this file
                            </div>
                        </div>

                        <!-- Alt Text -->
                        <div class="mb-4">
                            <label for="alt_text" class="form-label fw-semibold text-dark">
                                🏷️ Alt Text
                            </label>
                            <input type="text" class="form-control @error('alt_text') is-invalid @enderror" 
                                   id="alt_text" name="alt_text" value="{{ old('alt_text', $imageUploadUpload->alt_text) }}" 
                                       placeholder="Describe what's in the image">
                                @error('alt_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle text-primary"></i>
                                    Important for accessibility and SEO
                                </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold text-dark">
                                📝 Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Add a detailed description of this image">{{ old('description', $imageUploadUpload->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="form-label fw-semibold text-dark">
                                🏷️ Tags
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                                       id="tags" name="tags" value="{{ old('tags', is_array($imageUpload->tags) ? implode(', ', $imageUpload->tags) : $imageUpload->tags) }}" 
                                       placeholder="tag1, tag2, tag3">
                                <button type="button" class="btn btn-sm btn-outline-info" id="toggleGalleryTag">
                                    <i class="fas fa-images"></i> {{ in_array('gallery', is_array($imageUpload->tags) ? $imageUpload->tags : []) ? 'Remove from Gallery' : 'Add to Gallery' }}
                                </button>
                            </div>
                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle text-primary"></i>
                                Separate tags with commas. Use "gallery" tag for Photo Gallery, "video-gallery" tag for Video Gallery.
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" 
                                       value="1" {{ old('status', $imageUploadUpload->status) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold text-dark" for="status">
                                    ✅ Active Status
                                </label>
                            </div>
                            <div class="form-text">
                                <i class="fas fa-info-circle text-primary"></i>
                                Inactive files won't be visible in the public gallery
                            </div>
                        </div>

                        <!-- Copy URL Section -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">
                                🔗 File URL
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fileUrl" 
                                       value="{{ asset($imageUploadUpload->path) }}" readonly>
                                <button type="button" class="btn btn-outline-primary" id="copyUrlBtn">
                                    <i class="fas fa-copy"></i> Copy
                                </button>
                            </div>
                            <div class="form-text">
                                <i class="fas fa-info-circle text-primary"></i>
                                Use this URL to embed the file in your content
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <form action="{{ route('admin.content.image-upload.destroy', $imageUploadUpload) }}" 
                                      method="POST" class="d-inline" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete(event, 'file')">
                                        <i class="fas fa-trash"></i> Delete File
                                    </button>
                                </form>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.content.image-upload.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update File
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Usage Information -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold text-dark">📈 Usage Information</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="usage-stat">
                                <div class="stat-icon mb-2">
                                    <i class="fas fa-eye fa-2x text-primary"></i>
                                </div>
                                <h4 class="fw-bold text-dark">{{ $imageUpload->views ?? 0 }}</h4>
                                <p class="text-muted mb-0">Views</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="usage-stat">
                                <div class="stat-icon mb-2">
                                    <i class="fas fa-download fa-2x text-success"></i>
                                </div>
                                <h4 class="fw-bold text-dark">{{ $imageUpload->downloads ?? 0 }}</h4>
                                <p class="text-muted mb-0">Downloads</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="usage-stat">
                                <div class="stat-icon mb-2">
                                    <i class="fas fa-calendar fa-2x text-info"></i>
                                </div>
                                <h4 class="fw-bold text-dark">{{ $imageUpload->created_at->diffForHumans() }}</h4>
                                <p class="text-muted mb-0">Uploaded</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.info-item {
    padding: 8px 0;
    border-bottom: 1px solid #f1f3f4;
}

.info-item:last-child {
    border-bottom: none;
}

.usage-stat {
    padding: 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.usage-stat:hover {
    background-color: rgba(250, 68, 29, 0.05);
    transform: translateY(-2px);
}

.stat-icon {
    opacity: 0.8;
}
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyUrlBtn = document.getElementById('copyUrlBtn');
    const fileUrl = document.getElementById('fileUrl');

    // Copy URL functionality
    copyUrlBtn.addEventListener('click', function() {
        fileUrl.select();
        fileUrl.setSelectionRange(0, 99999); // For mobile devices
        
        navigator.clipboard.writeText(fileUrl.value).then(() => {
            // Update button state
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i> Copied!';
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-success');
            
            // Reset after 2 seconds
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-primary');
            }, 2000);
            
            showToast('File URL copied to clipboard!', 'success');
        }).catch(() => {
            // Fallback for older browsers
            document.execCommand('copy');
            showToast('File URL copied to clipboard!', 'success');
        });
    });

    // Toggle gallery tag
    const toggleGalleryTagBtn = document.getElementById('toggleGalleryTag');
    if (toggleGalleryTagBtn) {
        toggleGalleryTagBtn.addEventListener('click', function() {
            const tagsInput = document.getElementById('tags');
            let tags = tagsInput.value.split(',').map(t => t.trim()).filter(t => t);
            const hasGalleryTag = tags.includes('gallery');
            
            if (hasGalleryTag) {
                tags = tags.filter(t => t !== 'gallery');
                this.innerHTML = '<i class="fas fa-images"></i> Add to Gallery';
            } else {
                if (!tags.includes('gallery')) {
                    tags.push('gallery');
                }
                this.innerHTML = '<i class="fas fa-images"></i> Remove from Gallery';
            }
            
            tagsInput.value = tags.join(', ');
        });
    }


    // Form validation
    document.getElementById('editForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();

        if (!title) {
            e.preventDefault();
            showToast('Please enter a title for the file', 'error');
            document.getElementById('title').focus();
            return;
        }

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
        submitBtn.disabled = true;

        // Reset button after 5 seconds (in case of server error)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
});

// Delete confirmation
function confirmDelete(event, type) {
    event.preventDefault();
    
    if (confirm(`Are you sure you want to delete this ${type}? This action cannot be undone.`)) {
        // Show loading state
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
        btn.disabled = true;
        
        // Submit the form
        event.target.closest('form').submit();
    }
}
</script>
@endpush
