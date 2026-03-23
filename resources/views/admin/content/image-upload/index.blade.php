@extends('admin.layouts.app')

@section('title', 'Image Upload')
@section('page-title', 'Image Upload')

@push('styles')
<style>
.image-upload-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.page-header {
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

.page-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.btn-upload {
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
}

.btn-upload:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
}

.image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.image-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.image-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border-color: #fe5716;
}

.image-preview {
    width: 100%;
    height: 200px;
    object-fit: cover;
    background: #f8f9fa;
}

.image-info {
    padding: 15px;
}

.image-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    font-size: 14px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.image-meta {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 10px;
}

.image-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn-action {
    flex: 1;
    padding: 8px 12px;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.btn-edit {
    background: #f39c12;
    color: white;
}

.btn-edit:hover {
    background: #e67e22;
    color: white;
}

.btn-delete {
    background: #e74c3c;
    color: white;
}

.btn-delete:hover {
    background: #c0392b;
    color: white;
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

.pagination-wrapper {
    margin-top: 25px;
    display: flex;
    justify-content: center;
}
</style>
@endpush

@section('content')
<div class="image-upload-wrapper">
    <div class="page-header">
        <div>
            <h1><i class="fas fa-image me-2"></i>Image Upload</h1>
            <p class="text-muted mb-0">Manage your uploaded images</p>
        </div>
        <a href="{{ route('admin.content.image-upload.create') }}" class="btn-upload">
            <i class="fas fa-upload"></i> Upload Images
        </a>
    </div>

    @if($images->count() > 0)
        <div class="image-grid">
            @foreach($images as $image)
            <div class="image-card">
                <img src="{{ asset($image->path) }}" alt="{{ $image->title }}" class="image-preview">
                <div class="image-info">
                    <div class="image-title">{{ $image->title }}</div>
                    <div class="image-meta">
                        <small>{{ $image->formatted_size }} • {{ $image->created_at->format('M d, Y') }}</small>
                    </div>
                    <div class="image-actions">
                        <a href="{{ route('admin.content.image-upload.edit', $image) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.content.image-upload.destroy', $image) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $images->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-images"></i>
            <h5>No Images Found</h5>
            <p>Upload your first image to get started</p>
            <a href="{{ route('admin.content.image-upload.create') }}" class="btn-upload mt-3">
                <i class="fas fa-upload"></i> Upload Images
            </a>
        </div>
    @endif
</div>
@endsection
