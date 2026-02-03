<?php $__env->startSection('page-title', 'Add New Coupon'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Add New Coupon Code</h5>
                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Back to Coupons
                </a>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.coupons.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                    <div class="row">
                        <!-- Coupon Code -->
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label">Coupon Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="code" name="code" value="<?php echo e(old('code')); ?>" 
                                   placeholder="e.g., SAVE20, WELCOME10" style="text-transform: uppercase;">
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">Enter a unique coupon code (letters and numbers only)</small>
                        </div>

                        <!-- Discount Type -->
                        <div class="col-md-6 mb-3">
                            <label for="discount_type" class="form-label">Discount Type <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="discount_type" name="discount_type" onchange="updateDiscountPlaceholder()">
                                <option value="">Select Discount Type</option>
                                <option value="percentage" <?php echo e(old('discount_type') === 'percentage' ? 'selected' : ''); ?>>
                                    Percentage (%)
                                </option>
                                <option value="fixed" <?php echo e(old('discount_type') === 'fixed' ? 'selected' : ''); ?>>
                                    Fixed Amount ($)
                                </option>
                            </select>
                            <?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Discount -->
                        <div class="col-md-6 mb-3">
                            <label for="discount" class="form-label">Discount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" id="discount-symbol">%</span>
                                <input type="number" class="form-control <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="discount" name="discount" value="<?php echo e(old('discount')); ?>" 
                                       placeholder="Enter discount amount" step="0.01" min="0">
                                <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <small class="form-text text-muted" id="discount-help">
                                Enter the discount amount
                            </small>
                        </div>

                        <!-- Min Order Amount -->
                        <div class="col-md-6 mb-3">
                            <label for="min_order_amount" class="form-label">Min. Order Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control <?php $__errorArgs = ['min_order_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="min_order_amount" name="min_order_amount" value="<?php echo e(old('min_order_amount', '0')); ?>" 
                                       placeholder="0.00" step="0.01" min="0">
                                <?php $__errorArgs = ['min_order_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <small class="form-text text-muted">Minimum order amount required to use this coupon</small>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Start Date -->
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="start_date" name="start_date" value="<?php echo e(old('start_date', date('Y-m-d'))); ?>" 
                                   min="<?php echo e(date('Y-m-d')); ?>">
                            <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>" 
                                   min="<?php echo e(date('Y-m-d')); ?>">
                            <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status">
                                <option value="active" <?php echo e(old('status', 'active') === 'active' ? 'selected' : ''); ?>>
                                    Active
                                </option>
                                <option value="inactive" <?php echo e(old('status') === 'inactive' ? 'selected' : ''); ?>>
                                    Inactive
                                </option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Usage Limit -->
                        <div class="col-md-6 mb-3">
                            <label for="usage_limit" class="form-label">Usage Limit (Optional)</label>
                            <input type="number" class="form-control <?php $__errorArgs = ['usage_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="usage_limit" name="usage_limit" value="<?php echo e(old('usage_limit')); ?>" 
                                   placeholder="Leave empty for unlimited" min="1">
                            <?php $__errorArgs = ['usage_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">Maximum number of times this coupon can be used</small>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Description (Optional)</label>
                        <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Enter a description for this coupon..."><?php echo e(old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Preview Section -->
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h6 class="card-title">Coupon Preview</h6>
                            <div class="coupon-preview border rounded p-3 bg-white">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="mb-1 text-primary" id="preview-code">COUPON_CODE</h5>
                                        <p class="mb-1" id="preview-discount">Get discount on your order</p>
                                        <small class="text-muted" id="preview-conditions">Conditions apply</small>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <div class="badge bg-primary fs-6" id="preview-amount">--</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Create Coupon
                        </button>
                        <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize preview
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
        endDateInput.min = startDate;
        
        if (endDateInput.value && endDateInput.value < startDate) {
            endDateInput.value = startDate;
        }
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
    } else {
        discountSymbol.textContent = '';
        discountInput.placeholder = 'Enter discount amount';
        discountInput.removeAttribute('max');
        discountHelp.textContent = 'Enter the discount amount';
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/admin/coupons/create.blade.php ENDPATH**/ ?>