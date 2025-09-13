@extends('admin.layouts.app')

@section('page-title', 'Coupon Details')

@push('styles')
<style>
.coupon-show-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.coupon-show-header {
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

.coupon-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.btn-back-coupons {
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
}

.btn-back-coupons:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.coupon-details-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-details-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-details-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.coupon-details-body {
    padding: 25px;
}

.coupon-preview-card {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.2);
}

.coupon-preview-card h4 {
    color: white;
    font-weight: 700;
    margin-bottom: 10px;
}

.coupon-preview-card .badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    font-size: 18px;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
}

.coupon-info-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.coupon-info-card:hover {
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.1);
}

.coupon-info-table {
    width: 100%;
}

.coupon-info-table th {
    color: #6c757d;
    font-weight: 600;
    font-size: 13px;
    padding: 8px 0;
    width: 40%;
}

.coupon-info-table td {
    color: #2c3e50;
    font-weight: 600;
    font-size: 13px;
    padding: 8px 0;
}

.coupon-badge {
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.coupon-badge.active {
    background: #d4edda;
    color: #155724;
}

.coupon-badge.inactive {
    background: #f8d7da;
    color: #721c24;
}

.coupon-badge.percentage {
    background: #d1ecf1;
    color: #0c5460;
}

.coupon-badge.fixed {
    background: #fff3cd;
    color: #856404;
}

.coupon-badge.valid {
    background: #d4edda;
    color: #155724;
}

.coupon-badge.invalid {
    background: #f8d7da;
    color: #721c24;
}

.coupon-description-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-description-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-description-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.coupon-description-body {
    padding: 25px;
}

.coupon-description-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    color: #2c3e50;
    line-height: 1.6;
    font-size: 14px;
}

.coupon-stats-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-stats-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-stats-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.coupon-stats-body {
    padding: 25px;
}

.stat-card {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.stat-card.success {
    background: linear-gradient(135deg, #28a745, #20c997);
}

.stat-card.info {
    background: linear-gradient(135deg, #17a2b8, #6f42c1);
}

.stat-card h4 {
    color: white;
    font-weight: 700;
    margin-bottom: 5px;
    font-size: 24px;
}

.stat-card small {
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    font-weight: 600;
}

.coupon-validity-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-validity-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-validity-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.coupon-validity-body {
    padding: 25px;
}

.validity-item {
    text-align: center;
    padding: 20px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    transition: all 0.3s ease;
    margin-bottom: 15px;
}

.validity-item:hover {
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.1);
}

.validity-item i {
    font-size: 32px;
    margin-bottom: 10px;
}

.validity-item .text-success {
    color: #28a745 !important;
}

.validity-item .text-danger {
    color: #dc3545 !important;
}

.validity-item .text-warning {
    color: #ffc107 !important;
}

.validity-item small {
    color: #6c757d;
    font-weight: 600;
    font-size: 12px;
}

.coupon-meta-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-meta-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-meta-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.coupon-meta-body {
    padding: 25px;
}

.coupon-actions-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-actions-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-actions-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.coupon-actions-body {
    padding: 25px;
}

.btn-action {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.btn-action:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

.btn-edit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #e55e14, #fe5716);
    color: white;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-toggle {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    color: white;
}

.btn-toggle:hover {
    background: linear-gradient(135deg, #e0a800, #e55e14);
    color: white;
    box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545, #e74c3c);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c82333, #d63031);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
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
    .coupon-show-wrapper {
        padding: 15px;
    }
    
    .coupon-show-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .coupon-show-header h1 {
        font-size: 24px;
    }
    
    .coupon-details-body {
        padding: 20px;
    }
    
    .btn-action {
        width: 100%;
        margin-right: 0;
    }
}

@media (max-width: 480px) {
    .coupon-show-wrapper {
        padding: 10px;
    }
    
    .coupon-show-header h1 {
        font-size: 20px;
    }
    
    .coupon-details-body {
        padding: 15px;
    }
    
    .stat-card h4 {
        font-size: 20px;
    }
    
    .validity-item i {
        font-size: 24px;
    }
}
</style>
@endpush

@section('content')
<div class="coupon-show-wrapper">
    <!-- Page Header -->
    <div class="coupon-show-header">
        <div>
            <h1><i class="fas fa-ticket-alt me-2"></i>Coupon Details: {{ $coupon->code }}</h1>
        </div>
        <div>
            <a href="{{ route('admin.coupons.index') }}" class="btn-back-coupons">
                <i class="fas fa-arrow-left"></i> Back to Coupons
            </a>
        </div>
    </div>
    <!-- Coupon Preview -->
    <div class="coupon-preview-card">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="mb-1">{{ $coupon->code }}</h4>
                <p class="mb-1">
                    @if($coupon->discount_type === 'percentage')
                        Get {{ $coupon->discount }}% off your order
                    @else
                        Get ₹{{ number_format($coupon->discount, 2) }} off your order
                    @endif
                </p>
                <small class="opacity-75">
                    @if($coupon->min_order_amount > 0)
                        Minimum order: ₹{{ number_format($coupon->min_order_amount, 2) }}
                    @else
                        No minimum order required
                    @endif
                </small>
            </div>
            <div class="col-md-4 text-end">
                <div class="badge">
                    {{ $coupon->discount_amount }}
                </div>
            </div>
        </div>
    </div>

    <!-- Coupon Information -->
    <div class="coupon-details-card">
        <div class="coupon-details-header">
            <h5><i class="fas fa-info-circle me-2"></i>Coupon Information</h5>
        </div>
        <div class="coupon-details-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="coupon-info-card">
                        <table class="coupon-info-table">
                            <tr>
                                <th>Coupon Code:</th>
                                <td><strong class="text-primary">{{ $coupon->code }}</strong></td>
                            </tr>
                            <tr>
                                <th>Discount Type:</th>
                                <td>
                                    <span class="coupon-badge {{ $coupon->discount_type }}">
                                        {{ ucfirst($coupon->discount_type) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Discount Amount:</th>
                                <td class="fw-bold text-success">{{ $coupon->discount_amount }}</td>
                            </tr>
                            <tr>
                                <th>Min. Order Amount:</th>
                                <td>₹{{ number_format($coupon->min_order_amount, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="coupon-badge {{ $coupon->status }}">
                                        {{ ucfirst($coupon->status) }}
                                    </span>
                                    @if(!$coupon->is_valid && $coupon->status === 'active')
                                        <small class="text-muted ms-2">(Expired)</small>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="coupon-info-card">
                        <table class="coupon-info-table">
                            <tr>
                                <th>Start Date:</th>
                                <td>{{ $coupon->formatted_start_date }}</td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td>{{ $coupon->formatted_end_date }}</td>
                            </tr>
                            <tr>
                                <th>Usage Limit:</th>
                                <td>
                                    @if($coupon->usage_limit)
                                        {{ number_format($coupon->usage_limit) }} times
                                    @else
                                        <span class="text-muted">Unlimited</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Times Used:</th>
                                <td>
                                    <strong>{{ number_format($coupon->used_count) }}</strong>
                                    @if($coupon->usage_limit)
                                        / {{ number_format($coupon->usage_limit) }}
                                        <div class="progress mt-2" style="height: 6px;">
                                            <div class="progress-bar" role="progressbar" 
                                                 style="width: {{ ($coupon->used_count / $coupon->usage_limit) * 100 }}%">
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Valid:</th>
                                <td>
                                    @if($coupon->is_valid)
                                        <span class="coupon-badge valid">
                                            <i class="fas fa-check me-1"></i>Yes
                                        </span>
                                    @else
                                        <span class="coupon-badge invalid">
                                            <i class="fas fa-times me-1"></i>No
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($coupon->description)
    <div class="coupon-description-card">
        <div class="coupon-description-header">
            <h6><i class="fas fa-align-left me-2"></i>Description</h6>
        </div>
        <div class="coupon-description-body">
            <div class="coupon-description-text">
                {{ $coupon->description }}
            </div>
        </div>
    </div>
    @endif

    <!-- Usage Statistics -->
    @if($coupon->usage_limit)
    <div class="coupon-stats-card">
        <div class="coupon-stats-header">
            <h6><i class="fas fa-chart-bar me-2"></i>Usage Statistics</h6>
        </div>
        <div class="coupon-stats-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <h4 class="mb-0">{{ $coupon->usage_limit }}</h4>
                        <small>Total Limit</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card success">
                        <h4 class="mb-0">{{ $coupon->used_count }}</h4>
                        <small>Times Used</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card info">
                        <h4 class="mb-0">{{ $coupon->usage_limit - $coupon->used_count }}</h4>
                        <small>Remaining</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Coupon Validity Check -->
    <div class="coupon-validity-card">
        <div class="coupon-validity-header">
            <h6><i class="fas fa-shield-alt me-2"></i>Coupon Validity</h6>
        </div>
        <div class="coupon-validity-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="validity-item">
                        @if($coupon->status === 'active')
                            <i class="fas fa-check-circle text-success"></i>
                            <p class="mb-0"><small>Status: Active</small></p>
                        @else
                            <i class="fas fa-times-circle text-danger"></i>
                            <p class="mb-0"><small>Status: Inactive</small></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="validity-item">
                        @if($coupon->start_date <= now())
                            <i class="fas fa-calendar-check text-success"></i>
                            <p class="mb-0"><small>Start Date: Valid</small></p>
                        @else
                            <i class="fas fa-calendar-times text-warning"></i>
                            <p class="mb-0"><small>Not Started Yet</small></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="validity-item">
                        @if($coupon->end_date >= now())
                            <i class="fas fa-calendar-check text-success"></i>
                            <p class="mb-0"><small>End Date: Valid</small></p>
                        @else
                            <i class="fas fa-calendar-times text-danger"></i>
                            <p class="mb-0"><small>Expired</small></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="validity-item">
                        @if(!$coupon->usage_limit || $coupon->used_count < $coupon->usage_limit)
                            <i class="fas fa-infinity text-success"></i>
                            <p class="mb-0"><small>Usage: Available</small></p>
                        @else
                            <i class="fas fa-ban text-danger"></i>
                            <p class="mb-0"><small>Usage Limit Reached</small></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metadata -->
    <div class="coupon-meta-card">
        <div class="coupon-meta-header">
            <h6><i class="fas fa-info me-2"></i>Metadata</h6>
        </div>
        <div class="coupon-meta-body">
            <div class="row">
                <div class="col-md-6">
                    <small class="text-muted">
                        <strong>Created:</strong> {{ $coupon->created_at->format('M d, Y h:i A') }}
                    </small>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">
                        <strong>Last Updated:</strong> {{ $coupon->updated_at->format('M d, Y h:i A') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="coupon-actions-card">
        <div class="coupon-actions-header">
            <h6><i class="fas fa-bolt me-2"></i>Actions</h6>
        </div>
        <div class="coupon-actions-body">
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn-action btn-edit">
                    <i class="fas fa-edit me-2"></i>Edit Coupon
                </a>
                
                <button class="btn-action btn-toggle" onclick="toggleStatus({{ $coupon->id }})">
                    <i class="fas fa-{{ $coupon->status === 'active' ? 'pause' : 'play' }} me-2"></i>
                    {{ $coupon->status === 'active' ? 'Deactivate' : 'Activate' }}
                </button>
                
                <form action="{{ route('admin.coupons.destroy', $coupon) }}" 
                      method="POST" class="d-inline" 
                      onsubmit="return confirm('Are you sure you want to delete this coupon? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">
                        <i class="fas fa-trash me-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleStatus(couponId) {
    if (confirm('Are you sure you want to toggle the status of this coupon?')) {
        fetch(`{{ url('admin/coupons') }}/${couponId}/toggle-status`, {
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
                showToast(data.message, 'error');
            }
        })
        .catch(error => {
            showToast('An error occurred while updating the coupon status.', 'error');
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.coupon-show-header');
    const cards = document.querySelectorAll('.coupon-details-card, .coupon-preview-card, .coupon-description-card, .coupon-stats-card, .coupon-validity-card, .coupon-meta-card, .coupon-actions-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 150);
    });
});
</script>
@endpush
