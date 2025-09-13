@extends('admin.layouts.app')

@section('title', 'Brand Management')

@push('styles')
<style>
/* ========================================
   BRAND MANAGEMENT STYLES
======================================== */
.brands-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.brands-header {
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

.brands-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.brands-stats {
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

.brands-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.brands-table-header {
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

.table-controls {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.btn-add-brand {
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

.btn-add-brand:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.brands-table {
    width: 100%;
    border-collapse: collapse;
}

.brands-table th {
    background: #f8f9fa;
    padding: 15px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #e9ecef;
    font-size: 14px;
}

.brands-table td {
    padding: 20px 15px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
}

.brands-table tr:hover {
    background: rgba(254, 87, 22, 0.02);
}

.brand-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.brand-logo {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    object-fit: cover;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
}

.brand-logo-placeholder {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    background: linear-gradient(45deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 20px;
}

.brand-details h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 16px;
}

.brand-slug {
    color: #6c757d;
    font-size: 12px;
    font-style: italic;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 2px;
    display: inline-block;
}

.status-active {
    background: #d1f2eb;
    color: #00695c;
}

.status-inactive {
    background: #f8d7da;
    color: #721c24;
}

.products-count-badge {
    background: #e3f2fd;
    color: #1565c0;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 500;
}

.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.btn-action {
    padding: 6px 2px;
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

/* Brand Statistics Cards */
.stat-card.total-brands {
    border-left-color: #3498db;
}

.stat-card.active-brands {
    border-left-color: #2ecc71;
}

.stat-card.inactive-brands {
    border-left-color: #e74c3c;
}

.stat-card.total-products {
    border-left-color: #f39c12;
}

.stat-card.total-brands .stat-number {
    color: #3498db;
}

.stat-card.active-brands .stat-number {
    color: #2ecc71;
}

.stat-card.inactive-brands .stat-number {
    color: #e74c3c;
}

.stat-card.total-products .stat-number {
    color: #f39c12;
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .brands-management-wrapper {
        padding: 10px;
    }
    
    .brands-header {
        padding: 15px;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .brands-header h1 {
        font-size: 24px;
    }
    
    .brands-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .brands-table-header {
        flex-direction: column;
        align-items: stretch;
        padding: 15px;
    }
    
    .brands-table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .brands-table {
        min-width: 800px;
        font-size: 12px;
    }
    
    .brands-table th,
    .brands-table td {
        padding: 8px 6px;
        white-space: nowrap;
    }
    
    .brand-info {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
        min-width: 200px;
    }
    
    .brand-logo,
    .brand-logo-placeholder {
        width: 40px;
        height: 40px;
    }
    
    .brand-details h6 {
        font-size: 13px;
        margin-bottom: 2px;
    }
    
    .brand-slug {
        font-size: 10px;
    }
    
    .status-badge {
        font-size: 10px;
        padding: 4px 8px;
        margin: 1px;
        display: inline-block;
    }
    
    .products-count-badge {
        font-size: 10px;
        padding: 4px 8px;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 3px;
        min-width: 80px;
    }
    
    .btn-action {
        padding: 4px 8px;
        font-size: 10px;
        min-width: 60px;
    }
    
    .admin-pagination-wrapper {
        padding: 15px;
        flex-direction: column;
        gap: 10px;
    }
    
    .pagination-info {
        font-size: 12px;
        text-align: center;
    }
    
    .admin-pagination .page-link {
        min-width: 32px;
        height: 32px;
        font-size: 12px;
        padding: 0 6px;
    }
}

@media (max-width: 480px) {
    .brands-management-wrapper {
        padding: 5px;
    }
    
    .brands-header {
        padding: 10px;
    }
    
    .brands-header h1 {
        font-size: 20px;
    }
    
    .brands-stats {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .stat-card {
        padding: 12px;
    }
    
    .stat-number {
        font-size: 20px;
    }
    
    .stat-label {
        font-size: 12px;
    }
    
    .brands-table-header {
        padding: 10px;
    }
    
    .table-title {
        font-size: 16px;
    }
    
    .brands-table {
        min-width: 700px;
        font-size: 11px;
    }
    
    .brands-table th,
    .brands-table td {
        padding: 6px 4px;
    }
    
    .brand-info {
        min-width: 180px;
        gap: 6px;
    }
    
    .brand-logo,
    .brand-logo-placeholder {
        width: 35px;
        height: 35px;
    }
    
    .brand-details h6 {
        font-size: 12px;
    }
    
    .brand-slug {
        font-size: 9px;
    }
    
    .action-buttons {
        min-width: 70px;
        gap: 2px;
    }
    
    .btn-action {
        padding: 3px 6px;
        font-size: 9px;
        min-width: 55px;
    }
    
    .admin-pagination-wrapper {
        padding: 10px;
    }
    
    .admin-pagination {
        gap: 3px;
    }
    
    .admin-pagination .page-link {
        min-width: 28px;
        height: 28px;
        font-size: 11px;
        padding: 0 4px;
    }
    
    .admin-pagination .page-link[aria-label="Previous"],
    .admin-pagination .page-link[aria-label="Next"] {
        font-size: 10px;
    }
}

/* Animation enhancements */
.brands-table-wrapper {
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

.brand-info {
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
</style>
@endpush

@section('content')
<div class="brands-management-wrapper">
    <!-- Page Header -->
    <div class="brands-header">
        <div>
            <h1><i class="fas fa-tags me-3"></i>Brand Management</h1>
            <p class="mb-0">Manage your brand catalog and organization</p>
        </div>
        <a href="{{ route('admin.brands.create') }}" class="btn-add-brand">
            <i class="fas fa-plus me-2"></i>Add New Brand
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="brands-stats">
        <div class="stat-card total-brands">
            <div class="stat-number">{{ \App\Models\Brand::count() }}</div>
            <div class="stat-label">Total Brands</div>
        </div>
        <div class="stat-card active-brands">
            <div class="stat-number">{{ \App\Models\Brand::where('status', true)->count() }}</div>
            <div class="stat-label">Active Brands</div>
                </div>
        <div class="stat-card inactive-brands">
            <div class="stat-number">{{ \App\Models\Brand::where('status', false)->count() }}</div>
            <div class="stat-label">Inactive Brands</div>
            </div>
        <div class="stat-card total-products">
            <div class="stat-number">{{ \App\Models\Product::whereHas('brand')->count() }}</div>
            <div class="stat-label">Branded Products</div>
        </div>
    </div>

    <!-- Brands Table -->
    <div class="brands-table-wrapper">
        <div class="brands-table-header">
            <h3 class="table-title">All Brands ({{ $brands->total() }})</h3>
            <div class="table-controls">
                <!-- Future: Add search and filter controls here -->
                        </div>
                    </div>

        @if($brands->count() > 0)
                    <div class="table-responsive">
            <table class="brands-table">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Products Count</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($brands as $brand)
                                <tr>
                                    <td>
                            <div class="brand-info">
                                        @if($brand->logo)
                                    <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" class="brand-logo">
                                        @else
                                    <div class="brand-logo-placeholder">
                                        <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                <div class="brand-details">
                                    <h6>{{ $brand->name }}</h6>
                                    <div class="brand-slug">{{ $brand->slug }}</div>
                                </div>
                                        </div>
                                    </td>
                                    <td>
                            <span class="products-count-badge">{{ $brand->products_count ?? 0 }} Products</span>
                                    </td>
                        <td>{{ $brand->sort_order ?? 0 }}</td>
                        <td>
                            <span class="status-badge {{ $brand->status ? 'status-active' : 'status-inactive' }}">
                                {{ $brand->status ? 'Active' : 'Inactive' }}
                            </span>
                                    </td>
                                    <td>{{ $brand->created_at->format('M d, Y') }}</td>
                                    <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.brands.show', $brand) }}" class="btn-action btn-view">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.brands.edit', $brand) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" 
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
                    @if($brands->hasPages())
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                <span>Showing <strong>{{ $brands->firstItem() }}</strong> to <strong>{{ $brands->lastItem() }}</strong> of <strong>{{ $brands->total() }}</strong> brands</span>
                    </div>
            <nav aria-label="Brand pagination">
                <ul class="admin-pagination">
                    {{-- Previous Page Link --}}
                    @if ($brands->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $brands->previousPageUrl() }}" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $start = max(1, $brands->currentPage() - 2);
                        $end = min($brands->lastPage(), $brands->currentPage() + 2);
                    @endphp

                    {{-- First Page --}}
                    @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $brands->url(1) }}">1</a>
                        </li>
                        @if($start > 2)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endif

                    {{-- Page Numbers --}}
                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $brands->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $brands->url($page) }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if($end < $brands->lastPage())
                        @if($end < $brands->lastPage() - 1)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $brands->url($brands->lastPage()) }}">{{ $brands->lastPage() }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($brands->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $brands->nextPageUrl() }}" aria-label="Next">
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
                </div>
        @endif
        @else
        <div class="empty-state">
            <i class="fas fa-tags"></i>
            <h3>No Brands Found</h3>
            <p>Create your first brand to get started with your catalog.</p>
            <a href="{{ route('admin.brands.create') }}" class="btn-add-brand">
                <i class="fas fa-plus me-2"></i>Add Your First Brand
            </a>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
// Enhanced brand management interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations
    const tableRows = document.querySelectorAll('.brands-table tbody tr');
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
