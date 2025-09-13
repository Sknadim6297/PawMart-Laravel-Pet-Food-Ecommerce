@extends('admin.layouts.app')

@section('title', 'View Cooked Food Item')
@section('page-title', 'View Cooked Food Item')

@push('styles')
<style>
.cooked-food-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.cooked-food-show-header {
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

.cooked-food-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.cooked-food-show-header .breadcrumb-container {
    margin-top: 10px;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
    font-size: 14px;
}

.breadcrumb-item {
    color: #6c757d;
}

.breadcrumb-item a {
    color: #fe5716;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #e54e14;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #fe5716;
    font-weight: 600;
}

.btn-back-foods {
    background: #6c757d;
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
    margin-top: 10px;
}

.btn-back-foods:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.detail-section {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.detail-section h5 {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    margin: 0;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
}

.detail-section-body {
    padding: 25px;
}

.food-image {
    width: 100%;
    max-width: 400px;
    height: 300px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.food-image:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}
    
.category-badge {
    font-size: 1rem;
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.category-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.category-fish { 
    background: linear-gradient(135deg, #3b82f6, #1d4ed8); 
    color: white; 
}

.category-chicken { 
    background: linear-gradient(135deg, #f59e0b, #d97706); 
    color: white; 
}

.category-meat { 
    background: linear-gradient(135deg, #ef4444, #dc2626); 
    color: white; 
}

.category-egg { 
    background: linear-gradient(135deg, #eab308, #ca8a04); 
    color: white; 
}

.category-other { 
    background: linear-gradient(135deg, #6b7280, #4b5563); 
    color: white; 
}

.price-display {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    background: linear-gradient(135deg, #10b981, #059669);
    padding: 25px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    transition: all 0.3s ease;
}

.price-display:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
}

.status-badge {
    font-size: 1rem;
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.status-active {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.status-inactive {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
    box-shadow: 0 4px 15px rgba(107, 114, 128, 0.2);
}

.status-badge:hover {
    transform: translateY(-2px);
}
    
.info-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #f1f3f4;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: rgba(254, 87, 22, 0.05);
    border-radius: 8px;
    padding: 15px 12px;
    margin: 0 -12px;
}

.info-item:last-child {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #2c3e50;
    min-width: 140px;
    font-size: 14px;
}

.info-value {
    color: #6c757d;
    font-weight: 500;
}

.btn-action {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    margin-bottom: 10px;
}

.btn-action:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.btn-edit {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.btn-edit:hover {
    background: linear-gradient(135deg, #2563eb, #1e40af);
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
}

.btn-toggle {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.btn-toggle:hover {
    background: linear-gradient(135deg, #e5a509, #b45309);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.btn-delete:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
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

.animate-fade-up {
    animation: fadeInUp 0.6s ease-out;
}

@media (max-width: 768px) {
    .cooked-food-show-wrapper {
        padding: 15px;
    }
    
    .cooked-food-show-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .cooked-food-show-header h1 {
        font-size: 24px;
    }
    
    .detail-section-body {
        padding: 20px;
    }
    
    .food-image {
        height: 250px;
    }
    
    .price-display {
        font-size: 2rem;
        padding: 20px;
    }
    
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .info-label {
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .cooked-food-show-wrapper {
        padding: 10px;
    }
    
    .cooked-food-show-header h1 {
        font-size: 20px;
    }
    
    .detail-section-body {
        padding: 15px;
    }
    
    .food-image {
        height: 200px;
    }
    
    .price-display {
        font-size: 1.8rem;
        padding: 15px;
    }
    
    .category-badge {
        font-size: 0.9rem;
        padding: 10px 16px;
    }
    
    .status-badge {
        font-size: 0.9rem;
        padding: 10px 16px;
    }
}
</style>
@endpush

@section('content')
<div class="cooked-food-show-wrapper">
    <!-- Page Header -->
    <div class="cooked-food-show-header">
        <div>
            <h1><i class="fas fa-utensils me-2"></i>{{ $cookedFood->name }}</h1>
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.cooked-foods.index') }}">Cooked Foods</a></li>
                        <li class="breadcrumb-item active">{{ $cookedFood->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.cooked-foods.index') }}" class="btn-back-foods">
                <i class="fas fa-arrow-left"></i> Back to Cooked Foods
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="detail-section">
                <h5><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                <div class="detail-section-body">
                    <div class="info-item">
                        <div class="info-label">Item Name:</div>
                        <div class="info-value">{{ $cookedFood->name }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">URL Slug:</div>
                        <div class="info-value">
                            <code>{{ $cookedFood->slug }}</code>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Category:</div>
                        <div class="info-value">
                            @php
                                $categoryIcons = [
                                    'fish' => 'fas fa-fish',
                                    'chicken' => 'fas fa-drumstick-bite',
                                    'meat' => 'fas fa-hamburger',
                                    'egg' => 'fas fa-egg',
                                    'other' => 'fas fa-utensils'
                                ];
                            @endphp
                            <span class="category-badge category-{{ $cookedFood->category }}">
                                <i class="{{ $categoryIcons[$cookedFood->category] ?? 'fas fa-utensils' }}"></i>
                                {{ $cookedFood->category_label }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Status:</div>
                        <div class="info-value">
                            <span class="status-badge status-{{ $cookedFood->status }}">
                                <i class="fas {{ $cookedFood->status === 'active' ? 'fa-check' : 'fa-times' }} me-1"></i>
                                {{ ucfirst($cookedFood->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Created:</div>
                        <div class="info-value">{{ $cookedFood->created_at->format('M d, Y \a\t h:i A') }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Last Updated:</div>
                        <div class="info-value">{{ $cookedFood->updated_at->format('M d, Y \a\t h:i A') }}</div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="detail-section">
                <h5><i class="fas fa-align-left me-2"></i>Description</h5>
                <div class="detail-section-body">
                    <div class="text-muted">
                        {{ $cookedFood->description }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Image -->
            <div class="detail-section text-center">
                <h5><i class="fas fa-image me-2"></i>Item Image</h5>
                <div class="detail-section-body">
                    <img src="{{ $cookedFood->image_url }}" 
                         alt="{{ $cookedFood->name }}" 
                         class="food-image">
                </div>
            </div>

            <!-- Price -->
            <div class="detail-section">
                <h5><i class="fas fa-rupee-sign me-2"></i>Price</h5>
                <div class="detail-section-body">
                    <div class="price-display">
                        {{ $cookedFood->formatted_price }}
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="detail-section">
                <h5><i class="fas fa-cogs me-2"></i>Actions</h5>
                <div class="detail-section-body">
                    <div class="action-buttons">
                        <a href="{{ route('admin.cooked-foods.edit', $cookedFood) }}" 
                           class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>Edit Item
                        </a>
                        
                        <button type="button" 
                                class="btn-action btn-toggle"
                                onclick="toggleStatus({{ $cookedFood->id }}, '{{ $cookedFood->status }}')">
                            <i class="fas {{ $cookedFood->status === 'active' ? 'fa-pause' : 'fa-play' }}"></i>
                            {{ $cookedFood->status === 'active' ? 'Deactivate' : 'Activate' }}
                        </button>
                        
                        <form action="{{ route('admin.cooked-foods.destroy', $cookedFood) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this item? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete w-100">
                                <i class="fas fa-trash"></i>Delete Item
                            </button>
                        </form>
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
    const header = document.querySelector('.cooked-food-show-header');
    const detailSections = document.querySelectorAll('.detail-section');
    
    if (header) header.classList.add('animate-fade-up');
    
    detailSections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('animate-fade-up');
        }, index * 150);
    });
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.btn-action, .category-badge, .status-badge, .food-image, .price-display');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            if (!this.classList.contains('food-image') && !this.classList.contains('price-display')) {
                this.style.transform = 'translateY(-2px)';
            }
        });
        
        element.addEventListener('mouseleave', function() {
            if (!this.classList.contains('food-image') && !this.classList.contains('price-display')) {
                this.style.transform = 'translateY(0)';
            }
        });
    });
});

function toggleStatus(itemId, currentStatus) {
    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    const action = currentStatus === 'active' ? 'deactivate' : 'activate';
    
    if (confirm(`Are you sure you want to ${action} this item?`)) {
        // Show loading state
        const button = event.target.closest('.btn-action');
        const originalContent = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
        button.disabled = true;
        
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
                // Show success message
                showToast(data.message, 'success');
                // Refresh the page to update the status
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                showToast('Failed to update status', 'error');
                // Restore button state
                button.innerHTML = originalContent;
                button.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred', 'error');
            // Restore button state
            button.innerHTML = originalContent;
            button.disabled = false;
        });
    }
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
