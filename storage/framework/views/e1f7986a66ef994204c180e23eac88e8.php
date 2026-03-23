

<?php $__env->startSection('title', 'Hero Sections Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Hero Sections</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.hero-sections.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Hero Section
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
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Button Text</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $heroSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heroSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($heroSection->id); ?></td>
                                    <td>
                                        <?php if($heroSection->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $heroSection->image)); ?>" 
                                                 alt="Hero Image" 
                                                 class="img-thumbnail" 
                                                 style="width: 60px; height: 40px; object-fit: cover;">
                                        <?php else: ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(Str::limit($heroSection->title, 30)); ?></td>
                                    <td><?php echo e(Str::limit($heroSection->subtitle, 40)); ?></td>
                                    <td><?php echo e($heroSection->button_text); ?></td>
                                    <td><?php echo e($heroSection->sort_order); ?></td>
                                    <td>
                                        <?php if($heroSection->is_active): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.hero-sections.show', $heroSection)); ?>" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.hero-sections.edit', $heroSection)); ?>" 
                                               class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.hero-sections.destroy', $heroSection)); ?>" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this hero section?')">
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
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-image fa-3x mb-3 d-block"></i>
                                        No hero sections found. 
                                        <a href="<?php echo e(route('admin.hero-sections.create')); ?>">Create your first hero section</a>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/admin/hero-sections/index.blade.php ENDPATH**/ ?>