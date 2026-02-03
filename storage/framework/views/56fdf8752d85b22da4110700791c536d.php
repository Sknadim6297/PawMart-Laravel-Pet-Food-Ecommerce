<?php $__env->startSection('title', 'Order Details - Admin'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ========================================
   ADMIN ORDER DETAILS STYLES
======================================== */
.order-details-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
    max-width: 100%;
    overflow-x: hidden;
}

.order-show-header {
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

.order-show-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
    flex: 1;
}

.order-show-header .breadcrumb-container {
    margin-top: 10px;
}

/* Breadcrumb Styling */
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

.btn-back-orders {
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

.btn-back-orders:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.order-details-header {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.order-title-section {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.order-title-left h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 24px;
    line-height: 1.2;
}

.order-meta-info {
    color: #6c757d;
    font-size: 14px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.order-title-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 15px;
}

.status-management {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.current-status {
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.current-status.pending {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

.current-status.confirmed {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.current-status.processing {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.current-status.shipped {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
}

.current-status.delivered {
    background: linear-gradient(135deg, #06b6d4, #0891b2);
    color: white;
    box-shadow: 0 4px 15px rgba(6, 182, 212, 0.2);
}

.current-status.cancelled {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
}

.current-status:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.btn-update-status {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-update-status:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254, 87, 22, 0.4);
    color: white;
}

.order-actions-top {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.btn-action-top {
    padding: 10px 16px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-print {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
}

.btn-download {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.btn-email {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.btn-action-top:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

.order-content-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 20px;
    max-width: 100%;
}

@media (max-width: 1200px) {
    .order-content-grid {
        grid-template-columns: 1fr 300px;
        gap: 15px;
    }
}

.order-main-content {
    display: flex;
    flex-direction: column;
    gap: 20px;
    min-width: 0; /* Prevent flex item from overflowing */
}

.order-sidebar {
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-width: 0; /* Prevent flex item from overflowing */
}

.content-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    position: relative;
    word-wrap: break-word;
    transition: all 0.3s ease;
}

.content-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.card-title {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    margin: 0;
    padding: 20px;
    font-weight: 600;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-body {
    padding: 25px;
}

/* Order Items Table */
.table-container {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 12px;
    border: 2px solid #e9ecef;
    scrollbar-width: thin;
    scrollbar-color: #fe5716 #f1f1f1;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.table-container::-webkit-scrollbar {
    height: 8px;
}

.table-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-container::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    border-radius: 4px;
}

.table-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
}

.order-items-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
}

.order-items-table th {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 15px 12px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #fe5716;
    font-size: 14px;
    white-space: nowrap;
}

.order-items-table td {
    padding: 15px 12px;
    border-bottom: 1px solid #f1f3f4;
    vertical-align: middle;
    transition: all 0.3s ease;
}

.order-items-table tr:hover td {
    background: rgba(254, 87, 22, 0.05);
}

.item-info {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 200px;
}

.item-image {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    object-fit: cover;
    border: 3px solid #e9ecef;
    flex-shrink: 0;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.item-image:hover {
    transform: scale(1.05);
    border-color: #fe5716;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.2);
}

.item-details h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 14px;
    line-height: 1.4;
}

.item-details .item-meta {
    color: #6c757d;
    font-size: 12px;
    line-height: 1.4;
}

.quantity-display {
    text-align: center;
    font-weight: 700;
    color: #2c3e50;
    background: #f8f9fa;
    padding: 8px 12px;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

.price-display {
    text-align: right;
    font-weight: 700;
    color: #fe5716;
    font-size: 16px;
}

/* Order Summary */
.order-summary {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 25px;
    border-radius: 15px;
    border: 2px solid #e9ecef;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    color: #495057;
    font-weight: 500;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.summary-row:last-child {
    border-bottom: none;
}

.summary-row.total {
    font-weight: 700;
    font-size: 20px;
    color: #2c3e50;
    border-top: 3px solid #fe5716;
    margin-top: 20px;
    padding-top: 20px;
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border-radius: 10px;
    padding: 15px 20px;
}

.summary-row.total .amount {
    color: white;
    font-size: 24px;
}

/* Coupon Display Styles for Admin Show Page */
.summary-row.discount {
    background: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 100%);
    padding: 10px 15px;
    border-radius: 8px;
    border: 1px solid #c3e6cb;
    margin: 5px 0;
}

.summary-row.discount span {
    color: #28a745 !important;
    font-weight: 600;
}

.summary-row.discount i {
    margin-right: 5px;
}

/* Customer Information */
.customer-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.customer-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.customer-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}

.customer-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 20px;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.3);
    transition: all 0.3s ease;
}

.customer-avatar:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.4);
}

.customer-info h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 18px;
}

.customer-info .text-muted {
    font-size: 14px;
    color: #6c757d;
}

.customer-details {
    color: #6c757d;
    line-height: 1.8;
    font-size: 14px;
}

.customer-details strong {
    color: #2c3e50;
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
}

/* Address Cards */
.address-card {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 25px;
    border-radius: 15px;
    border: 2px solid #e9ecef;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.address-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.address-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 20px;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.address-content {
    color: #6c757d;
    line-height: 1.8;
    font-size: 14px;
}

/* Order Timeline */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #fe5716;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #fe5716;
}

.timeline-item.completed::before {
    background: #28a745;
    box-shadow: 0 0 0 3px #28a745;
}

.timeline-content {
    background: white;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.timeline-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 5px;
}

.timeline-time {
    font-size: 12px;
    color: #6c757d;
}

/* Management Actions */
.management-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 20px;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 15px 20px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    justify-content: center;
    font-size: 14px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.action-btn-primary {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    box-shadow: 0 4px 15px rgba(254, 87, 22, 0.2);
}

.action-btn-secondary {
    background: linear-gradient(135deg, #6c757d, #495057);
    color: white;
    box-shadow: 0 4px 15px rgba(108, 117, 125, 0.2);
}

.action-btn-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.action-btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

.action-btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
}

.action-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    color: inherit;
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

/* Status Update Modal */
.status-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.status-modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    min-width: 500px;
    max-width: 90%;
}

.status-modal h3 {
    color: #2c3e50;
    margin-bottom: 20px;
    font-size: 24px;
}

.status-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    width: 100%;
}

.form-control:focus {
    border-color: #fe5716;
    outline: none;
    box-shadow: 0 0 0 3px rgba(254, 87, 22, 0.1);
}

.status-form-buttons {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn-modal {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-modal.cancel {
    background: #6c757d;
    color: white;
}

.btn-modal.save {
    background: #fe5716;
    color: white;
}

.btn-modal:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .order-details-wrapper {
        padding: 10px;
    }
    
    .order-details-header {
        padding: 15px;
    }
    
    .order-title-left h1 {
        font-size: 20px;
    }
    
    .order-title-section {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
    }
    
    .order-title-right {
        align-items: flex-start;
    }
    
    .status-management {
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
    }
    
    .order-actions-top {
        justify-content: flex-start;
    }
    
    .order-content-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .content-card {
        padding: 15px;
    }
    
    .card-title {
        font-size: 14px;
        margin-bottom: 12px;
    }
    
    .order-items-table {
        font-size: 12px;
        min-width: 500px;
    }
    
    .order-items-table th,
    .order-items-table td {
        padding: 8px 6px;
    }
    
    .item-image {
        width: 40px;
        height: 40px;
    }
    
    .item-details h6 {
        font-size: 12px;
    }
    
    .item-details .item-meta {
        font-size: 10px;
    }
    
    .management-actions {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .action-btn {
        padding: 10px 15px;
        font-size: 13px;
    }
    
    .status-modal-content {
        min-width: 90%;
        margin: 20px;
        padding: 20px;
    }
    
    .customer-card {
        padding: 15px;
    }
    
    .address-card {
        padding: 15px;
    }
    
    .order-summary {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .order-details-wrapper {
        padding: 8px;
    }
    
    .order-details-header {
        padding: 12px;
    }
    
    .order-title-left h1 {
        font-size: 18px;
    }
    
    .content-card {
        padding: 12px;
    }
    
    .order-items-table {
        min-width: 450px;
    }
    
    .btn-update-status,
    .btn-action-top {
        font-size: 12px;
        padding: 8px 12px;
    }
    
    .current-status {
        font-size: 12px;
        padding: 8px 15px;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="order-details-wrapper">
    <!-- Page Header -->
    <div class="order-show-header">
        <div>
            <h1><i class="fas fa-shopping-cart me-2"></i>Order #<?php echo e($order->order_number); ?></h1>
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.orders.index')); ?>">Orders</a></li>
                        <li class="breadcrumb-item active">Order #<?php echo e($order->order_number); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn-back-orders">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>

    <!-- Order Details Header -->
    <div class="order-details-header">
        <div class="order-title-section">
            <div class="order-title-left">
                <h2><i class="fas fa-receipt me-3"></i>Order Details</h2>
                <div class="order-meta-info">
                    <div><i class="fas fa-calendar me-2"></i>Placed on <?php echo e($order->created_at->format('M d, Y \a\t h:i A')); ?></div>
                    <div><i class="fas fa-credit-card me-2"></i>Payment: <?php echo e($order->payment_method == 'cash_on_delivery' ? 'Cash on Delivery' : 'Online Payment'); ?></div>
                    <div><i class="fas fa-info-circle me-2"></i>Payment Status: <?php echo e(ucfirst($order->payment_status)); ?></div>
                </div>
            </div>
            <div class="order-title-right">
                <div class="status-management">
                    <div class="current-status <?php echo e($order->status); ?>">
                        <i class="fas fa-circle"></i><?php echo e(ucfirst($order->status)); ?>

                    </div>
                    <button class="btn-update-status" onclick="openStatusModal()">
                        <i class="fas fa-edit"></i>Update Status
                    </button>
                </div>
                <div class="order-actions-top">
                    <button class="btn-action-top btn-print" onclick="window.print()">
                        <i class="fas fa-print"></i>Print
                    </button>
                    <button class="btn-action-top btn-download">
                        <i class="fas fa-download"></i>Download PDF
                    </button>
                    <button class="btn-action-top btn-email">
                        <i class="fas fa-envelope"></i>Email Customer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="order-content-grid">
        <!-- Main Content -->
        <div class="order-main-content">
            <!-- Order Items -->
            <div class="content-card">
                <h3 class="card-title"><i class="fas fa-box"></i>Order Items</h3>
                <div class="card-body">
                    <div class="table-container">
                    <table class="order-items-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="item-info">
                                    <?php if($item->item_type === 'cooked_food' && $item->cookedFood): ?>
                                        
                                        <img src="<?php echo e($item->cookedFood->image ? asset('storage/' . $item->cookedFood->image) : asset('assets/img/product-placeholder.jpg')); ?>" 
                                             alt="<?php echo e($item->cookedFood->name); ?>" class="item-image">
                                        <div class="item-details">
                                            <h6><?php echo e($item->cookedFood->name); ?> <span class="badge bg-success">Cooked Food</span></h6>
                                            <div class="item-meta">ID: <?php echo e($item->cookedFood->id); ?></div>
                                            <?php if($item->cookedFood->description): ?>
                                            <div class="item-meta"><?php echo e(Str::limit($item->cookedFood->description, 50)); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php elseif($item->product): ?>
                                        
                                        <img src="<?php echo e($item->product->image ? asset('storage/' . $item->product->image) : asset('assets/img/product-placeholder.jpg')); ?>" 
                                             alt="<?php echo e($item->product->name); ?>" class="item-image">
                                        <div class="item-details">
                                            <h6><?php echo e($item->product->name); ?> <span class="badge bg-primary">Product</span></h6>
                                            <div class="item-meta">SKU: <?php echo e($item->product->id); ?></div>
                                            <?php if($item->product->short_description): ?>
                                            <div class="item-meta"><?php echo e(Str::limit($item->product->short_description, 50)); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        
                                        <img src="<?php echo e(asset('assets/img/product-placeholder.jpg')); ?>" 
                                             alt="Unknown Item" class="item-image">
                                        <div class="item-details">
                                            <h6>Unknown Item <span class="badge bg-warning">Error</span></h6>
                                            <div class="item-meta">Item could not be loaded</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="quantity-display"><?php echo e($item->quantity); ?></td>
                            <td class="price-display">₹<?php echo e(number_format($item->price, 2)); ?></td>
                            <td class="price-display">₹<?php echo e(number_format($item->total, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    </div> <!-- Close table-container -->

                    <!-- Order Summary -->
                    <div class="order-summary mt-4">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>₹<?php echo e(number_format($order->subtotal, 2)); ?></span>
                    </div>
                    <?php if($order->coupon_code && $order->discount_amount > 0): ?>
                    <div class="summary-row discount">
                        <span class="text-success">
                            <i class="fas fa-tag me-1"></i>Coupon (<?php echo e($order->coupon_code); ?>):
                        </span>
                        <span class="text-success">-₹<?php echo e(number_format($order->discount_amount, 2)); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span><?php echo e($order->shipping_amount == 0 ? 'Free' : '₹' . number_format($order->shipping_amount, 2)); ?></span>
                    </div>
                    <div class="summary-row total">
                        <span>Total Amount:</span>
                        <span class="amount">₹<?php echo e(number_format($order->total_amount, 2)); ?></span>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="content-card">
                <h3 class="card-title"><i class="fas fa-shipping-fast"></i>Shipping Information</h3>
                <div class="card-body">
                <div class="address-card">
                    <div class="address-title">
                        <i class="fas fa-map-marker-alt"></i>Delivery Address
                    </div>
                    <div class="address-content">
                        <strong><?php echo e($order->user->name); ?></strong><br>
                        <?php echo e($order->shipping_address); ?><br>
                        <strong>Phone:</strong> <?php echo e($order->phone); ?><br>
                        <strong>Email:</strong> <?php echo e($order->email); ?>

                    </div>
                </div>
                
                <?php if($order->order_notes): ?>
                <div class="address-card">
                    <div class="address-title">
                        <i class="fas fa-sticky-note"></i>Order Notes
                    </div>
                    <div class="address-content">
                        <?php echo e($order->order_notes); ?>

                    </div>
                </div>
                <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="order-sidebar">
            <!-- Customer Information -->
            <div class="content-card">
                <h4 class="card-title"><i class="fas fa-user"></i>Customer</h4>
                <div class="card-body">
                    <div class="customer-card">
                    <div class="customer-header">
                        <div class="customer-avatar">
                            <?php echo e(strtoupper(substr($order->user->name, 0, 1))); ?>

                        </div>
                        <div class="customer-info">
                            <h6><?php echo e($order->user->name); ?></h6>
                            <div class="text-muted">Customer since <?php echo e($order->user->created_at->format('M Y')); ?></div>
                        </div>
                    </div>
                    <div class="customer-details">
                        <strong>Email:</strong> <?php echo e($order->user->email); ?><br>
                        <strong>Phone:</strong> <?php echo e($order->phone); ?><br>
                        <strong>Total Orders:</strong> <?php echo e($order->user->orders()->count()); ?><br>
                        <strong>Customer ID:</strong> #<?php echo e($order->user->id); ?>

                    </div>
                    </div>
                </div>
            </div>

            <!-- Order Timeline -->
            <div class="content-card">
                <h4 class="card-title"><i class="fas fa-history"></i>Order Timeline</h4>
                <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item completed">
                        <div class="timeline-content">
                            <div class="timeline-title">Order Placed</div>
                            <div class="timeline-time"><?php echo e($order->created_at->format('M d, Y h:i A')); ?></div>
                        </div>
                    </div>
                    <?php if(in_array($order->status, ['confirmed', 'processing', 'shipped', 'delivered'])): ?>
                    <div class="timeline-item completed">
                        <div class="timeline-content">
                            <div class="timeline-title">Order Confirmed</div>
                            <div class="timeline-time"><?php echo e($order->updated_at->format('M d, Y h:i A')); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array($order->status, ['processing', 'shipped', 'delivered'])): ?>
                    <div class="timeline-item completed">
                        <div class="timeline-content">
                            <div class="timeline-title">Processing Started</div>
                            <div class="timeline-time"><?php echo e($order->updated_at->format('M d, Y h:i A')); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array($order->status, ['shipped', 'delivered'])): ?>
                    <div class="timeline-item completed">
                        <div class="timeline-content">
                            <div class="timeline-title">Order Shipped</div>
                            <div class="timeline-time"><?php echo e($order->updated_at->format('M d, Y h:i A')); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($order->status == 'delivered'): ?>
                    <div class="timeline-item completed">
                        <div class="timeline-content">
                            <div class="timeline-title">Order Delivered</div>
                            <div class="timeline-time"><?php echo e($order->updated_at->format('M d, Y h:i A')); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="content-card">
                <h4 class="card-title"><i class="fas fa-tools"></i>Quick Actions</h4>
                <div class="card-body">
                <div class="management-actions">
                    <?php if(in_array($order->status, ['pending', 'confirmed'])): ?>
                    <button class="action-btn action-btn-success" onclick="updateOrderStatus('confirmed')">
                        <i class="fas fa-check"></i>Confirm Order
                    </button>
                    <button class="action-btn action-btn-warning" onclick="updateOrderStatus('processing')">
                        <i class="fas fa-cogs"></i>Start Processing
                    </button>
                    <?php endif; ?>
                    
                    <?php if($order->status == 'processing'): ?>
                    <button class="action-btn action-btn-primary" onclick="updateOrderStatus('shipped')">
                        <i class="fas fa-shipping-fast"></i>Mark as Shipped
                    </button>
                    <?php endif; ?>
                    
                    <?php if($order->status == 'shipped'): ?>
                    <button class="action-btn action-btn-success" onclick="updateOrderStatus('delivered')">
                        <i class="fas fa-home"></i>Mark as Delivered
                    </button>
                    <?php endif; ?>
                    
                    <?php if(!in_array($order->status, ['delivered', 'cancelled'])): ?>
                    <button class="action-btn action-btn-danger" onclick="updateOrderStatus('cancelled')">
                        <i class="fas fa-times"></i>Cancel Order
                    </button>
                    <?php endif; ?>
                    
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="action-btn action-btn-secondary">
                        <i class="fas fa-arrow-left"></i>Back to Orders
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="status-modal">
    <div class="status-modal-content">
        <h3>Update Order Status</h3>
        <form id="statusForm" class="status-form">
            <div class="form-group">
                <label for="orderStatus">Select New Status:</label>
                <select id="orderStatus" name="status" class="form-control" required>
                    <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="confirmed" <?php echo e($order->status == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                    <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                    <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                    <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                    <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="statusNote">Status Update Note (Optional):</label>
                <textarea id="statusNote" name="note" class="form-control" rows="3" placeholder="Add a note about this status update..."></textarea>
            </div>
            <div class="status-form-buttons">
                <button type="button" class="btn-modal cancel" onclick="closeStatusModal()">Cancel</button>
                <button type="submit" class="btn-modal save">Update Status</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.order-show-header');
    const detailHeader = document.querySelector('.order-details-header');
    const contentCards = document.querySelectorAll('.content-card');
    
    if (header) header.classList.add('animate-fade-up');
    
    setTimeout(() => {
        if (detailHeader) detailHeader.classList.add('animate-fade-up');
    }, 150);
    
    contentCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-fade-up');
        }, (index * 150) + 300);
    });
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.action-btn, .btn-update-status, .btn-action-top, .customer-avatar, .item-image');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            if (!this.classList.contains('item-image') && !this.classList.contains('customer-avatar')) {
                this.style.transform = 'translateY(-2px)';
            }
        });
        
        element.addEventListener('mouseleave', function() {
            if (!this.classList.contains('item-image') && !this.classList.contains('customer-avatar')) {
                this.style.transform = 'translateY(0)';
            }
        });
    });
});

// Status Modal Functions
function openStatusModal() {
    document.getElementById('statusModal').style.display = 'block';
}

function closeStatusModal() {
    document.getElementById('statusModal').style.display = 'none';
}

// Quick action to update status
function updateOrderStatus(status) {
    if (confirm(`Are you sure you want to update the order status to "${status}"?`)) {
        document.getElementById('orderStatus').value = status;
        updateStatus();
    }
}

// Update status function
function updateStatus() {
    const status = document.getElementById('orderStatus').value;
    const note = document.getElementById('statusNote').value;
    
    // Show loading state
    const submitBtn = document.querySelector('.btn-modal.save');
    const originalContent = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
    submitBtn.disabled = true;
    
    fetch(`/admin/orders/<?php echo e($order->id); ?>/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ 
            status: status,
            note: note 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            showToast('Order status updated successfully!', 'success');
            // Close modal
            closeStatusModal();
            // Reload the page to show updated status
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            showToast('Error updating order status: ' + (data.message || 'Unknown error'), 'error');
            // Restore button state
            submitBtn.innerHTML = originalContent;
            submitBtn.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error updating order status', 'error');
        // Restore button state
        submitBtn.innerHTML = originalContent;
        submitBtn.disabled = false;
    });
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

// Handle status form submission
document.getElementById('statusForm').addEventListener('submit', function(e) {
    e.preventDefault();
    updateStatus();
});

// Close modal when clicking outside
document.getElementById('statusModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStatusModal();
    }
});

// Print function
function printOrder() {
    window.print();
}

// Download PDF function
function downloadPDF() {
    alert('PDF download functionality would be implemented here');
}

// Email customer function
function emailCustomer() {
    alert('Email customer functionality would be implemented here');
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>