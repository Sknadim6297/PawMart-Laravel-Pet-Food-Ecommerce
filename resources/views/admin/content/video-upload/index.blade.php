@extends('admin.layouts.app')

@section('title', 'Video Upload')
@section('page-title', 'Video Upload')

@push('styles')
<style>
.video-upload-wrapper {
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

.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.video-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border-color: #fe5716;
}

.video-preview {
    width: 100%;
    height: 200px;
    background: #000;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.video-preview video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-preview i {
    font-size: 48px;
    color: white;
    opacity: 0.7;
}

.video-info {
    padding: 15px;
}

.video-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    font-size: 14px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.video-meta {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 10px;
}

.video-actions {
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
<div class="video-upload-wrapper">
    <div class="page-header">
        <div>
            <h1><i class="fas fa-video me-2"></i>Video Upload</h1>
            <p class="text-muted mb-0">Manage your uploaded videos</p>
        </div>
        <a href="{{ route('admin.content.video-upload.create') }}" class="btn-upload">
            <i class="fas fa-upload"></i> Upload Videos
        </a>
    </div>

    @if($videos->count() > 0)
        <div class="video-grid">
            @foreach($videos as $video)
            <div class="video-card">
                <div class="video-preview">
                    <video src="{{ asset($video->path) }}" muted></video>
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="video-info">
                    <div class="video-title">{{ $video->title }}</div>
                    <div class="video-meta">
                        <small>{{ $video->formatted_size }} • {{ $video->created_at->format('M d, Y') }}</small>
                    </div>
                    <div class="video-actions">
                        <a href="{{ route('admin.content.video-upload.edit', $video) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.content.video-upload.destroy', $video) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
            {{ $videos->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-video"></i>
            <h5>No Videos Found</h5>
            <p>Upload your first video to get started</p>
            <a href="{{ route('admin.content.video-upload.create') }}" class="btn-upload mt-3">
                <i class="fas fa-upload"></i> Upload Videos
            </a>
        </div>
    @endif
</div>
@endsection
