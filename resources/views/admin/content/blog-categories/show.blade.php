@extends('admin.layouts.app')

@section('title', 'View Blog Category')
@section('page-title', 'View Blog Category')

@push('styles')
<style>
/* ========================================
   ADMIN BLOG CATEGORY SHOW STYLES
======================================== */
.blog-category-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.blog-category-show-header {
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

.blog-category-show-header h1 {
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

.btn-edit-category {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
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

.btn-edit-category:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.4);
    color: white;
    text-decoration: none;
}

.btn-back-categories {
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

.btn-back-categories:hover {
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

.detail-card-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.detail-card-body {
    padding: 25px;
}

.detail-item {
    padding: 15px 0;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-label {
    color: #6c757d;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 150px;
}

.detail-value {
    color: #2c3e50;
    font-weight: 500;
    text-align: right;
    flex: 1;
}

/* Category Image */
.category-image {
    text-align: center;
    padding: 20px;
}

.category-image img {
    max-width: 100%;
    max-height: 200px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Status Badge */
.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.active {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.status-badge.inactive {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
}

/* Associated Blogs Table */
.blogs-table {
    width: 100%;
    border-collapse: collapse;
}

.blogs-table th {
    background: #f8f9fa;
    padding: 15px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #fe5716;
}

.blogs-table td {
    padding: 15px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
}

.blogs-table tr:hover {
    background: rgba(254, 87, 22, 0.05);
}

.blog-image {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    object-fit: cover;
    border: 2px solid #e9ecef;
}

.blog-image-placeholder {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    border: 2px solid #e9ecef;
}

/* Sidebar */
.blog-category-show-sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.action-card, .stats-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.action-card:hover, .stats-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.action-header, .stats-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.action-body, .stats-body {
    padding: 25px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.btn-action {
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 14px;
    text-align: center;
}

.btn-edit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
}

.btn-add-blog {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-toggle {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

/* Blog Actions */
.blog-actions {
    display: flex;
    gap: 8px;
}

.btn-view-blog {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.btn-edit-blog {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.btn-view-blog:hover, .btn-edit-blog:hover {
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
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

/* Empty State */
.empty-blogs {
    text-align: center;
    padding: 60px 20px;
}

.empty-blogs-icon {
    font-size: 4rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.empty-blogs h5 {
    color: #6c757d;
    margin-bottom: 10px;
}

.empty-blogs p {
    color: #6c757d;
    margin-bottom: 30px;
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
    .blog-category-show-wrapper {
        padding: 15px;
    }
    
    .blog-category-show-header {
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .header-actions {
        justify-content: center;
    }
    
    .detail-card-body {
        padding: 20px;
    }
    
    .action-body, .stats-body {
        padding: 20px;
    }
    
    .detail-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .detail-value {
        text-align: left;
    }
}

@media (max-width: 480px) {
    .blog-category-show-wrapper {
        padding: 10px;
    }
    
    .blog-category-show-header {
        padding: 15px;
    }
    
    .detail-card-body {
        padding: 15px;
    }
    
    .action-body, .stats-body {
        padding: 15px;
    }
    
    .blogs-table th,
    .blogs-table td {
        padding: 10px 8px;
    }
}
</style>
@endpush

@section('content')
<div class="blog-category-show-wrapper">
    <!-- Page Header -->
    <div class="blog-category-show-header">
        <div>
            <h1><i class="fas fa-folder-open me-2"></i>View Blog Category</h1>
            <p class="text-muted mb-0">Category details and associated blogs</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.content.blog-categories.edit', $blogCategory) }}" class="btn-edit-category">
                <i class="fas fa-edit"></i> Edit Category
            </a>
            <a href="{{ route('admin.content.blog-categories.index') }}" class="btn-back-categories">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Category Details -->
        <div class="col-lg-8">
            <div class="detail-card">
                <div class="detail-card-header">
                    <i class="fas fa-info-circle"></i> Category Details
                </div>
                <div class="detail-card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-folder"></i> Category Name
                                </span>
                                <span class="detail-value">{{ $blogCategory->name }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-link"></i> Slug
                                </span>
                                <span class="detail-value">{{ $blogCategory->slug }}</span>
                            </div>

                            @if($blogCategory->description)
                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-align-left"></i> Description
                                </span>
                                <span class="detail-value">{{ $blogCategory->description }}</span>
                            </div>
                            @endif

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-toggle-on"></i> Status
                                </span>
                                <span class="detail-value">
                                    <span class="status-badge {{ $blogCategory->status ? 'active' : 'inactive' }}">
                                        {{ $blogCategory->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-sort-numeric-down"></i> Sort Order
                                </span>
                                <span class="detail-value">{{ $blogCategory->sort_order ?? 0 }}</span>
                            </div>
                        </div>

                        @if($blogCategory->image)
                        <div class="col-md-4">
                            <div class="category-image">
                                <img src="{{ asset($blogCategory->image) }}" alt="{{ $blogCategory->name }}">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Associated Blogs -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <i class="fas fa-blog"></i> Associated Blogs ({{ $blogCategory->blogs->count() }})
                    <a href="{{ route('admin.content.blogs.create') }}?category={{ $blogCategory->id }}" class="btn btn-sm btn-outline-light ms-auto">
                        <i class="fas fa-plus"></i> Add Blog
                    </a>
                </div>
                <div class="detail-card-body">
                    @if($blogCategory->blogs->count() > 0)
                        <div class="table-responsive">
                            <table class="blogs-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogCategory->blogs as $blog)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($blog->image)
                                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="blog-image me-2">
                                                @else
                                                    <div class="blog-image-placeholder me-2">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <h6 class="mb-0">{{ Str::limit($blog->title, 40) }}</h6>
                                                    <small class="text-muted">{{ Str::limit($blog->description, 60) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $blog->status ? 'active' : 'inactive' }}">
                                                {{ $blog->status ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($blog->featured)
                                                <span class="status-badge" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                                                    <i class="fas fa-star"></i> Featured
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $blog->published_at->format('M j, Y') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="blog-actions">
                                                <a href="{{ route('admin.content.blogs.show', $blog) }}" 
                                                   class="btn-view-blog" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.content.blogs.edit', $blog) }}" 
                                                   class="btn-edit-blog" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-blogs">
                            <div class="empty-blogs-icon">
                                <i class="fas fa-blog"></i>
                            </div>
                            <h5>No blogs in this category</h5>
                            <p>Create your first blog post for this category.</p>
                            <a href="{{ route('admin.content.blogs.create') }}?category={{ $blogCategory->id }}" 
                               class="btn-edit-category">
                                <i class="fas fa-plus"></i> Create Blog Post
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="blog-category-show-sidebar">
                <!-- Quick Actions -->
                <div class="action-card">
                    <div class="action-header">
                        <i class="fas fa-bolt"></i> Quick Actions
                    </div>
                    <div class="action-body">
                        <div class="action-buttons">
                            <a href="{{ route('admin.content.blog-categories.edit', $blogCategory) }}" 
                               class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit Category
                            </a>
                            <a href="{{ route('admin.content.blogs.create') }}?category={{ $blogCategory->id }}" 
                               class="btn-action btn-add-blog">
                                <i class="fas fa-plus"></i> Add New Blog
                            </a>
                            <button type="button" class="btn-action btn-toggle" 
                                    onclick="toggleStatus({{ $blogCategory->id }})">
                                <i class="fas fa-{{ $blogCategory->status ? 'pause' : 'play' }}"></i> 
                                {{ $blogCategory->status ? 'Deactivate' : 'Activate' }}
                            </button>
                            <form action="{{ route('admin.content.blog-categories.destroy', $blogCategory) }}" 
                                  method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i> Delete Category
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Category Statistics -->
                <div class="stats-card">
                    <div class="stats-header">
                        <i class="fas fa-chart-bar"></i> Statistics
                    </div>
                    <div class="stats-body">
                        <div class="stat-item">
                            <span class="stat-label">Total Blogs:</span>
                            <span class="stat-value">{{ $blogCategory->blogs->count() }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Published Blogs:</span>
                            <span class="stat-value">{{ $blogCategory->blogs->where('status', true)->count() }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Draft Blogs:</span>
                            <span class="stat-value">{{ $blogCategory->blogs->where('status', false)->count() }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Featured Blogs:</span>
                            <span class="stat-value">{{ $blogCategory->blogs->where('featured', true)->count() }}</span>
                        </div>
                        <hr>
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
    const header = document.querySelector('.blog-category-show-header');
    const detailCards = document.querySelectorAll('.detail-card');
    const sidebarCards = document.querySelectorAll('.action-card, .stats-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    detailCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 150);
    });
    
    sidebarCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 600);
    });
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.btn-action, .btn-view-blog, .btn-edit-blog');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

function toggleStatus(categoryId) {
    // Show loading state
    const toggleBtn = document.querySelector(`button[onclick="toggleStatus(${categoryId})"]`);
    const originalContent = toggleBtn.innerHTML;
    toggleBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
    toggleBtn.disabled = true;
    
    fetch(`/admin/content/blog-categories/${categoryId}/toggle-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('Failed to update status', 'error');
            // Restore button state
            toggleBtn.innerHTML = originalContent;
            toggleBtn.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred', 'error');
        // Restore button state
        toggleBtn.innerHTML = originalContent;
        toggleBtn.disabled = false;
    });
}

// Toast notification function
function showToast(message, type = 'info') {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast-notification toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
            ${message}
        </div>
    `;
    
    // Add toast styles
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        animation: slideInRight 0.3s ease-out;
    `;
    
    // Add animation keyframes if not already added
    if (!document.querySelector('#toast-styles')) {
        const style = document.createElement('style');
        style.id = 'toast-styles';
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }
    
    document.body.appendChild(toast);
    
    // Remove toast after 3 seconds
    setTimeout(() => {
        toast.style.animation = 'slideOutRight 0.3s ease-out';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 3000);
}
</script>
@endpush
