@php
use Illuminate\Support\Str;
@endphp

@extends('admin.layouts.app')

@section('title', 'Category Management')

@push('styles')
<style>
/* ========================================
   CATEGORY MANAGEMENT STYLES
======================================== */
.categories-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.categories-header {
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

.categories-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.categories-stats {
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

.categories-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.categories-table-container {
    overflow-x: auto;
    overflow-y: visible;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
    scrollbar-color: #fe5716 #f8f9fa;
}

.categories-table-container::-webkit-scrollbar {
    height: 8px;
}

.categories-table-container::-webkit-scrollbar-track {
    background: #f8f9fa;
    border-radius: 10px;
}

.categories-table-container::-webkit-scrollbar-thumb {
    background: #fe5716;
    border-radius: 10px;
}

.categories-table-container::-webkit-scrollbar-thumb:hover {
    background: #e54e14;
}

.categories-table-header {
    background: #f8f9fa;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.table-title {
    color: #2c3e50;
    font-weight: 600;
    font-size: 18px;
    margin: 0;
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
    font-size: 14px;
}

.btn-add-category:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.categories-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
}

.categories-table th {
    background: #f8f9fa;
    padding: 15px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #e9ecef;
    font-size: 14px;
}

.categories-table td {
    padding: 20px 15px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
}

.categories-table tr:hover {
    background: rgba(254, 87, 22, 0.02);
}

.category-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.category-image {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    object-fit: cover;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
}

.category-image-placeholder {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    background: linear-gradient(45deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 20px;
}

.category-details h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 16px;
}

.category-description {
    color: #6c757d;
    font-size: 12px;
    font-style: italic;
}

.products-count {
    text-align: center;
}

.count-badge {
    background: #e3f2fd;
    color: #1565c0;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-align: center;
}

.status-active {
    background: #d1f2eb;
    color: #00695c;
}

.status-inactive {
    background: #f8d7da;
    color: #721c24;
}

.sort-order {
    text-align: center;
    color: #6c757d;
    font-weight: 600;
    font-size: 14px;
}

.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.btn-action {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 70px;
    text-align: center;
}

.btn-view {
    background: #007bff;
    color: white;
}

.btn-view:hover {
    background: #0056b3;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

.btn-edit {
    background: #28a745;
    color: white;
}

.btn-edit:hover {
    background: #1e7e34;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-delete:hover {
    background: #c82333;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

/* Modern Pagination Styling */
.admin-pagination-wrapper {
    padding: 25px;
    background: linear-gradient(145deg, #f8f9fa, #ffffff);
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.pagination-info {
    color: #6c757d;
    font-size: 14px;
    font-weight: 500;
}

.pagination-info strong {
    color: #2c3e50;
    font-weight: 600;
}

.admin-pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.admin-pagination .page-item {
    list-style: none;
}

.admin-pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    padding: 0 12px;
    background: #ffffff;
    color: #495057;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
    position: relative;
    overflow: hidden;
}

.admin-pagination .page-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(254, 87, 22, 0.1), transparent);
    transition: left 0.5s;
}

.admin-pagination .page-link:hover::before {
    left: 100%;
}

.admin-pagination .page-link:hover {
    background: #fff5f2;
    color: #fe5716;
    border-color: #fe5716;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.2);
}

.admin-pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: #ffffff;
    border-color: #fe5716;
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
    transform: translateY(-1px);
}

.admin-pagination .page-item.active .page-link:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px) scale(1.05);
}

.admin-pagination .page-item.disabled .page-link {
    opacity: 0.5;
    pointer-events: none;
    background: #f8f9fa;
    color: #adb5bd;
    border-color: #dee2e6;
    cursor: not-allowed;
}

.admin-pagination .page-link i {
    font-size: 12px;
}

.admin-pagination .page-link[aria-label="Previous"] i {
    margin-right: 4px;
}

.admin-pagination .page-link[aria-label="Next"] i {
    margin-left: 4px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .admin-pagination-wrapper {
        flex-direction: column;
        text-align: center;
        padding: 20px;
        gap: 12px;
    }
    
    .admin-pagination .page-link {
        min-width: 38px;
        height: 38px;
        font-size: 13px;
        border-radius: 10px;
    }
    
    .pagination-info {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .admin-pagination {
        gap: 4px;
    }
    
    .admin-pagination .page-link {
        min-width: 34px;
        height: 34px;
        font-size: 12px;
        padding: 0 8px;
    }
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}

.empty-state i {
    font-size: 64px;
    color: #dee2e6;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: #495057;
    margin-bottom: 10px;
}

/* Category Statistics Cards */
.stat-card.total-categories {
    border-left-color: #9c27b0;
}

.stat-card.active-categories {
    border-left-color: #2ecc71;
}

.stat-card.total-products {
    border-left-color: #3498db;
}

.stat-card.featured-categories {
    border-left-color: #f39c12;
}

.stat-card.total-categories .stat-number {
    color: #9c27b0;
}

.stat-card.active-categories .stat-number {
    color: #2ecc71;
}

.stat-card.total-products .stat-number {
    color: #3498db;
}

.stat-card.featured-categories .stat-number {
    color: #f39c12;
}

/* Filters Section */
.categories-filters-wrapper {
    background: white;
    border-radius: 15px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.categories-filters-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.categories-filters-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 14px;
    color: white;
}

.categories-filters-body {
    padding: 15px 20px;
    background: #f8f9fa;
}

.categories-filters-body .form-label {
    font-size: 12px;
    margin-bottom: 5px;
    color: #495057;
}

.categories-filters-body .form-control,
.categories-filters-body .form-select {
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 6px 10px;
    font-size: 13px;
    transition: all 0.3s ease;
}

.categories-filters-body .form-control-sm,
.categories-filters-body .form-select-sm {
    padding: 5px 8px;
    font-size: 12px;
}

.categories-filters-body .input-group-sm .input-group-text {
    padding: 5px 10px;
    font-size: 12px;
}

.categories-filters-body .form-control:focus,
.categories-filters-body .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
}

.categories-filters-body .input-group-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-right: none;
    border-radius: 8px 0 0 8px;
    color: #6c757d;
}

.categories-filters-body .input-group .form-control {
    border-left: none;
    border-radius: 0 8px 8px 0;
}

.categories-filters-body .btn-primary {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    border: none;
    border-radius: 6px;
    padding: 6px 15px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
}

.categories-filters-body .btn-primary:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(254, 87, 22, 0.3);
}

.categories-filters-body .btn-outline-secondary {
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 6px 12px;
    font-size: 13px;
    transition: all 0.3s ease;
}

.categories-filters-body .btn-outline-secondary:hover {
    background: #6c757d;
    border-color: #6c757d;
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .categories-management-wrapper {
        padding: 15px;
    }
    
    .categories-filters-body {
        padding: 15px;
    }
    
    .categories-filters-body .row {
        margin: 0;
    }
    
    .categories-filters-body .col-lg-3,
    .categories-filters-body .col-lg-2,
    .categories-filters-body .col-lg-1,
    .categories-filters-body .col-md-6,
    .categories-filters-body .col-md-4,
    .categories-filters-body .col-sm-6,
    .categories-filters-body .col-sm-12 {
        padding: 0 0 15px 0;
    }
    
    .categories-header {
        padding: 20px;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .categories-stats {
        grid-template-columns: 1fr;
    }
    
    .categories-table-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .categories-table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 0 -15px;
        padding: 0 15px;
    }
    
    .categories-table {
        font-size: 12px;
        min-width: 700px;
    }
    
    .categories-table th,
    .categories-table td {
        padding: 10px 8px;
        white-space: nowrap;
    }
    
    .categories-table td:first-child {
        white-space: normal;
        min-width: 200px;
    }
    
    .category-info {
        flex-direction: row;
        gap: 10px;
        align-items: center;
    }
    
    .category-image,
    .category-image-placeholder {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
    }
    
    .category-details {
        min-width: 150px;
    }
    
    .action-buttons {
        flex-direction: row;
        gap: 5px;
        flex-wrap: wrap;
    }
    
    .btn-action {
        font-size: 11px;
        padding: 5px 10px;
        min-width: 60px;
    }
}

/* Animation enhancements */
.categories-table-wrapper {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.category-info {
    animation: slideInLeft 0.4s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
@endpush

@section('content')
<div class="categories-management-wrapper">
    <!-- Page Header -->
    <div class="categories-header">
        <div>
            <h1><i class="fas fa-tags me-3"></i>Category Management</h1>
            <p class="mb-0">Organize your products with categories</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-add-category">
            <i class="fas fa-plus me-2"></i>Add New Category
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="categories-stats">
        <div class="stat-card total-categories">
            <div class="stat-number">{{ \App\Models\Category::count() }}</div>
            <div class="stat-label">Total Categories</div>
        </div>
        <div class="stat-card active-categories">
            <div class="stat-number">{{ \App\Models\Category::where('is_active', true)->count() }}</div>
            <div class="stat-label">Active Categories</div>
        </div>
        <div class="stat-card total-products">
            <div class="stat-number">{{ \App\Models\Product::count() }}</div>
            <div class="stat-label">Total Products</div>
        </div>
        <div class="stat-card featured-categories">
            <div class="stat-number">{{ \App\Models\Category::whereHas('products', function($q) { $q->where('is_featured', true); })->count() }}</div>
            <div class="stat-label">With Featured Products</div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="categories-filters-wrapper">
        <div class="categories-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="categories-filters-body">
            <form method="GET" action="{{ route('admin.categories.index') }}" class="row g-2 align-items-end">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <label class="form-label fw-semibold text-dark small">🔍 Search</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm" 
                               placeholder="Search..." 
                               value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <label class="form-label fw-semibold text-dark small">📊 Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <label class="form-label fw-semibold text-dark small">📁 Type</label>
                    <select name="type" class="form-select form-select-sm">
                        <option value="">All</option>
                        <option value="main" {{ request('type') === 'main' ? 'selected' : '' }}>Main</option>
                        <option value="subcategory" {{ request('type') === 'subcategory' ? 'selected' : '' }}>Subcategory</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <label class="form-label fw-semibold text-dark small">🔄 Sort By</label>
                    <select name="sort_by" class="form-select form-select-sm">
                        <option value="sort_order" {{ request('sort_by') === 'sort_order' ? 'selected' : '' }}>Order</option>
                        <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date</option>
                        <option value="is_active" {{ request('sort_by') === 'is_active' ? 'selected' : '' }}>Status</option>
                    </select>
                </div>

                <div class="col-lg-1 col-md-2 col-sm-3">
                    <label class="form-label fw-semibold text-dark small">⬆️ Order</label>
                    <select name="sort_order" class="form-select form-select-sm">
                        <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>ASC</option>
                        <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>DESC</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm" title="Reset">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="categories-table-wrapper">
        <div class="categories-table-header">
            <h3 class="table-title">All Categories ({{ $categories->total() }})</h3>
        </div>

        @if($categories->count() > 0)
        <div class="categories-table-container">
        <table class="categories-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Products Count</th>
                    <th>Status</th>
                    <th>Sort Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        <div class="category-info">
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     class="category-image">
                            @else
                                <div class="category-image-placeholder">
                                    <i class="fas fa-folder"></i>
                                </div>
                            @endif
                            <div class="category-details">
                                <h6>
                                    @if($category->parent_id)
                                        <i class="fas fa-arrow-right text-muted"></i> 
                                    @endif
                                    {{ $category->name }}
                                </h6>
                                @if($category->description)
                                    <div class="category-description">{{ Str::limit($category->description, 50) }}</div>
                                @endif
                                @if($category->parent)
                                    <small class="text-muted">Parent: {{ $category->parent->name }}</small>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($category->parent_id)
                            <span class="badge badge-secondary">Subcategory</span>
                        @else
                            <span class="badge badge-primary">Main Category</span>
                            @if($category->children->count() > 0)
                                <br><small class="text-muted">{{ $category->children->count() }} subcategories</small>
                            @endif
                        @endif
                    </td>
                    <td>
                        <div class="products-count">
                            <span class="count-badge">{{ $category->products_count ?? 0 }} Products</span>
                        </div>
                    </td>
                    <td>
                        <span class="status-badge {{ $category->is_active ? 'status-active' : 'status-inactive' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="sort-order">{{ $category->sort_order ?? 0 }}</div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.categories.show', $category) }}" class="btn-action btn-view">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" 
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

        <!-- Custom Admin Pagination -->
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                <span>Showing <strong>{{ $categories->firstItem() }}</strong> to <strong>{{ $categories->lastItem() }}</strong> of <strong>{{ $categories->total() }}</strong> categories</span>
            </div>
            
            @if ($categories->hasPages())
            <nav aria-label="Category pagination">
                <ul class="admin-pagination">
                    {{-- Previous Page Link --}}
                    @if ($categories->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $start = max(1, $categories->currentPage() - 2);
                        $end = min($categories->lastPage(), $categories->currentPage() + 2);
                    @endphp

                    {{-- First Page --}}
                    @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $categories->url(1) }}">1</a>
                        </li>
                        @if($start > 2)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endif

                    {{-- Page Numbers --}}
                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $categories->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->url($page) }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if($end < $categories->lastPage())
                        @if($end < $categories->lastPage() - 1)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $categories->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($categories->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                Next <i class="fas fa-chevron-right"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
            @endif
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-folder-open"></i>
            <h3>No Categories Found</h3>
            <p>Create your first category to organize your products.</p>
            <a href="{{ route('admin.categories.create') }}" class="btn-add-category">
                <i class="fas fa-plus me-2"></i>Add Your First Category
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
// Enhanced category management interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations
    const tableRows = document.querySelectorAll('.categories-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.1}s`;
        row.classList.add('animate-row');
    });
});

// Add CSS for row animation
const style = document.createElement('style');
style.textContent = `
    .animate-row {
        animation: slideInRight 0.6s ease-out both;
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush
