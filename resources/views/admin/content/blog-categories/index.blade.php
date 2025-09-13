@extends('admin.layouts.app')

@section('title', 'Blog Categories')
@section('page-title', 'Blog Categories')

@push('styles')
<style>
/* ========================================
   ADMIN BLOG CATEGORIES STYLES
======================================== */
.blog-categories-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.blog-categories-header {
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

.blog-categories-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.btn-add-category {
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

.btn-add-category:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.4);
    color: white;
    text-decoration: none;
}

/* Statistics Cards */
.stats-grid {
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
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
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
}

.stat-card.primary::before {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
}

.stat-card.success::before {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stat-card.warning::before {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-card.info::before {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.stat-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.stat-card-title {
    color: #6c757d;
    font-size: 14px;
    font-weight: 600;
    margin: 0;
}

.stat-card-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: white;
}

.stat-card.primary .stat-card-icon {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
}

.stat-card.success .stat-card-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stat-card.warning .stat-card-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-card.info .stat-card-icon {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.stat-card-value {
    color: #2c3e50;
    font-size: 32px;
    font-weight: 700;
    margin: 0;
}

/* Filters Card */
.filters-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.filters-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.filters-body {
    padding: 25px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
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
}

.btn-filter {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.4);
    color: white;
}

.btn-reset {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-reset:hover {
    background: #545b62;
    transform: translateY(-2px);
    color: white;
}

/* Table Card */
.table-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.table-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.table-body {
    padding: 0;
}

.table-responsive {
    border-radius: 0;
}

.table {
    margin: 0;
}

.table thead th {
    background: #f8f9fa;
    border: none;
    padding: 15px;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #fe5716;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-bottom: 1px solid #f1f3f4;
}

.table tbody tr:hover {
    background: rgba(254, 87, 22, 0.05);
}

/* Category Image */
.category-image {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.category-image:hover {
    border-color: #fe5716;
    transform: scale(1.05);
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-image .placeholder {
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}

/* Status Toggle */
.status-toggle {
    transform: scale(1.2);
    cursor: pointer;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.btn-action {
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 70px;
    text-align: center;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
}

.btn-view {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
}

.btn-edit {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

/* Pagination */
.pagination-wrapper {
    background: #f8f9fa;
    padding: 20px;
    border-top: 1px solid #e9ecef;
}

.pagination-info {
    color: #6c757d;
    font-size: 14px;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
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
    .blog-categories-wrapper {
        padding: 15px;
    }
    
    .blog-categories-header {
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .filters-body {
        padding: 20px;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 5px;
    }
    
    .table-responsive {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .blog-categories-wrapper {
        padding: 10px;
    }
    
    .blog-categories-header {
        padding: 15px;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .filters-body {
        padding: 15px;
    }
    
    .table thead th,
    .table tbody td {
        padding: 10px 8px;
    }
}
</style>
@endpush

@section('content')
<div class="blog-categories-wrapper">
    <!-- Page Header -->
    <div class="blog-categories-header">
        <div>
            <h1><i class="fas fa-folder-open me-2"></i>Blog Categories</h1>
            <p class="text-muted mb-0">Manage your blog categories and organize content</p>
        </div>
        <div>
            <a href="{{ route('admin.content.blog-categories.create') }}" class="btn-add-category">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="stat-card-header">
                <h6 class="stat-card-title">Total Categories</h6>
                <div class="stat-card-icon">
                    <i class="fas fa-folder"></i>
                </div>
            </div>
            <h2 class="stat-card-value">{{ $categories->total() }}</h2>
        </div>

        <div class="stat-card success">
            <div class="stat-card-header">
                <h6 class="stat-card-title">Active Categories</h6>
                <div class="stat-card-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <h2 class="stat-card-value">{{ \App\Models\BlogCategory::where('status', true)->count() }}</h2>
        </div>

        <div class="stat-card warning">
            <div class="stat-card-header">
                <h6 class="stat-card-title">Inactive Categories</h6>
                <div class="stat-card-icon">
                    <i class="fas fa-pause-circle"></i>
                </div>
            </div>
            <h2 class="stat-card-value">{{ \App\Models\BlogCategory::where('status', false)->count() }}</h2>
        </div>

        <div class="stat-card info">
            <div class="stat-card-header">
                <h6 class="stat-card-title">Total Blog Posts</h6>
                <div class="stat-card-icon">
                    <i class="fas fa-blog"></i>
                </div>
            </div>
            <h2 class="stat-card-value">{{ \App\Models\Blog::count() }}</h2>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="filters-card">
        <div class="filters-header">
            <i class="fas fa-filter"></i> Filters & Search
        </div>
        <div class="filters-body">
            <form method="GET" action="{{ route('admin.content.blog-categories.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">🔍 Search Categories</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Search by name or description..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <label class="form-label">📊 Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">🔄 Sort By</label>
                    <select name="sort_by" class="form-select">
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date Created</option>
                        <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                        <option value="sort_order" {{ request('sort_by') === 'sort_order' ? 'selected' : '' }}>Sort Order</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">📈 Order</label>
                    <select name="sort_order" class="form-select">
                        <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
                        <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('admin.content.blog-categories.index') }}" class="btn-reset">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="table-card">
        <div class="table-header">
            <h5><i class="fas fa-folder"></i> Categories List</h5>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-white bg-opacity-20">{{ $categories->total() }} total</span>
            </div>
        </div>
        <div class="table-body">
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Category</th>
                                <th class="text-center">Blog Count</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input status-toggle" type="checkbox" 
                                                   data-id="{{ $category->id }}" 
                                                   {{ $category->status ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                {!! $category->status_badge !!}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="category-image me-3">
                                                @if($category->image)
                                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                                @else
                                                    <div class="placeholder">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-dark">{{ $category->name }}</h6>
                                                @if($category->description)
                                                    <p class="mb-0 text-muted small">{{ Str::limit($category->description, 60) }}</p>
                                                @endif
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar-alt"></i> {{ $category->created_at->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                            {{ $category->blogs_count ?? 0 }} posts
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.content.blog-categories.show', $category) }}" class="btn-action btn-view">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('admin.content.blog-categories.edit', $category) }}" class="btn-action btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.content.blog-categories.destroy', $category) }}" 
                                                  method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
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
                <div class="pagination-wrapper">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="pagination-info">
                            <span>Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results</span>
                        </div>
                        <nav>
                            {{ $categories->links() }}
                        </nav>
                    </div>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <h5>No blog categories found</h5>
                    <p>Get started by creating your first blog category.</p>
                    <a href="{{ route('admin.content.blog-categories.create') }}" class="btn-add-category">
                        <i class="fas fa-plus"></i> Create Category
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.blog-categories-header');
    const statCards = document.querySelectorAll('.stat-card');
    const filtersCard = document.querySelector('.filters-card');
    const tableCard = document.querySelector('.table-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    statCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 100) + 150);
    });
    
    setTimeout(() => {
        if (filtersCard) filtersCard.classList.add('animate-fade-up');
    }, 600);
    
    setTimeout(() => {
        if (tableCard) tableCard.classList.add('animate-fade-up');
    }, 750);
    
    // Status toggle functionality
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const categoryId = this.dataset.id;
            const isActive = this.checked;
            
            fetch(`/admin/content/blog-categories/${categoryId}/toggle-status`, {
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
});

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
