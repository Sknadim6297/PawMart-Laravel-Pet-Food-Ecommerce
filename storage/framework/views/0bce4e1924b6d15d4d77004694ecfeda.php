

<?php $__env->startSection('title', 'Testimonials Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Testimonials</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Testimonial
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Client Name</th>
                                    <th>Designation</th>
                                    <th>Message</th>
                                    <th>Rating</th>
                                    <th>Sort</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($testimonial->id); ?></td>
                                    <td>
                                        <?php if($testimonial->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $testimonial->image)); ?>"
                                                 alt="Client"
                                                 class="img-thumbnail"
                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                        <?php else: ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($testimonial->client_name); ?></td>
                                    <td><?php echo e($testimonial->designation ?: 'N/A'); ?></td>
                                    <td><?php echo e(\Illuminate\Support\Str::limit($testimonial->message, 55)); ?></td>
                                    <td>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="fa-solid fa-star <?php echo e($i <= $testimonial->rating ? 'text-warning' : 'text-muted'); ?>"></i>
                                        <?php endfor; ?>
                                    </td>
                                    <td><?php echo e($testimonial->sort_order); ?></td>
                                    <td>
                                        <?php if($testimonial->is_active): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.testimonials.show', $testimonial)); ?>" class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.testimonials.edit', $testimonial)); ?>" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.testimonials.destroy', $testimonial)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        <i class="fas fa-comments fa-3x mb-3 d-block"></i>
                                        No testimonials found.
                                        <a href="<?php echo e(route('admin.testimonials.create')); ?>">Create your first testimonial</a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>