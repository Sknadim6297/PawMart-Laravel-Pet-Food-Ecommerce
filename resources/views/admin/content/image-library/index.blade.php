@extends('admin.layouts.app')

@section('title', 'Image Library')
@section('page-title', 'Image Library')

@push('styles')
<style>
.image-library-management-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.image-library-header {
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

.image-library-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.image-library-header p {
    color: #6c757d;
    margin: 5px 0 0 0;
    font-size: 14px;
}

.btn-add-image {
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

.btn-add-image:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.btn-bulk-delete {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
}

.btn-bulk-delete:hover {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
}

.image-library-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    position: relative;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #fe5716, #ff7a3d);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-card.total-files {
    border-left-color: #fe5716;
}

.stat-card.images-count {
    border-left-color: #27ae60;
}

.stat-card.active-files {
    border-left-color: #f39c12;
}

.stat-card.total-size {
    border-left-color: #3498db;
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
}

.stat-label {
    color: #6c757d;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-card.total-files .stat-number {
    color: #fe5716;
}

.stat-card.images-count .stat-number {
    color: #27ae60;
}

.stat-card.active-files .stat-number {
    color: #f39c12;
}

.stat-card.total-size .stat-number {
    color: #3498db;
}

.image-library-filters-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.image-library-filters-header {
    background: #f8f9fa;
    padding: 15px 20px;
    border-bottom: 1px solid #e9ecef;
}

.image-library-filters-header h5 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin: 0;
}

.image-library-filters-body {
    padding: 20px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 13px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 13px;
    transition: all 0.3s ease;
    background: #ffffff;
}

.form-control:focus, .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
    background: #ffffff;
}

.input-group-sm .form-control {
    padding: 6px 10px;
    font-size: 12px;
}

.input-group-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-right: none;
    border-radius: 8px 0 0 8px;
    padding: 6px 10px;
}

.input-group .form-control {
    border-left: none;
    border-radius: 0 8px 8px 0;
}

.btn-filter {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 13px;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-reset {
    background: #6c757d;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 13px;
}

.btn-reset:hover {
    background: #545b62;
    color: white;
    transform: translateY(-1px);
    text-decoration: none;
}

.image-grid-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.image-grid-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.image-grid-header h5 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.image-grid-body {
    padding: 20px;
}

.image-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid transparent;
}

.image-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border-color: #fe5716;
}

.image-preview {
    border-radius: 12px 12px 0 0;
    background: #f8f9fa;
}

.status-toggle {
    transform: scale(0.9);
}

.file-checkbox {
    transform: scale(1.1);
}

.image-card.selected {
    border: 2px solid #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.25);
}

.btn-action {
    border: none;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    height: 32px;
}

.btn-view {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
}

.btn-view:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.btn-edit {
    background: linear-gradient(135deg, #f39c12, #e67e22);
    color: white;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #e67e22, #f39c12);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
}

.btn-download {
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    color: white;
}

.btn-download:hover {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
}

.admin-pagination-wrapper {
    background: white;
    border-radius: 15px;
    padding: 20px;
    margin-top: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.admin-pagination .page-link {
    background: white;
    border: 2px solid #e9ecef;
    color: #6c757d;
    padding: 10px 15px;
    margin: 0 2px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
}

.admin-pagination .page-link:hover {
    background: #fe5716;
    border-color: #fe5716;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(254, 87, 22, 0.3);
}

.admin-pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    border-color: #fe5716;
    color: white;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.admin-pagination .page-item.disabled .page-link {
    background: #f8f9fa;
    border-color: #e9ecef;
    color: #adb5bd;
}

.pagination-info {
    color: #6c757d;
    font-weight: 600;
    font-size: 14px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.empty-state i {
    font-size: 64px;
    color: #dee2e6;
    margin-bottom: 20px;
}

.empty-state h5 {
    color: #6c757d;
    font-weight: 600;
    margin-bottom: 10px;
}

.empty-state p {
    color: #adb5bd;
    margin-bottom: 25px;
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

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-fade-up {
    animation: fadeInUp 0.6s ease-out;
}

.animate-slide-left {
    animation: slideInLeft 0.6s ease-out;
}

@media (max-width: 768px) {
    .image-library-management-wrapper {
        padding: 15px;
    }
    
    .image-library-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .image-library-header h1 {
        font-size: 24px;
    }
    
    .image-library-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 28px;
    }
    
    .image-library-filters-body {
        padding: 15px;
    }
    
    .image-grid-header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }
    
    .image-grid-body {
        padding: 15px;
    }
    
    .admin-pagination-wrapper {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }
    
    .admin-pagination .page-link {
        min-width: 38px;
        height: 38px;
        font-size: 13px;
        border-radius: 8px;
    }
    
    .pagination-info {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .image-library-management-wrapper {
        padding: 10px;
    }
    
    .image-library-header h1 {
        font-size: 20px;
    }
    
    .btn-add-image, .btn-bulk-delete {
        width: 100%;
        justify-content: center;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .image-library-filters-body {
        padding: 10px;
    }
    
    .image-grid-body {
        padding: 10px;
    }
    
    .admin-pagination .page-link {
        min-width: 32px;
        height: 32px;
        font-size: 12px;
        padding: 6px 10px;
    }
}
</style>
@endpush

@section('content')
<div class="image-library-management-wrapper">
    <!-- Page Header -->
    <div class="image-library-header">
        <div>
            <h1><i class="fas fa-images me-2"></i>Image Library</h1>
            <p>Manage your media files and images</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn-bulk-delete" id="bulkDeleteBtn" style="display: none;">
                <i class="fas fa-trash"></i> Delete Selected
            </button>
            <a href="{{ route('admin.content.image-library.create') }}" class="btn-add-image">
                <i class="fas fa-upload"></i> Upload Files
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="image-library-stats">
        <div class="stat-card total-files">
            <div class="stat-number">{{ $images->total() }}</div>
            <div class="stat-label">Total Files</div>
        </div>
        <div class="stat-card images-count">
            <div class="stat-number">{{ \App\Models\ImageLibrary::where('mime_type', 'like', 'image/%')->count() }}</div>
            <div class="stat-label">Images</div>
        </div>
        <div class="stat-card active-files">
            <div class="stat-number">{{ \App\Models\ImageLibrary::where('status', true)->count() }}</div>
            <div class="stat-label">Active Files</div>
        </div>
        <div class="stat-card total-size">
            <div class="stat-number">{{ number_format(\App\Models\ImageLibrary::sum('size') / (1024 * 1024), 1) }}MB</div>
            <div class="stat-label">Total Size</div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="image-library-filters-wrapper">
        <div class="image-library-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="image-library-filters-body">
            <form method="GET" action="{{ route('admin.content.image-library.index') }}" class="row g-2 align-items-end">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="form-label">🔍 Search Files</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Title or filename..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">📊 Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">📁 File Type</label>
                    <select name="type" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Images</option>
                        <option value="document" {{ request('type') === 'document' ? 'selected' : '' }}>Documents</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">🔄 Sort</label>
                    <select name="sort_by" class="form-select form-select-sm">
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date Upload</option>
                        <option value="title" {{ request('sort_by') === 'title' ? 'selected' : '' }}>Title</option>
                        <option value="size" {{ request('sort_by') === 'size' ? 'selected' : '' }}>File Size</option>
                        <option value="original_name" {{ request('sort_by') === 'original_name' ? 'selected' : '' }}>Filename</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="d-flex gap-1">
                        <button type="submit" class="btn-filter btn-sm">
                            <i class="fas fa-filter"></i>
                        </button>
                        <a href="{{ route('admin.content.image-library.index') }}" class="btn-reset btn-sm">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Images Grid -->
    <div class="image-grid-wrapper">
        <div class="image-grid-header">
            <h5><i class="fas fa-folder me-2"></i>Media Files</h5>
            <div class="d-flex align-items-center gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label fw-semibold" for="selectAll">Select All</label>
                </div>
                <span class="badge bg-light text-dark border px-3 py-2">{{ $images->total() }} files</span>
            </div>
        </div>
        <div class="image-grid-body">
            @if($images->count() > 0)
                <div class="row g-3">
                    @foreach($images as $image)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="image-card card h-100 border-0 shadow-sm position-relative" data-id="{{ $image->id }}">
                                <!-- Selection Checkbox -->
                                <div class="position-absolute top-0 start-0 p-2 z-3">
                                    <div class="form-check">
                                        <input class="form-check-input file-checkbox" type="checkbox" value="{{ $image->id }}">
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="position-absolute top-0 end-0 p-2 z-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status-toggle" type="checkbox" 
                                               data-id="{{ $image->id }}" 
                                               {{ $image->status ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <!-- Image/File Preview -->
                                <div class="image-preview bg-light d-flex align-items-center justify-content-center" style="height: 200px; overflow: hidden;">
                                    @if(str_starts_with($image->mime_type, 'image/'))
                                        <img src="{{ asset($image->path) }}" alt="{{ $image->title }}" 
                                             class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                    @else
                                        <div class="text-center">
                                            @switch(true)
                                                @case(str_contains($image->mime_type, 'pdf'))
                                                    <i class="fas fa-file-pdf fa-3x text-danger"></i>
                                                    @break
                                                @case(str_contains($image->mime_type, 'word'))
                                                    <i class="fas fa-file-word fa-3x text-primary"></i>
                                                    @break
                                                @default
                                                    <i class="fas fa-file fa-3x text-muted"></i>
                                            @endswitch
                                            <div class="mt-2 small text-muted">{{ strtoupper(pathinfo($image->original_name, PATHINFO_EXTENSION)) }}</div>
                                        </div>
                                    @endif
                                </div>

                                <!-- File Info -->
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1 text-truncate" title="{{ $image->title }}">{{ $image->title }}</h6>
                                    <div class="file-meta">
                                        <small class="text-muted d-block">{{ $image->formatted_size }}</small>
                                        @if($image->width && $image->height)
                                            <small class="text-muted d-block">{{ $image->dimensions }}</small>
                                        @endif
                                        <small class="text-muted d-block">{{ $image->created_at->format('M d, Y') }}</small>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="card-footer bg-white border-0 p-2">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.content.image-library.show', $image) }}" 
                                           class="btn-action btn-view" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.content.image-library.edit', $image) }}" 
                                           class="btn-action btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.content.image-library.download', $image) }}" 
                                           class="btn-action btn-download" title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <form action="{{ route('admin.content.image-library.destroy', $image) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-action btn-delete delete-btn" 
                                                    title="Delete" onclick="confirmDelete(event, 'file')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="empty-state">
                    <i class="fas fa-images"></i>
                    <h5>No files found</h5>
                    <p>Upload your first file to get started.</p>
                    <a href="{{ route('admin.content.image-library.create') }}" class="btn-add-image">
                        <i class="fas fa-upload"></i> Upload Files
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Pagination -->
    @if($images->count() > 0)
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} files
            </div>
            <nav>
                {{ $images->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.image-library-header');
    const stats = document.querySelector('.image-library-stats');
    const filters = document.querySelector('.image-library-filters-wrapper');
    const grid = document.querySelector('.image-grid-wrapper');
    
    if (header) header.classList.add('animate-fade-up');
    if (stats) stats.classList.add('animate-slide-left');
    if (filters) filters.classList.add('animate-fade-up');
    if (grid) grid.classList.add('animate-slide-left');
    
    // Animate stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 100);
    });
    
    // Animate image cards
    const imageCards = document.querySelectorAll('.image-card');
    imageCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 50);
    });

    const selectAllCheckbox = document.getElementById('selectAll');
    const fileCheckboxes = document.querySelectorAll('.file-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        fileCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
            toggleCardSelection(checkbox);
        });
        toggleBulkDeleteButton();
    });

    // Individual checkbox functionality
    fileCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            toggleCardSelection(this);
            toggleBulkDeleteButton();
            
            // Update select all checkbox
            const checkedCount = document.querySelectorAll('.file-checkbox:checked').length;
            selectAllCheckbox.checked = checkedCount === fileCheckboxes.length;
            selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < fileCheckboxes.length;
        });
    });

    // Toggle card selection visual
    function toggleCardSelection(checkbox) {
        const card = checkbox.closest('.image-card');
        if (checkbox.checked) {
            card.classList.add('selected');
        } else {
            card.classList.remove('selected');
        }
    }

    // Toggle bulk delete button visibility
    function toggleBulkDeleteButton() {
        const checkedCount = document.querySelectorAll('.file-checkbox:checked').length;
        if (checkedCount > 0) {
            bulkDeleteBtn.style.display = 'block';
            bulkDeleteBtn.innerHTML = `<i class="fas fa-trash"></i> Delete Selected (${checkedCount})`;
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    // Bulk delete functionality
    bulkDeleteBtn.addEventListener('click', function() {
        const selectedIds = Array.from(document.querySelectorAll('.file-checkbox:checked'))
                                .map(checkbox => checkbox.value);
        
        if (selectedIds.length === 0) {
            showToast('Please select files to delete', 'warning');
            return;
        }

        if (confirm(`Are you sure you want to delete ${selectedIds.length} selected file(s)?`)) {
            fetch('{{ route("admin.content.image-library.bulk-delete") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    // Remove selected cards from DOM
                    selectedIds.forEach(id => {
                        const card = document.querySelector(`[data-id="${id}"]`);
                        if (card) card.remove();
                    });
                    // Reset UI
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                    toggleBulkDeleteButton();
                } else {
                    showToast('Failed to delete files', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred', 'error');
            });
        }
    });

    // Status toggle functionality
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const imageId = this.dataset.id;
            const isActive = this.checked;
            
            fetch(`/admin/content/image-library/${imageId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                } else {
                    showToast('Failed to update status', 'error');
                    this.checked = !isActive; // Revert the toggle
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred', 'error');
                this.checked = !isActive; // Revert the toggle
            });
        });
    });
});
</script>
@endpush
