@extends('admin.layouts.app')

@section('page-title', 'Edit Coupon')

@push('styles')
<style>
.coupon-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.coupon-edit-header {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.coupon-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
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

.breadcrumb-item.active {
    color: #fe5716;
    font-weight: 600;
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

.form-section-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.form-section-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.form-section-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.form-section-body {
    padding: 25px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #fff;
}

.form-control:focus, .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.25);
    background: #fff;
}

.form-text {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

.invalid-feedback {
    font-size: 12px;
    font-weight: 600;
}

.input-group-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-right: none;
    color: #6c757d;
    font-weight: 600;
}

.input-group .form-control {
    border-left: none;
}

.input-group .form-control:focus {
    border-left: none;
}

.coupon-preview {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none !important;
    border-radius: 12px;
    padding: 20px;
}

.coupon-preview h5 {
    color: white;
    font-weight: 700;
    margin-bottom: 8px;
}

.coupon-preview .badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 20px;
}

.btn-form-submit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-form-submit:hover {
    background: linear-gradient(135deg, #e55e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-form-cancel {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
    text-decoration: none;
}

.btn-form-cancel:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.btn-view-details {
    background: linear-gradient(135deg, #17a2b8, #20c997);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
    text-decoration: none;
}

.btn-view-details:hover {
    background: linear-gradient(135deg, #138496, #17a2b8);
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.coupon-edit-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupon-edit-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.coupon-edit-sidebar-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.coupon-edit-sidebar-body {
    padding: 25px;
}

.coupon-info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f4;
}

.coupon-info-item:last-child {
    border-bottom: none;
}

.coupon-info-label {
    color: #6c757d;
    font-weight: 600;
    font-size: 13px;
}

.coupon-info-value {
    color: #2c3e50;
    font-weight: 600;
    font-size: 13px;
}

.usage-stats-card {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.usage-stats-card h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 16px;
}

.progress {
    height: 8px;
    border-radius: 4px;
    background: #e9ecef;
}

.progress-bar {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    border-radius: 4px;
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
    .coupon-edit-wrapper {
        padding: 15px;
    }
    
    .coupon-edit-header h1 {
        font-size: 24px;
    }
    
    .form-section-body {
        padding: 20px;
    }
    
    .btn-form-submit,
    .btn-form-cancel,
    .btn-view-details {
        width: 100%;
        margin-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .coupon-edit-wrapper {
        padding: 10px;
    }
    
    .coupon-edit-header h1 {
        font-size: 20px;
    }
    
    .form-section-body {
        padding: 15px;
    }
    
    .coupon-edit-sidebar-body {
        padding: 15px;
    }
}
</style>
@endpush

@section('content')
<div class="coupon-edit-wrapper">
    <!-- Page Header -->
    <div class="coupon-edit-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1><i class="fas fa-ticket-alt me-2"></i>Edit Coupon: {{ $coupon->code }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.coupons.show', $coupon) }}">{{ $coupon->code }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.coupons.index') }}" class="btn-back-coupons">
                    <i class="fas fa-arrow-left"></i> Back to Coupons
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Coupon Details Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-info-circle me-2"></i>Coupon Details</h5>
                    </div>
                    <div class="form-section-body">
            <div class="card-body">
                <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                        <div class="row">
                            <!-- Coupon Code -->
                            <div class="col-md-6 mb-3">
                                <label for="code" class="form-label">Coupon Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                       id="code" name="code" value="{{ old('code', $coupon->code) }}" 
                                       placeholder="e.g., SAVE20, WELCOME10" style="text-transform: uppercase;">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text">Enter a unique coupon code (letters and numbers only)</small>
                            </div>

                            <!-- Discount Type -->
                            <div class="col-md-6 mb-3">
                                <label for="discount_type" class="form-label">Discount Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('discount_type') is-invalid @enderror" 
                                        id="discount_type" name="discount_type" onchange="updateDiscountPlaceholder()">
                                    <option value="">Select Discount Type</option>
                                    <option value="percentage" {{ old('discount_type', $coupon->discount_type) === 'percentage' ? 'selected' : '' }}>
                                        Percentage (%)
                                    </option>
                                    <option value="fixed" {{ old('discount_type', $coupon->discount_type) === 'fixed' ? 'selected' : '' }}>
                                        Fixed Amount (₹)
                                    </option>
                                </select>
                                @error('discount_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Discount -->
                            <div class="col-md-6 mb-3">
                                <label for="discount" class="form-label">Discount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="discount-symbol">%</span>
                                    <input type="number" class="form-control @error('discount') is-invalid @enderror" 
                                           id="discount" name="discount" value="{{ old('discount', $coupon->discount) }}" 
                                           placeholder="Enter discount amount" step="0.01" min="0">
                                    @error('discount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text" id="discount-help">
                                    Enter the discount amount
                                </small>
                            </div>

                            <!-- Min Order Amount -->
                            <div class="col-md-6 mb-3">
                                <label for="min_order_amount" class="form-label">Min. Order Amount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control @error('min_order_amount') is-invalid @enderror" 
                                           id="min_order_amount" name="min_order_amount" value="{{ old('min_order_amount', $coupon->min_order_amount) }}" 
                                           placeholder="0.00" step="0.01" min="0">
                                    @error('min_order_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text">Minimum order amount required to use this coupon</small>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Start Date -->
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" value="{{ old('start_date', $coupon->start_date->format('Y-m-d')) }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- End Date -->
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" value="{{ old('end_date', $coupon->end_date->format('Y-m-d')) }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="active" {{ old('status', $coupon->status) === 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="inactive" {{ old('status', $coupon->status) === 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Usage Limit -->
                            <div class="col-md-6 mb-3">
                                <label for="usage_limit" class="form-label">Usage Limit (Optional)</label>
                                <input type="number" class="form-control @error('usage_limit') is-invalid @enderror" 
                                       id="usage_limit" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" 
                                       placeholder="Leave empty for unlimited" min="1">
                                @error('usage_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text">Maximum number of times this coupon can be used</small>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Enter a description for this coupon...">{{ old('description', $coupon->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Coupon Preview Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-eye me-2"></i>Coupon Preview</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="coupon-preview">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1" id="preview-code">{{ $coupon->code }}</h5>
                                    <p class="mb-1" id="preview-discount">Get discount on your order</p>
                                    <small class="opacity-75" id="preview-conditions">Conditions apply</small>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="badge" id="preview-amount">--</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn-form-submit">
                        <i class="fas fa-save me-2"></i>Update Coupon
                    </button>
                    <a href="{{ route('admin.coupons.show', $coupon) }}" class="btn-view-details">
                        <i class="fas fa-eye me-2"></i>View Details
                    </a>
                    <a href="{{ route('admin.coupons.index') }}" class="btn-form-cancel">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Usage Statistics -->
            @if($coupon->usage_limit)
            <div class="coupon-edit-sidebar">
                <div class="coupon-edit-sidebar-header">
                    <h5><i class="fas fa-chart-bar me-2"></i>Usage Statistics</h5>
                </div>
                <div class="coupon-edit-sidebar-body">
                    <div class="usage-stats-card">
                        <h6>Usage Progress</h6>
                        <p class="mb-2"><strong>Total Usage:</strong> {{ $coupon->used_count }} / {{ $coupon->usage_limit }}</p>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" 
                                 style="width: {{ $coupon->usage_limit > 0 ? ($coupon->used_count / $coupon->usage_limit) * 100 : 0 }}%">
                            </div>
                        </div>
                        <p class="mb-1"><strong>Remaining:</strong> {{ $coupon->usage_limit - $coupon->used_count }}</p>
                        <small class="text-muted">
                            {{ $coupon->used_count > 0 ? 'This coupon has been used' : 'This coupon has not been used yet' }}
                        </small>
                    </div>
                </div>
            </div>
            @endif

            <!-- Coupon Information -->
            <div class="coupon-edit-sidebar">
                <div class="coupon-edit-sidebar-header">
                    <h5><i class="fas fa-info-circle me-2"></i>Coupon Information</h5>
                </div>
                <div class="coupon-edit-sidebar-body">
                    <div class="coupon-info-item">
                        <span class="coupon-info-label">Created:</span>
                        <span class="coupon-info-value">{{ $coupon->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="coupon-info-item">
                        <span class="coupon-info-label">Last Updated:</span>
                        <span class="coupon-info-value">{{ $coupon->updated_at->format('M d, Y') }}</span>
                    </div>
                    <div class="coupon-info-item">
                        <span class="coupon-info-label">Current Status:</span>
                        <span class="coupon-info-value">
                            <span class="badge {{ $coupon->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($coupon->status) }}
                            </span>
                        </span>
                    </div>
                    <div class="coupon-info-item">
                        <span class="coupon-info-label">Valid Period:</span>
                        <span class="coupon-info-value">
                            {{ $coupon->start_date->format('M d') }} - {{ $coupon->end_date->format('M d, Y') }}
                        </span>
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
    // Initialize the form
    updateDiscountPlaceholder();
    updatePreview();
    
    // Add event listeners
    document.getElementById('code').addEventListener('input', updatePreview);
    document.getElementById('discount_type').addEventListener('change', function() {
        updateDiscountPlaceholder();
        updatePreview();
    });
    document.getElementById('discount').addEventListener('input', updatePreview);
    document.getElementById('min_order_amount').addEventListener('input', updatePreview);
    
    // Auto-convert code to uppercase
    document.getElementById('code').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
    
    // Set minimum end date when start date changes
    document.getElementById('start_date').addEventListener('change', function() {
        const startDate = this.value;
        const endDateInput = document.getElementById('end_date');
        
        if (endDateInput.value && endDateInput.value < startDate) {
            endDateInput.value = startDate;
        }
    });

    // Add animations to page elements
    const header = document.querySelector('.coupon-edit-header');
    const cards = document.querySelectorAll('.form-section-card, .coupon-edit-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, index * 150);
    });
});

function updateDiscountPlaceholder() {
    const discountType = document.getElementById('discount_type').value;
    const discountSymbol = document.getElementById('discount-symbol');
    const discountInput = document.getElementById('discount');
    const discountHelp = document.getElementById('discount-help');
    
    if (discountType === 'percentage') {
        discountSymbol.textContent = '%';
        discountInput.placeholder = 'e.g., 20';
        discountInput.max = '100';
        discountHelp.textContent = 'Enter percentage discount (0-100%)';
    } else if (discountType === 'fixed') {
        discountSymbol.textContent = '₹';
        discountInput.placeholder = 'e.g., 500.00';
        discountInput.removeAttribute('max');
        discountHelp.textContent = 'Enter fixed discount amount in rupees';
    }
}

function updatePreview() {
    const code = document.getElementById('code').value || 'COUPON_CODE';
    const discountType = document.getElementById('discount_type').value;
    const discount = document.getElementById('discount').value;
    const minOrder = document.getElementById('min_order_amount').value || '0';
    
    // Update preview elements
    document.getElementById('preview-code').textContent = code;
    
    let discountText = 'Get discount on your order';
    let amountText = '--';
    
    if (discount && discountType) {
        if (discountType === 'percentage') {
            discountText = `Get ${discount}% off your order`;
            amountText = `${discount}% OFF`;
        } else if (discountType === 'fixed') {
            discountText = `Get ₹${discount} off your order`;
            amountText = `₹${discount} OFF`;
        }
    }
    
    document.getElementById('preview-discount').textContent = discountText;
    document.getElementById('preview-amount').textContent = amountText;
    
    const conditions = minOrder > 0 ? `Minimum order: ₹${minOrder}` : 'No minimum order required';
    document.getElementById('preview-conditions').textContent = conditions;
}
</script>
@endpush
