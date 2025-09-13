@extends('admin.layouts.app')

@section('title', 'Blog Management')

@push('styles')
<style>
/* ========================================
   BLOG MANAGEMENT STYLES
======================================== */
.blogs-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.blogs-header {
    background: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #fe5716;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blogs-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.blogs-header p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}

.btn-add-blog {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-add-blog:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.blogs-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    text-align: center;
    border-left: 4px solid #fe5716;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #fe5716;
    margin-bottom: 5px;
    font-family: 'Poppins', sans-serif;
}

.stat-label {
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
}

/* Blog Statistics Cards */
.stat-card.total-blogs {
    border-left-color: #3498db;
}

.stat-card.published-blogs {
    border-left-color: #2ecc71;
}

.stat-card.draft-blogs {
    border-left-color: #f39c12;
}

.stat-card.total-views {
    border-left-color: #9b59b6;
}

.stat-card.total-blogs .stat-number {
    color: #3498db;
}

.stat-card.published-blogs .stat-number {
    color: #2ecc71;
}

.stat-card.draft-blogs .stat-number {
    color: #f39c12;
}

.stat-card.total-views .stat-number {
    color: #9b59b6;
}

.blogs-filters-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.blogs-filters-header {
    background: #f8f9fa;
    padding: 15px 20px;
    border-bottom: 1px solid #e9ecef;
}

.blogs-filters-header h5 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin: 0;
}

.blogs-filters-body {
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
    padding: 8px 12px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 12px;
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
    font-size: 12px;
}

.btn-reset:hover {
    background: #545b62;
    color: white;
    transform: translateY(-1px);
    text-decoration: none;
}
</style>
@endpush

@section('content')
<div class="blogs-management-wrapper">
    <!-- Page Header -->
    <div class="blogs-header">
        <div>
            <h1><i class="fas fa-blog me-3"></i>Blog Management</h1>
            <p>Create and manage your blog posts</p>
        </div>
        <a href="{{ route('admin.content.blogs.create') }}" class="btn-add-blog">
            <i class="fas fa-plus me-2"></i>Add Blog Post
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="blogs-stats">
        <div class="stat-card total-blogs">
            <div class="stat-number">{{ $blogs->total() }}</div>
            <div class="stat-label">Total Blog Posts</div>
        </div>
        <div class="stat-card published-blogs">
            <div class="stat-number">{{ \App\Models\Blog::where('status', true)->whereNotNull('published_at')->count() }}</div>
            <div class="stat-label">Published Posts</div>
        </div>
        <div class="stat-card draft-blogs">
            <div class="stat-number">{{ \App\Models\Blog::where('status', false)->orWhereNull('published_at')->count() }}</div>
            <div class="stat-label">Draft Posts</div>
        </div>
        <div class="stat-card total-views">
            <div class="stat-number">{{ \App\Models\Blog::sum('views_count') }}</div>
            <div class="stat-label">Total Views</div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="blogs-filters-wrapper">
        <div class="blogs-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="blogs-filters-body">
            <form method="GET" action="{{ route('admin.content.blogs.index') }}" class="row g-2 align-items-end">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">🔍 Search</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Title or content..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">📊 Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Published</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">📂 Category</label>
                    <select name="category" class="form-select form-select-sm">
                        <option value="">All</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">⭐ Featured</label>
                    <select name="featured" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="yes" {{ request('featured') === 'yes' ? 'selected' : '' }}>Featured</option>
                        <option value="no" {{ request('featured') === 'no' ? 'selected' : '' }}>Not Featured</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">🔄 Sort</label>
                    <select name="sort_by" class="form-select form-select-sm">
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date Created</option>
                        <option value="title" {{ request('sort_by') === 'title' ? 'selected' : '' }}>Title</option>
                        <option value="views_count" {{ request('sort_by') === 'views_count' ? 'selected' : '' }}>Views</option>
                        <option value="published_at" {{ request('sort_by') === 'published_at' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="col-lg-1 col-md-2 col-sm-6">
                    <div class="d-flex gap-1">
                        <button type="submit" class="btn-filter btn-sm">
                            <i class="fas fa-filter"></i>
                        </button>
                        <a href="{{ route('admin.content.blogs.index') }}" class="btn-reset btn-sm">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Blog Posts Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-dark">📝 Blog Posts</h5>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark border">{{ $blogs->total() }} total</span>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            @if($blogs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 text-dark fw-semibold">Sl No.</th>
                                <th class="border-0 text-dark fw-semibold">Status</th>
                                <th class="border-0 text-dark fw-semibold">Image</th>
                                <th class="border-0 text-dark fw-semibold">Title</th>
                                <th class="border-0 text-dark fw-semibold">Description</th>
                                <th class="border-0 text-dark fw-semibold text-center">No. Of Views</th>
                                <th class="border-0 text-dark fw-semibold">Added Date</th>
                                <th class="border-0 text-dark fw-semibold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $index => $blog)
                                <tr class="border-bottom">
                                    <td>
                                        <span class="fw-semibold text-muted">
                                            {{ $blogs->firstItem() + $index }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" type="checkbox" 
                                                       data-id="{{ $blog->id }}" 
                                                       {{ $blog->status ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {!! $blog->status_badge !!}
                                                </label>
                                            </div>
                                            @if($blog->featured)
                                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">
                                                    <i class="fas fa-star"></i> Featured
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="blog-image">
                                            @if($blog->image)
                                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" 
                                                     class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="blog-info">
                                            <h6 class="mb-1 fw-semibold text-dark">{{ Str::limit($blog->title, 40) }}</h6>
                                            <div class="d-flex align-items-center gap-2 text-muted small">
                                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                                    {{ $blog->category->name }}
                                                </span>
                                                <span>by {{ $blog->user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">{{ Str::limit($blog->description, 80) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <span class="fw-bold text-dark">{{ number_format($blog->views_count) }}</span>
                                            <small class="text-muted">views</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <div class="fw-semibold text-dark">{{ $blog->created_at->format('M d, Y') }}</div>
                                            <small class="text-muted">{{ $blog->created_at->format('h:i A') }}</small>
                                            @if($blog->published_at)
                                                <div class="text-success small">
                                                    <i class="fas fa-check-circle"></i> Published
                                                </div>
                                            @else
                                                <div class="text-warning small">
                                                    <i class="fas fa-clock"></i> Draft
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('admin.content.blogs.show', $blog) }}" 
                                               class="btn btn-sm btn-outline-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.content.blogs.edit', $blog) }}" 
                                               class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-primary featured-toggle" 
                                                    data-id="{{ $blog->id }}" title="Toggle Featured">
                                                <i class="fas fa-star {{ $blog->featured ? 'text-warning' : '' }}"></i>
                                            </button>
                                            <form action="{{ route('admin.content.blogs.destroy', $blog) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn" 
                                                        title="Delete" onclick="confirmDelete(event, 'blog post')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3 border-top">
                    <div class="pagination-info">
                        <span class="text-muted">
                            Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
                        </span>
                    </div>
                    <nav>
                        {{ $blogs->links() }}
                    </nav>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-blog fa-3x text-muted"></i>
                    </div>
                    <h5 class="text-muted mb-3">No blog posts found</h5>
                    <p class="text-muted mb-4">Get started by creating your first blog post.</p>
                    <a href="{{ route('admin.content.blogs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create Blog Post
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, var(--pet-orange), #e55a4f);
}

.bg-gradient-success {
    background: linear-gradient(135deg, var(--pet-green), #16a085);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, var(--pet-yellow), #f39c12);
}

.bg-gradient-info {
    background: linear-gradient(135deg, var(--pet-blue), #3498db);
}

.table tbody tr:hover {
    background-color: rgba(250, 68, 29, 0.05);
}

.status-toggle {
    transform: scale(1.2);
}

.featured-toggle:hover {
    background-color: var(--pet-yellow);
    border-color: var(--pet-yellow);
    color: white;
}
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Status toggle functionality
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const blogId = this.dataset.id;
            const isActive = this.checked;
            
            fetch(`/admin/content/blogs/${blogId}/toggle-status`, {
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
                    // Update the badge
                    const badge = this.parentElement.querySelector('.badge');
                    if (data.status) {
                        badge.className = 'badge bg-success';
                        badge.textContent = 'Active';
                    } else {
                        badge.className = 'badge bg-danger';
                        badge.textContent = 'Inactive';
                    }
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

    // Featured toggle functionality
    document.querySelectorAll('.featured-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const blogId = this.dataset.id;
            const starIcon = this.querySelector('i');
            
            fetch(`/admin/content/blogs/${blogId}/toggle-featured`, {
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
                    // Update the star icon
                    if (data.featured) {
                        starIcon.classList.add('text-warning');
                    } else {
                        starIcon.classList.remove('text-warning');
                    }
                } else {
                    showToast('Failed to update featured status', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred', 'error');
            });
        });
    });
});
</script>
@endpush
