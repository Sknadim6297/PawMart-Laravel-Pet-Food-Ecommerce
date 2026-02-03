<?php $__env->startSection('title', 'Reviews Management'); ?>

<<<<<<< HEAD
<?php $__env->startPush('styles'); ?>
<style>
.reviews-management-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.reviews-header {
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

.reviews-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.reviews-header p {
    color: #6c757d;
    margin: 5px 0 0 0;
    font-size: 14px;
}

.reviews-stats {
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

.stat-card.total-reviews {
    border-left-color: #fe5716;
}

.stat-card.approved-reviews {
    border-left-color: #27ae60;
}

.stat-card.pending-reviews {
    border-left-color: #f39c12;
}

.stat-card.avg-rating {
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

.stat-card.total-reviews .stat-number {
    color: #fe5716;
}

.stat-card.approved-reviews .stat-number {
    color: #27ae60;
}

.stat-card.pending-reviews .stat-number {
    color: #f39c12;
}

.stat-card.avg-rating .stat-number {
    color: #3498db;
}

.reviews-filters-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.reviews-filters-header {
    background: #f8f9fa;
    padding: 15px 20px;
    border-bottom: 1px solid #e9ecef;
}

.reviews-filters-header h5 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    margin: 0;
}

.reviews-filters-body {
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
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
}

.btn-bulk-approve {
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 13px;
}

.btn-bulk-approve:hover {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
}

.btn-bulk-delete {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 13px;
}

.btn-bulk-delete:hover {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
}

.reviews-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.reviews-table-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.reviews-table-header h5 {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
    font-size: 18px;
}

.reviews-table-body {
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

.btn-approve {
    background: #28a745;
    color: white;
}

.btn-approve:hover {
    background: #1e7e34;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

.btn-reject {
    background: #ffc107;
    color: #212529;
}

.btn-reject:hover {
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
    .reviews-management-wrapper {
        padding: 15px;
    }
    
    .reviews-header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .reviews-header h1 {
        font-size: 24px;
    }
    
    .reviews-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 28px;
    }
    
    .reviews-filters-body {
        padding: 15px;
    }
    
    .reviews-table-header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }
    
    .reviews-table-body {
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
    .reviews-management-wrapper {
        padding: 10px;
    }
    
    .reviews-header h1 {
        font-size: 20px;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .reviews-filters-body {
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
<div class="reviews-management-wrapper">
    <!-- Page Header -->
    <div class="reviews-header">
        <div>
            <h1><i class="fas fa-star me-2"></i>Reviews Management</h1>
            <p>Manage customer reviews and ratings</p>
        </div>
        <div class="d-flex gap-2">
            <span class="badge bg-light text-dark border px-3 py-2"><?php echo e($reviews->total()); ?> Total Reviews</span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="reviews-stats">
        <div class="stat-card total-reviews">
            <div class="stat-number"><?php echo e($reviews->total()); ?></div>
            <div class="stat-label">Total Reviews</div>
        </div>
        <div class="stat-card approved-reviews">
            <div class="stat-number"><?php echo e($reviews->where('is_approved', true)->count()); ?></div>
            <div class="stat-label">Approved</div>
        </div>
        <div class="stat-card pending-reviews">
            <div class="stat-number"><?php echo e($reviews->where('is_approved', false)->count()); ?></div>
            <div class="stat-label">Pending</div>
        </div>
        <div class="stat-card avg-rating">
            <div class="stat-number"><?php echo e(number_format($reviews->avg('rating'), 1)); ?></div>
            <div class="stat-label">Avg Rating</div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="reviews-filters-wrapper">
        <div class="reviews-filters-header">
            <h5><i class="fas fa-filter me-2"></i>Filters & Search</h5>
        </div>
        <div class="reviews-filters-body">
            <form method="GET" action="<?php echo e(route('admin.reviews.index')); ?>" class="row g-2 align-items-end mb-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">📊 Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All Reviews</option>
                        <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approved</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">📦 Product</label>
                    <select name="product_id" class="form-select form-select-sm">
                        <option value="">All Products</option>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" <?php echo e(request('product_id') == $product->id ? 'selected' : ''); ?>>
                                <?php echo e($product->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label">⭐ Rating</label>
                    <select name="rating" class="form-select form-select-sm">
                        <option value="">All Ratings</option>
                        <?php for($i = 5; $i >= 1; $i--): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e(request('rating') == $i ? 'selected' : ''); ?>>
                                <?php echo e($i); ?> Star<?php echo e($i > 1 ? 's' : ''); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">🔍 Search</label>
                    <input type="text" name="search" class="form-control form-control-sm" 
                           placeholder="Name, email, or comment..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-6">
                    <button type="submit" class="btn-filter btn-sm">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </form>

            <!-- Bulk Actions -->
            <div class="d-flex gap-2">
                <button type="button" class="btn-bulk-approve btn-sm" onclick="bulkApprove()">
                    <i class="fas fa-check"></i> Bulk Approve
                </button>
                <button type="button" class="btn-bulk-delete btn-sm" onclick="bulkDelete()">
                    <i class="fas fa-trash"></i> Bulk Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Reviews Table -->
    <div class="reviews-table-wrapper">
        <div class="reviews-table-header">
            <h5><i class="fas fa-list me-2"></i>Reviews List</h5>
            <div class="d-flex align-items-center gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="select-all">
                    <label class="form-check-label fw-semibold" for="select-all">Select All</label>
                </div>
                <span class="badge bg-light text-dark border px-3 py-2"><?php echo e($reviews->total()); ?> reviews</span>
            </div>
        </div>
        <div class="reviews-table-body">
            <form id="bulk-form">
                <?php echo csrf_field(); ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th>Product</th>
                                <th>Reviewer</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="review_ids[]" value="<?php echo e($review->id); ?>" class="review-checkbox">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if($review->product->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $review->product->image)); ?>" 
                                                 alt="<?php echo e($review->product->name); ?>" 
                                                 class="img-thumbnail me-2" style="width: 40px; height: 40px; object-fit: cover; border-radius: 8px;">
                                        <?php endif; ?>
                                        <div>
                                            <strong><?php echo e(Str::limit($review->product->name, 30)); ?></strong>
                                            <br>
                                            <small class="text-muted"><?php echo e($review->product->sku); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong><?php echo e($review->name); ?></strong>
                                        <br>
                                        <small class="text-muted"><?php echo e($review->email); ?></small>
                                        <?php if($review->user): ?>
                                            <br>
                                            <span class="badge bg-info text-white" style="font-size: 10px;">Registered User</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="rating">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if($i <= $review->rating): ?>
                                                <i class="fas fa-star text-warning"></i>
                                            <?php else: ?>
                                                <i class="far fa-star text-muted"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <br>
                                        <small class="text-muted"><?php echo e($review->rating); ?>/5</small>
                                    </div>
                                </td>
                                <td>
                                    <div style="max-width: 200px;">
                                        <?php echo e(Str::limit($review->comment, 100)); ?>

                                        <?php if(strlen($review->comment) > 100): ?>
                                            <a href="<?php echo e(route('admin.reviews.show', $review)); ?>" class="text-primary">
                                                <small>Read more...</small>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if($review->is_approved): ?>
                                        <span class="badge bg-success">Approved</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <small><?php echo e($review->created_at->format('M d, Y')); ?></small>
                                    <br>
                                    <small class="text-muted"><?php echo e($review->created_at->format('h:i A')); ?></small>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="<?php echo e(route('admin.reviews.show', $review)); ?>" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        
                                        <?php if($review->is_approved): ?>
                                            <button type="button" 
                                                    class="btn-action btn-reject approve-reject-btn" 
                                                    data-url="<?php echo e(route('admin.reviews.reject', $review)); ?>"
                                                    data-action="reject">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        <?php else: ?>
                                            <button type="button" 
                                                    class="btn-action btn-approve approve-reject-btn" 
                                                    data-url="<?php echo e(route('admin.reviews.approve', $review)); ?>"
                                                    data-action="approve">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                        <?php endif; ?>
                                        
                                        <form action="<?php echo e(route('admin.reviews.destroy', $review)); ?>" 
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
                                <td colspan="8" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fas fa-star"></i>
                                        <h5>No Reviews Found</h5>
                                        <p>No reviews match your current filters.</p>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($reviews->count() > 0): ?>
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                Showing <?php echo e($reviews->firstItem() ?? 0); ?> to <?php echo e($reviews->lastItem() ?? 0); ?> of <?php echo e($reviews->total()); ?> results
            </div>
            <nav>
                <?php echo e($reviews->appends(request()->query())->links('pagination::bootstrap-4')); ?>

            </nav>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.reviews-header');
    const stats = document.querySelector('.reviews-stats');
    const filters = document.querySelector('.reviews-filters-wrapper');
    const table = document.querySelector('.reviews-table-wrapper');
    
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

=======
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Reviews Management</h3>
                    <div class="card-tools">
                        <span class="badge badge-primary"><?php echo e($reviews->total()); ?> Total Reviews</span>
                    </div>
                </div>

                <!-- Filters -->
                <div class="card-body">
                    <form method="GET" action="<?php echo e(route('admin.reviews.index')); ?>" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">All Reviews</option>
                                    <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approved</option>
                                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">All Products</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>" <?php echo e(request('product_id') == $product->id ? 'selected' : ''); ?>>
                                            <?php echo e($product->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="rating">Rating</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="">All Ratings</option>
                                    <?php for($i = 5; $i >= 1; $i--): ?>
                                        <option value="<?php echo e($i); ?>" <?php echo e(request('rating') == $i ? 'selected' : ''); ?>>
                                            <?php echo e($i); ?> Star<?php echo e($i > 1 ? 's' : ''); ?>

                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="search">Search</label>
                                <input type="text" name="search" id="search" class="form-control" 
                                       placeholder="Search by name, email, or comment" value="<?php echo e(request('search')); ?>">
                            </div>
                            <div class="col-md-1">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Bulk Actions -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-success btn-sm" onclick="bulkApprove()">
                                <i class="fas fa-check"></i> Bulk Approve
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="bulkDelete()">
                                <i class="fas fa-trash"></i> Bulk Delete
                            </button>
                        </div>
                    </div>

                    <!-- Reviews Table -->
                    <form id="bulk-form">
                        <?php echo csrf_field(); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select-all">
                                        </th>
                                        <th>Product</th>
                                        <th>Reviewer</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="review_ids[]" value="<?php echo e($review->id); ?>" class="review-checkbox">
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php if($review->product->image): ?>
                                                    <img src="<?php echo e(asset('storage/' . $review->product->image)); ?>" 
                                                         alt="<?php echo e($review->product->name); ?>" 
                                                         class="img-thumbnail mr-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                <?php endif; ?>
                                                <div>
                                                    <strong><?php echo e(Str::limit($review->product->name, 30)); ?></strong>
                                                    <br>
                                                    <small class="text-muted"><?php echo e($review->product->sku); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <strong><?php echo e($review->name); ?></strong>
                                                <br>
                                                <small class="text-muted"><?php echo e($review->email); ?></small>
                                                <?php if($review->user): ?>
                                                    <br>
                                                    <span class="badge badge-info">Registered User</span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($i <= $review->rating): ?>
                                                        <i class="fas fa-star text-warning"></i>
                                                    <?php else: ?>
                                                        <i class="far fa-star text-muted"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <br>
                                                <small class="text-muted"><?php echo e($review->rating); ?>/5</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="max-width: 200px;">
                                                <?php echo e(Str::limit($review->comment, 100)); ?>

                                                <?php if(strlen($review->comment) > 100): ?>
                                                    <a href="<?php echo e(route('admin.reviews.show', $review)); ?>" class="text-primary">
                                                        <small>Read more...</small>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($review->is_approved): ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <small><?php echo e($review->created_at->format('M d, Y')); ?></small>
                                            <br>
                                            <small class="text-muted"><?php echo e($review->created_at->format('h:i A')); ?></small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('admin.reviews.show', $review)); ?>" 
                                                   class="btn btn-info btn-sm" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                                <?php if($review->is_approved): ?>
                                                    <button type="button" 
                                                            class="btn btn-warning btn-sm approve-reject-btn" 
                                                            data-url="<?php echo e(route('admin.reviews.reject', $review)); ?>"
                                                            data-action="reject"
                                                            title="Reject Review">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" 
                                                            class="btn btn-success btn-sm approve-reject-btn" 
                                                            data-url="<?php echo e(route('admin.reviews.approve', $review)); ?>"
                                                            data-action="approve"
                                                            title="Approve Review">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                <?php endif; ?>
                                                
                                                <form action="<?php echo e(route('admin.reviews.destroy', $review)); ?>" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this review?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Review">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-star fa-3x mb-3"></i>
                                                <h5>No Reviews Found</h5>
                                                <p>No reviews match your current filters.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            Showing <?php echo e($reviews->firstItem() ?? 0); ?> to <?php echo e($reviews->lastItem() ?? 0); ?> of <?php echo e($reviews->total()); ?> results
                        </div>
                        <div>
                            <?php echo e($reviews->appends(request()->query())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
>>>>>>> origin/main
$(document).ready(function() {
    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded! Admin functionality may not work.');
        alert('JavaScript Error: jQuery is missing. Please refresh the page.');
        return;
    }
    
    console.log('jQuery loaded successfully. Version:', jQuery.fn.jquery);
    console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));
    
    // Setup AJAX CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Handle approve/reject buttons with AJAX
    $('.approve-reject-btn').on('click', function(e) {
        e.preventDefault();
        
        const btn = $(this);
        const url = btn.data('url');
        const action = btn.data('action');
        const actionText = action === 'approve' ? 'approve' : 'reject';
        
        console.log('Button clicked:', action, 'URL:', url);
        
        if (confirm(`Are you sure you want to ${actionText} this review?`)) {
            // Show loading state
            const originalHtml = btn.html();
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            
            // Make AJAX request
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                success: function(response) {
                    console.log('Success response:', response);
                    
                    // Show success message
                    if (response.message) {
                        const alertDiv = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '<i class="fas fa-check-circle me-2"></i>' + response.message +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>');
                        $('.card-body').prepend(alertDiv);
                        
                        // Auto-dismiss after 3 seconds
                        setTimeout(() => alertDiv.alert('close'), 3000);
                    }
                    
                    // Reload page to show updated status
                    setTimeout(() => window.location.reload(), 1000);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', {
                        xhr: xhr,
                        status: status,
                        error: error,
                        responseText: xhr.responseText,
                        responseJSON: xhr.responseJSON
                    });
                    
                    let errorMessage = 'Something went wrong';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.status === 419) {
                        errorMessage = 'CSRF token mismatch. Please refresh the page and try again.';
                    } else if (xhr.status === 404) {
                        errorMessage = 'Review not found or URL is incorrect.';
                    } else if (xhr.status === 500) {
                        errorMessage = 'Server error occurred. Please try again.';
                    } else if (xhr.responseText) {
                        errorMessage = 'Server error: ' + xhr.status;
                    }
                    
                    const alertDiv = $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<i class="fas fa-exclamation-circle me-2"></i>Error: ' + errorMessage +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>');
                    $('.card-body').prepend(alertDiv);
                    
                    btn.prop('disabled', false).html(originalHtml);
                }
            });
        }
    });
    
    // Handle legacy form submissions (fallback)
    $('.approve-reject-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const action = form.data('action');
        const actionText = action === 'approve' ? 'approve' : 'reject';
        
        if (confirm(`Are you sure you want to ${actionText} this review?`)) {
            // Show loading state
            const submitBtn = form.find('button[type="submit"]');
            const originalHtml = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            
            // Submit form via AJAX to prevent URL issues
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Show success message
                    if (response.message) {
                        // Create a simple alert or you can use a toast
                        const alertDiv = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            response.message +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>');
                        $('.card-body').prepend(alertDiv);
                        
                        // Auto-dismiss after 3 seconds
                        setTimeout(() => alertDiv.alert('close'), 3000);
                    }
                    
                    // Reload page to show updated status
                    setTimeout(() => window.location.reload(), 1000);
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Something went wrong';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    alert('Error: ' + errorMessage);
                    submitBtn.prop('disabled', false).html(originalHtml);
                }
            });
        }
    });
    
    // Select all checkbox functionality
    $('#select-all').change(function() {
        $('.review-checkbox').prop('checked', $(this).prop('checked'));
    });

    // Update select all when individual checkboxes change
    $('.review-checkbox').change(function() {
        if ($('.review-checkbox:checked').length === $('.review-checkbox').length) {
            $('#select-all').prop('checked', true);
        } else {
            $('#select-all').prop('checked', false);
        }
    });
});

function bulkApprove() {
    if (typeof $ === 'undefined') {
        alert('jQuery is not loaded. Please refresh the page.');
        return;
    }
    
    const selected = $('.review-checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    if (selected.length === 0) {
        alert('Please select at least one review to approve.');
        return;
    }

    if (confirm(`Are you sure you want to approve ${selected.length} review(s)?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route("admin.reviews.bulk-approve")); ?>';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '<?php echo e(csrf_token()); ?>';
        form.appendChild(csrfToken);

        selected.forEach(function(id) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'review_ids[]';
            input.value = id;
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    }
}

function bulkDelete() {
    if (typeof $ === 'undefined') {
        alert('jQuery is not loaded. Please refresh the page.');
        return;
    }
    
    const selected = $('.review-checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    if (selected.length === 0) {
        alert('Please select at least one review to delete.');
        return;
    }

    if (confirm(`Are you sure you want to delete ${selected.length} review(s)? This action cannot be undone.`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route("admin.reviews.bulk-delete")); ?>';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '<?php echo e(csrf_token()); ?>';
        form.appendChild(csrfToken);

        selected.forEach(function(id) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'review_ids[]';
            input.value = id;
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    }
}
</script>
<<<<<<< HEAD
<?php $__env->stopPush(); ?>
=======

<script>
// Test function for debugging
function testAjaxConnection() {
    console.log('Testing AJAX connection...');
    
    $.ajax({
        url: '<?php echo e(route("admin.reviews.index")); ?>',
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        success: function(response) {
            console.log('AJAX test successful:', response);
        },
        error: function(xhr, status, error) {
            console.error('AJAX test failed:', {
                xhr: xhr,
                status: status,
                error: error,
                responseText: xhr.responseText
            });
        }
    });
}

// Add test button for debugging (temporary)
$(document).ready(function() {
    if (window.location.search.includes('debug=1')) {
        $('<button class="btn btn-info btn-sm" onclick="testAjaxConnection()">Test AJAX</button>')
            .appendTo('.card-tools');
    }
});
</script>
<?php $__env->stopSection(); ?>
>>>>>>> origin/main

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride\resources\views/admin/reviews/index.blade.php ENDPATH**/ ?>