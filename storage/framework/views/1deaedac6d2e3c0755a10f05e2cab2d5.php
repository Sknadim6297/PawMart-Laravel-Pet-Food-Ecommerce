

<?php $__env->startSection('title', 'View Welcome Section'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Welcome Section Details</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.welcome-sections.edit', $welcomeSection)); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?php echo e(route('admin.welcome-sections.index')); ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Welcome Sections
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Welcome Section Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <p class="form-control-plaintext"><?php echo e($welcomeSection->title); ?></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <p class="form-control-plaintext"><?php echo e($welcomeSection->description); ?></p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Button Text</label>
                                                <p class="form-control-plaintext"><?php echo e($welcomeSection->button_text ?: 'N/A'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Button Link</label>
                                                <p class="form-control-plaintext">
                                                    <?php if($welcomeSection->button_link): ?>
                                                        <a href="<?php echo e($welcomeSection->button_link); ?>" target="_blank" class="text-decoration-none">
                                                            <?php echo e($welcomeSection->button_link); ?> <i class="fas fa-external-link-alt ms-1"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Welcome Image</label>
                                        <div>
                                            <?php if($welcomeSection->image): ?>
                                                <img src="<?php echo e(asset('storage/' . $welcomeSection->image)); ?>" 
                                                     alt="Welcome Image" 
                                                     class="img-fluid rounded" 
                                                     style="max-width: 300px; max-height: 200px; object-fit: cover;">
                                            <?php else: ?>
                                                <p class="text-muted">No image uploaded</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Settings & Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Sort Order</label>
                                        <p class="form-control-plaintext"><?php echo e($welcomeSection->sort_order); ?></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Active Status</label>
                                        <p class="form-control-plaintext">
                                            <?php if($welcomeSection->is_active): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactive</span>
                                            <?php endif; ?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Created At</label>
                                        <p class="form-control-plaintext"><?php echo e($welcomeSection->created_at->format('M d, Y H:i')); ?></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Updated At</label>
                                        <p class="form-control-plaintext"><?php echo e($welcomeSection->updated_at->format('M d, Y H:i')); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body text-center">
                                    <a href="<?php echo e(route('admin.welcome-sections.edit', $welcomeSection)); ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit Welcome Section
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/admin/welcome-sections/show.blade.php ENDPATH**/ ?>