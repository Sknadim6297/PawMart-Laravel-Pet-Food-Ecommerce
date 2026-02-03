

<?php $__env->startSection('title', 'Pet Care Services'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Pet Care Services</h3>
                    <a href="<?php echo e(route('admin.pet-care-services.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Service
                    </a>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($services->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Link</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if($service->icon): ?>
                                                <img src="<?php echo e(asset($service->icon)); ?>" alt="<?php echo e($service->name); ?>" 
                                                     style="width: 40px; height: 40px; object-fit: cover;" class="rounded">
                                            <?php else: ?>
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($service->name); ?></td>
                                        <td><?php echo e(Str::limit($service->description, 50)); ?></td>
                                        <td>
                                            <?php if($service->link): ?>
                                                <a href="<?php echo e($service->service_link); ?>" target="_blank" class="text-primary">
                                                    <?php echo e(Str::limit($service->link, 30)); ?>

                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted">No link</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($service->sort_order); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('admin.pet-care-services.toggle-status', $service)); ?>" 
                                                  method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" 
                                                        class="btn btn-sm <?php echo e($service->is_active ? 'btn-success' : 'btn-secondary'); ?>">
                                                    <?php echo e($service->is_active ? 'Active' : 'Inactive'); ?>

                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('admin.pet-care-services.show', $service)); ?>" 
                                                   class="btn btn-sm btn-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.pet-care-services.edit', $service)); ?>" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="<?php echo e(route('admin.pet-care-services.destroy', $service)); ?>" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-paw fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No pet care services found</h5>
                            <p class="text-muted">Start by adding your first pet care service.</p>
                            <a href="<?php echo e(route('admin.pet-care-services.create')); ?>" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add First Service
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\petnet_extract\resources\views/admin/pet-care-services/index.blade.php ENDPATH**/ ?>