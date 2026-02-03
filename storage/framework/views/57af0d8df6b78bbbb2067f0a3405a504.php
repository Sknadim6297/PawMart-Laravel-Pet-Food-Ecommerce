<?php $__env->startSection('page-title', 'Manage Coupons'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.coupons-management-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.coupons-header {
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

.coupons-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.coupons-header p {
    color: #6c757d;
    margin: 5px 0 0 0;
    font-size: 14px;
}

.btn-add-coupon {
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

.btn-add-coupon:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
    text-decoration: none;
}

.coupons-stats {
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

.stat-card.total-coupons {
    border-left-color: #fe5716;
}

.stat-card.active-coupons {
    border-left-color: #27ae60;
}

.stat-card.valid-coupons {
    border-left-color: #3498db;
}

.stat-card.inactive-coupons {
    border-left-color: #f39c12;
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

.stat-card.total-coupons .stat-number {
    color: #fe5716;
}

.stat-card.active-coupons .stat-number {
    color: #27ae60;
}

.stat-card.valid-coupons .stat-number {
    color: #3498db;
}

.stat-card.inactive-coupons .stat-number {
    color: #f39c12;
}

.coupons-filters-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.coupons-filters-header {
    background: #f8f9fa;
    padding: 15px 20px;
    border-bottom: 1px solid #e9ecef;
}

.coupons-filters-header h5 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin: 0;
}

.coupons-filters-body {
    padding: 20px;
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

.btn-search {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 13px;
}

.btn-search:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-clear {
    background: #6c757d;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 13px;
}

.btn-clear:hover {
    background: #545b62;
    color: white;
    transform: translateY(-1px);
    text-decoration: none;
}

.coupons-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.coupons-table-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.coupons-table-header h5 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.coupons-table-body {
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

.btn-toggle {
    background: #ffc107;
    color: #212529;
}

.btn-toggle:hover {
    background: #e0a800;
    color: #212529;
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
    .coupons-management-wrapper {
        padding: 15px;
    }
    
    .coupons-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .coupons-header h1 {
        font-size: 24px;
    }
    
    .coupons-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 28px;
    }
    
    .coupons-filters-body {
        padding: 15px;
    }
    
    .coupons-table-header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }
    
    .coupons-table-body {
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
    .coupons-management-wrapper {
        padding: 10px;
    }
    
    .coupons-header h1 {
        font-size: 20px;
    }
    
    .btn-add-coupon {
        width: 100%;
        justify-content: center;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .coupons-filters-body {
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="coupons-management-wrapper">
    <!-- Page Header -->
    <div class="coupons-header">
        <div>
            <h1><i class="fas fa-ticket-alt me-2"></i>Coupons Management</h1>
            <p>Manage discount coupons and promotional codes</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn-add-coupon">
                <i class="fas fa-plus"></i> Add New Coupon
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="coupons-stats">
        <div class="stat-card total-coupons">
            <div class="stat-number"><?php echo e(\App\Models\Coupon::count()); ?></div>
            <div class="stat-label">Total Coupons</div>
        </div>
        <div class="stat-card active-coupons">
            <div class="stat-number"><?php echo e(\App\Models\Coupon::active()->count()); ?></div>
            <div class="stat-label">Active Coupons</div>
        </div>
        <div class="stat-card valid-coupons">
            <div class="stat-number"><?php echo e(\App\Models\Coupon::valid()->count()); ?></div>
            <div class="stat-label">Valid Coupons</div>
        </div>
        <div class="stat-card inactive-coupons">
            <div class="stat-number"><?php echo e(\App\Models\Coupon::where('status', 'inactive')->count()); ?></div>
            <div class="stat-label">Inactive Coupons</div>
        </div>
    </div>
    <!-- Filters and Search -->
    <div class="coupons-filters-wrapper">
        <div class="coupons-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="coupons-filters-body">
            <form method="GET" action="<?php echo e(route('admin.coupons.index')); ?>" class="row g-2 align-items-end mb-3">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="form-label">🔍 Search Coupons</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" 
                               placeholder="Search coupons..." value="<?php echo e(request('search')); ?>">
                        <button class="btn-search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">📊 Status</label>
                    <select class="form-select" name="status" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="active" <?php echo e(request('status') === 'active' ? 'selected' : ''); ?>>Active</option>
                        <option value="inactive" <?php echo e(request('status') === 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">💰 Discount Type</label>
                    <select class="form-select" name="discount_type" onchange="this.form.submit()">
                        <option value="">All Types</option>
                        <option value="percentage" <?php echo e(request('discount_type') === 'percentage' ? 'selected' : ''); ?>>Percentage</option>
                        <option value="fixed" <?php echo e(request('discount_type') === 'fixed' ? 'selected' : ''); ?>>Fixed Amount</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <a href="<?php echo e(route('admin.coupons.index')); ?>" class="btn-clear w-100 d-block text-center">
                        <i class="fas fa-times"></i> Clear
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Coupons Table -->
    <div class="coupons-table-wrapper">
        <div class="coupons-table-header">
            <h5><i class="fas fa-list me-2"></i>Coupons List</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2"><?php echo e($coupons->total()); ?> coupons</span>
            </div>
        </div>
        <div class="coupons-table-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Code</th>
                            <th>Discount Type</th>
                            <th>Discount</th>
                            <th>Min. Order Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($coupons->firstItem() + $index); ?></td>
                                <td>
                                    <strong class="text-primary"><?php echo e($coupon->code); ?></strong>
                                    <?php if($coupon->usage_limit): ?>
                                        <br>
                                        <small class="text-muted">
                                            Used: <?php echo e($coupon->used_count); ?>/<?php echo e($coupon->usage_limit); ?>

                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge <?php echo e($coupon->discount_type === 'percentage' ? 'bg-info' : 'bg-warning'); ?>">
                                        <?php echo e(ucfirst($coupon->discount_type)); ?>

                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    <?php echo e($coupon->discount_amount); ?>

                                </td>
                                <td>₹<?php echo e(number_format($coupon->min_order_amount, 2)); ?></td>
                                <td><?php echo e($coupon->formatted_start_date); ?></td>
                                <td><?php echo e($coupon->formatted_end_date); ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <?php echo $coupon->status_badge; ?>

                                        <?php if(!$coupon->is_valid && $coupon->status === 'active'): ?>
                                            <small class="text-muted">(Expired)</small>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="<?php echo e(route('admin.coupons.show', $coupon)); ?>" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="<?php echo e(route('admin.coupons.edit', $coupon)); ?>" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button class="btn-action btn-toggle" 
                                                onclick="toggleStatus(<?php echo e($coupon->id); ?>)">
                                            <i class="fas fa-<?php echo e($coupon->status === 'active' ? 'pause' : 'play'); ?>"></i> 
                                            <?php echo e($coupon->status === 'active' ? 'Stop' : 'Activate'); ?>

                                        </button>
                                        <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" 
                                              method="POST" class="d-inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fas fa-ticket-alt"></i>
                                        <h5>No coupons found</h5>
                                        <p>Start by creating your first coupon.</p>
                                        <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn-add-coupon">
                                            <i class="fas fa-plus"></i> Add New Coupon
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($coupons->hasPages()): ?>
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                Showing <?php echo e($coupons->firstItem()); ?> to <?php echo e($coupons->lastItem()); ?> of <?php echo e($coupons->total()); ?> results
            </div>
            <nav>
                <?php echo e($coupons->withQueryString()->links('pagination::bootstrap-4')); ?>

            </nav>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.coupons-header');
    const stats = document.querySelector('.coupons-stats');
    const filters = document.querySelector('.coupons-filters-wrapper');
    const table = document.querySelector('.coupons-table-wrapper');
    
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

function toggleStatus(couponId) {
    if (confirm('Are you sure you want to toggle the status of this coupon?')) {
        fetch(`<?php echo e(url('admin/coupons')); ?>/${couponId}/toggle-status`, {
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
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/admin/coupons/index.blade.php ENDPATH**/ ?>