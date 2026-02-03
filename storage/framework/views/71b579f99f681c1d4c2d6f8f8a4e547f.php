<?php $__env->startSection('title', 'Product Management'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ========================================
   PRODUCT MANAGEMENT STYLES
======================================== */
.products-management-wrapper {
    padding: 20px;
    background: #f8f9fa;
    min-height: calc(100vh - 100px);
}

.products-header {
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

.products-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.products-stats {
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

.products-table-wrapper {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.products-table-header {
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

.btn-add-product {
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

.btn-add-product:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.3);
}

.products-table {
    width: 100%;
    border-collapse: collapse;
}

.products-table th {
    background: #f8f9fa;
    padding: 15px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #e9ecef;
    font-size: 14px;
}

.products-table td {
    padding: 20px 15px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
}

.products-table tr:hover {
    background: rgba(254, 87, 22, 0.02);
}

.product-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.product-image {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    object-fit: cover;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
}

.product-image-placeholder {
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

.product-details h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 16px;
}

.product-sku {
    color: #6c757d;
    font-size: 12px;
    font-style: italic;
}

.product-price {
    text-align: center;
}

.price-current {
    font-weight: 700;
    color: #fe5716;
    font-size: 16px;
}

.price-original {
    color: #6c757d;
    font-size: 12px;
    text-decoration: line-through;
    margin-top: 2px;
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

.status-featured {
    background: #fff3cd;
    color: #856404;
}

.status-healthy {
    background: #d4edda;
    color: #155724;
}

.status-deal {
    background: #f8d7da;
    color: #721c24;
}

.stock-indicator {
    text-align: center;
}

.stock-badge {
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.stock-in {
    background: #d1f2eb;
    color: #00695c;
}

.stock-out {
    background: #f8d7da;
    color: #721c24;
}

.stock-low {
    background: #fff3cd;
    color: #856404;
}

.category-badge {
    background: #e3f2fd;
    color: #1565c0;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 500;
}

.brand-badge {
    background: #e8f5e8;
    color: #2d5a2d;
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

/* Product Statistics Cards */
.stat-card.total-products {
    border-left-color: #3498db;
}

.stat-card.active-products {
    border-left-color: #2ecc71;
}

.stat-card.featured-products {
    border-left-color: #f39c12;
}

.stat-card.out-of-stock {
    border-left-color: #e74c3c;
}

.stat-card.total-products .stat-number {
    color: #3498db;
}

.stat-card.active-products .stat-number {
    color: #2ecc71;
}

.stat-card.featured-products .stat-number {
    color: #f39c12;
}

.stat-card.out-of-stock .stat-number {
    color: #e74c3c;
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .products-management-wrapper {
        padding: 10px;
    }
    
    .products-header {
        padding: 15px;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .products-header h1 {
        font-size: 24px;
    }
    
    .products-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .stat-card {
        padding: 15px;
    }
    
    .stat-number {
        font-size: 24px;
    }
    
    .products-table-header {
        flex-direction: column;
        align-items: stretch;
        padding: 15px;
    }
    
    .products-table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .products-table {
        min-width: 800px;
        font-size: 12px;
    }
    
    .products-table th,
    .products-table td {
        padding: 8px 6px;
        white-space: nowrap;
    }
    
    .product-info {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
        min-width: 200px;
    }
    
    .product-image,
    .product-image-placeholder {
        width: 40px;
        height: 40px;
    }
    
    .product-details h6 {
        font-size: 13px;
        margin-bottom: 2px;
    }
    
    .product-sku {
        font-size: 10px;
    }
    
    .category-badge,
    .brand-badge {
        font-size: 10px;
        padding: 4px 8px;
    }
    
    .status-badge {
        font-size: 10px;
        padding: 4px 8px;
        margin: 1px;
        display: inline-block;
    }
    
    .stock-badge {
        font-size: 11px;
        padding: 6px 8px;
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
    .products-management-wrapper {
        padding: 5px;
    }
    
    .products-header {
        padding: 10px;
    }
    
    .products-header h1 {
        font-size: 20px;
    }
    
    .products-stats {
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
    
    .products-table-header {
        padding: 10px;
    }
    
    .table-title {
        font-size: 16px;
    }
    
    .products-table {
        min-width: 700px;
        font-size: 11px;
    }
    
    .products-table th,
    .products-table td {
        padding: 6px 4px;
    }
    
    .product-info {
        min-width: 180px;
        gap: 6px;
    }
    
    .product-image,
    .product-image-placeholder {
        width: 35px;
        height: 35px;
    }
    
    .product-details h6 {
        font-size: 12px;
    }
    
    .product-sku {
        font-size: 9px;
    }
    
    .price-current {
        font-size: 14px;
    }
    
    .price-original {
        font-size: 10px;
    }
    
    .category-badge,
    .brand-badge {
        font-size: 9px;
        padding: 3px 6px;
    }
    
    .status-badge {
        font-size: 9px;
        padding: 3px 6px;
    }
    
    .stock-badge {
        font-size: 10px;
        padding: 4px 6px;
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
.products-table-wrapper {
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

.product-info {
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="products-management-wrapper">
    <!-- Page Header -->
    <div class="products-header">
        <div>
            <h1><i class="fas fa-box me-3"></i>Product Management</h1>
            <p class="mb-0">Manage your product catalog and inventory</p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-add-product">
            <i class="fas fa-plus me-2"></i>Add New Product
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="products-stats">
        <div class="stat-card total-products">
            <div class="stat-number"><?php echo e(\App\Models\Product::count()); ?></div>
            <div class="stat-label">Total Products</div>
        </div>
        <div class="stat-card active-products">
            <div class="stat-number"><?php echo e(\App\Models\Product::where('is_active', true)->count()); ?></div>
            <div class="stat-label">Active Products</div>
        </div>
        <div class="stat-card featured-products">
            <div class="stat-number"><?php echo e(\App\Models\Product::where('is_featured', true)->count()); ?></div>
            <div class="stat-label">Featured Products</div>
        </div>
        <div class="stat-card out-of-stock">
            <div class="stat-number"><?php echo e(\App\Models\Product::where('stock_quantity', 0)->count()); ?></div>
            <div class="stat-label">Out of Stock</div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="products-table-wrapper">
        <div class="products-table-header">
            <h3 class="table-title">All Products (<?php echo e($products->total()); ?>)</h3>
            <div class="table-controls">
                <!-- Future: Add search and filter controls here -->
            </div>
        </div>

        <?php if($products->count() > 0): ?>
        <div class="table-responsive">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                                     alt="<?php echo e($product->name); ?>" 
                                     class="product-image">
                            <?php else: ?>
                                <div class="product-image-placeholder">
                                    <i class="fas fa-image"></i>
                                </div>
                            <?php endif; ?>
                            <div class="product-details">
                                <h6><?php echo e($product->name); ?></h6>
                                <div class="product-sku">SKU: <?php echo e($product->sku); ?></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if($product->category): ?>
                            <span class="category-badge"><?php echo e($product->category->name); ?></span>
                        <?php else: ?>
                            <span class="category-badge" style="background: #f8d7da; color: #721c24;">No Category</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($product->brand): ?>
                            <span class="brand-badge"><?php echo e($product->brand->name); ?></span>
                        <?php else: ?>
                            <span class="brand-badge" style="background: #f8d7da; color: #721c24;">No Brand</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="product-price">
                            <?php if($product->sale_price): ?>
                                <div class="price-current">₹<?php echo e(number_format($product->sale_price, 2)); ?></div>
                                <div class="price-original">₹<?php echo e(number_format($product->price, 2)); ?></div>
                            <?php else: ?>
                                <div class="price-current">₹<?php echo e(number_format($product->price, 2)); ?></div>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div class="stock-indicator">
                            <?php if($product->stock_quantity > 10): ?>
                                <span class="stock-badge stock-in"><?php echo e($product->stock_quantity); ?></span>
                            <?php elseif($product->stock_quantity > 0): ?>
                                <span class="stock-badge stock-low"><?php echo e($product->stock_quantity); ?></span>
                            <?php else: ?>
                                <span class="stock-badge stock-out">Out of Stock</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <span class="status-badge <?php echo e($product->is_active ? 'status-active' : 'status-inactive'); ?>">
                                <?php echo e($product->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                            <?php if($product->is_featured): ?>
                                <span class="status-badge status-featured">Featured</span>
                            <?php endif; ?>
                            <?php if($product->is_healthy): ?>
                                <span class="status-badge status-healthy">Healthy</span>
                            <?php endif; ?>
                            <?php if($product->is_deal_of_week): ?>
                                <span class="status-badge status-deal">Deal of Week</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="<?php echo e(route('admin.products.show', $product)); ?>" class="btn-action btn-view">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" 
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Custom Admin Pagination -->
        <div class="admin-pagination-wrapper">
            <div class="pagination-info">
                <span>Showing <strong><?php echo e($products->firstItem()); ?></strong> to <strong><?php echo e($products->lastItem()); ?></strong> of <strong><?php echo e($products->total()); ?></strong> products</span>
            </div>
            
            <?php if($products->hasPages()): ?>
            <nav aria-label="Product pagination">
                <ul class="admin-pagination">
                    
                    <?php if($products->onFirstPage()): ?>
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($products->previousPageUrl()); ?>" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        </li>
                    <?php endif; ?>

                    
                    <?php
                        $start = max(1, $products->currentPage() - 2);
                        $end = min($products->lastPage(), $products->currentPage() + 2);
                    ?>

                    
                    <?php if($start > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($products->url(1)); ?>">1</a>
                        </li>
                        <?php if($start > 2): ?>
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    
                    <?php for($page = $start; $page <= $end; $page++): ?>
                        <?php if($page == $products->currentPage()): ?>
                            <li class="page-item active">
                                <span class="page-link"><?php echo e($page); ?></span>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e($products->url($page)); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    
                    <?php if($end < $products->lastPage()): ?>
                        <?php if($end < $products->lastPage() - 1): ?>
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        <?php endif; ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($products->url($products->lastPage())); ?>"><?php echo e($products->lastPage()); ?></a>
                        </li>
                    <?php endif; ?>

                    
                    <?php if($products->hasMorePages()): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($products->nextPageUrl()); ?>" aria-label="Next">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                Next <i class="fas fa-chevron-right"></i>
                            </span>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <h3>No Products Found</h3>
            <p>Create your first product to get started with your catalog.</p>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-add-product">
                <i class="fas fa-plus me-2"></i>Add Your First Product
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Enhanced product management interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations
    const tableRows = document.querySelectorAll('.products-table tbody tr');
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride\resources\views/admin/products/index.blade.php ENDPATH**/ ?>