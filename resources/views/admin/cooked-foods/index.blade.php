@extends('admin.layouts.app')

@section('title', 'Cooked Foods Management')
@section('page-title', 'Cooked Foods')

@push('styles')
<style>
.cooked-foods-management-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.cooked-foods-header {
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

.cooked-foods-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.cooked-foods-header p {
    color: #6c757d;
    margin: 5px 0 0 0;
    font-size: 14px;
}

.btn-add-food {
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

.btn-add-food:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.cooked-foods-stats {
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

.stat-card.total-foods {
    border-left-color: #fe5716;
}

.stat-card.active-foods {
    border-left-color: #27ae60;
}

.stat-card.inactive-foods {
    border-left-color: #f39c12;
}

.stat-card.categories {
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

.stat-card.total-foods .stat-number {
    color: #fe5716;
}

.stat-card.active-foods .stat-number {
    color: #27ae60;
}

.stat-card.inactive-foods .stat-number {
    color: #f39c12;
}

.stat-card.categories .stat-number {
    color: #3498db;
}

.cooked-foods-filters-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.cooked-foods-filters-header {
    background: #f8f9fa;
    padding: 15px 20px;
    border-bottom: 1px solid #e9ecef;
}

.cooked-foods-filters-header h5 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin: 0;
}

.cooked-foods-filters-body {
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

.cooked-foods-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.cooked-foods-table-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.cooked-foods-table-header h5 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.cooked-foods-table-body {
    padding: 0;
}

.table-responsive {
    border-radius: 0;
}

.table {
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
}

.table thead th {
    background: #f8f9fa;
    border: none;
    padding: 15px 12px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tbody td {
    border: none;
    border-bottom: 1px solid #f1f3f4;
    padding: 15px 12px;
    vertical-align: middle;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

.food-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e2e8f0;
}

.category-badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 1rem;
    font-weight: 600;
}

.category-fish { background-color: #dbeafe; color: #1e40af; }
.category-chicken { background-color: #fef3c7; color: #92400e; }
.category-meat { background-color: #fee2e2; color: #991b1b; }
.category-egg { background-color: #fef9c3; color: #a16207; }
.category-other { background-color: #f3f4f6; color: #374151; }

.price-tag {
    font-size: 1.1rem;
    font-weight: 700;
    color: #059669;
}

.status-toggle {
    cursor: pointer;
    transition: all 0.3s ease;
}

.status-toggle:hover {
    transform: scale(1.1);
}

.table-actions {
    white-space: nowrap;
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
    .cooked-foods-management-wrapper {
        padding: 15px;
    }
    
    .cooked-foods-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .cooked-foods-header h1 {
        font-size: 24px;
    }
    
    .cooked-foods-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 28px;
    }
    
    .cooked-foods-filters-body {
        padding: 15px;
    }
    
    .cooked-foods-table-header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }
    
    .cooked-foods-table-body {
        padding: 0;
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
    
    .action-buttons {
        flex-direction: column;
        gap: 5px;
    }
}

@media (max-width: 480px) {
    .cooked-foods-management-wrapper {
        padding: 10px;
    }
    
    .cooked-foods-header h1 {
        font-size: 20px;
    }
    
    .btn-add-food {
        width: 100%;
        justify-content: center;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .cooked-foods-filters-body {
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
<div class="cooked-foods-management-wrapper">
    <!-- Page Header -->
    <div class="cooked-foods-header">
        <div>
            <h1><i class="fas fa-utensils me-2"></i>Cooked Foods Management</h1>
            <p>Manage your cooked food items</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.cooked-foods.create') }}" class="btn-add-food">
                <i class="fas fa-plus"></i> Add New Item
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="cooked-foods-stats">
        <div class="stat-card total-foods">
            <div class="stat-number">{{ \App\Models\CookedFood::count() }}</div>
            <div class="stat-label">Total Foods</div>
        </div>
        <div class="stat-card active-foods">
            <div class="stat-number">{{ \App\Models\CookedFood::where('status', 'active')->count() }}</div>
            <div class="stat-label">Active Foods</div>
        </div>
        <div class="stat-card inactive-foods">
            <div class="stat-number">{{ \App\Models\CookedFood::where('status', 'inactive')->count() }}</div>
            <div class="stat-label">Inactive Foods</div>
        </div>
        <div class="stat-card categories">
            <div class="stat-number">{{ count(\App\Models\CookedFood::getCategories()) }}</div>
            <div class="stat-label">Categories</div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="cooked-foods-filters-wrapper">
        <div class="cooked-foods-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="cooked-foods-filters-body">
            <form method="GET" action="{{ route('admin.cooked-foods.index') }}" class="row g-2 align-items-end">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="form-label">🔍 Search Items</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" 
                               class="form-control" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Name or description...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">🍽️ Category</label>
                    <select class="form-select" name="category">
                        <option value="">All Categories</option>
                        @foreach(\App\Models\CookedFood::getCategories() as $key => $label)
                            <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">📊 Status</label>
                    <select class="form-select" name="status">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <div class="d-flex gap-1">
                        <button type="submit" class="btn-filter btn-sm">
                            <i class="fas fa-filter"></i>
                        </button>
                        <a href="{{ route('admin.cooked-foods.index') }}" class="btn-reset btn-sm">
                            <i class="fas fa-undo"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Cooked Foods Table -->
    <div class="cooked-foods-table-wrapper">
        <div class="cooked-foods-table-header">
            <h5><i class="fas fa-utensils me-2"></i>Cooked Food Items</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2">{{ $cookedFoods->total() }} items</span>
            </div>
        </div>
        <div class="cooked-foods-table-body">
            @if($cookedFoods->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Image</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th style="width: 200px;">Description</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cookedFoods as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->image_url }}" 
                                         alt="{{ $item->name }}" 
                                         class="food-image">
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1">{{ $item->name }}</h6>
                                        <small class="text-muted">{{ $item->slug }}</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="category-badge category-{{ $item->category }}">
                                        {{ $item->category_label }}
                                    </span>
                                </td>
                                <td>
                                    <span class="price-tag">{{ $item->formatted_price }}</span>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;" 
                                         title="{{ $item->description }}">
                                        {{ Str::limit($item->description, 50) }}
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm status-toggle {{ $item->status === 'active' ? 'btn-success' : 'btn-secondary' }}"
                                            onclick="toggleStatus({{ $item->id }}, '{{ $item->status }}')"
                                            title="Click to toggle status">
                                        <i class="fas {{ $item->status === 'active' ? 'fa-check' : 'fa-times' }}"></i>
                                        {{ ucfirst($item->status) }}
                                    </button>
                                </td>
                                <td class="table-actions">
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.cooked-foods.show', $item) }}" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.cooked-foods.edit', $item) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.cooked-foods.destroy', $item) }}" 
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
            @else
                <div class="empty-state">
                    <i class="fas fa-utensils"></i>
                    <h5>No cooked food items found</h5>
                    <p>Start by adding your first cooked food item</p>
                    <a href="{{ route('admin.cooked-foods.create') }}" class="btn-add-food">
                        <i class="fas fa-plus"></i> Add New Item
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Pagination -->
    @if($cookedFoods->hasPages())
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                Showing {{ $cookedFoods->firstItem() }} to {{ $cookedFoods->lastItem() }} of {{ $cookedFoods->total() }} results
            </div>
            <nav>
                {{ $cookedFoods->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.cooked-foods-header');
    const stats = document.querySelector('.cooked-foods-stats');
    const filters = document.querySelector('.cooked-foods-filters-wrapper');
    const table = document.querySelector('.cooked-foods-table-wrapper');
    
    if (header) header.classList.add('animate-fade-up');
    if (stats) stats.classList.add('animate-slide-left');
    if (filters) filters.classList.add('animate-fade-up');
    if (table) table.classList.add('animate-slide-left');
    
    // Animate stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 100);
    });
    
    // Animate table rows
    const tableRows = document.querySelectorAll('.table tbody tr');
    tableRows.forEach((row, index) => {
        setTimeout(() => {
            row.classList.add('animate-fade-up');
        }, index * 50);
    });
});

function toggleStatus(itemId, currentStatus) {
    fetch(`/admin/cooked-foods/${itemId}/toggle-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            // Refresh the page to update the status
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('Failed to update status', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred', 'error');
    });
}
</script>
@endpush
