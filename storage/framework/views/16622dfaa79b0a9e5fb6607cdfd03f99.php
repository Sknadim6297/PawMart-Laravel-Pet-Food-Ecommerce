

<?php $__env->startSection('title', 'Edit Welcome Section'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Welcome Section</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.welcome-sections.index')); ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Welcome Sections
                        </a>
                    </div>
                </div>

                <form action="<?php echo e(route('admin.welcome-sections.update', $welcomeSection)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Welcome Section Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title *</label>
                                            <input type="text" 
                                                   class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="title" 
                                                   name="title" 
                                                   value="<?php echo e(old('title', $welcomeSection->title)); ?>" 
                                                   required>
                                            <?php $__errorArgs = ['title'];
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

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description *</label>
                                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                      id="description" 
                                                      name="description" 
                                                      rows="4" 
                                                      required><?php echo e(old('description', $welcomeSection->description)); ?></textarea>
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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="button_text" class="form-label">Button Text</label>
                                                    <input type="text" 
                                                           class="form-control <?php $__errorArgs = ['button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                           id="button_text" 
                                                           name="button_text" 
                                                           value="<?php echo e(old('button_text', $welcomeSection->button_text)); ?>">
                                                    <?php $__errorArgs = ['button_text'];
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
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="button_link" class="form-label">Button Link</label>
                                                    <input type="url" 
                                                           class="form-control <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                           id="button_link" 
                                                           name="button_link" 
                                                           value="<?php echo e(old('button_link', $welcomeSection->button_link)); ?>">
                                                    <?php $__errorArgs = ['button_link'];
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
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Welcome Image</label>
                                            <input type="file" 
                                                   class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="image" 
                                                   name="image" 
                                                   accept="image/*">
                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                                            <?php if($welcomeSection->image): ?>
                                                <div class="mt-2">
                                                    <small class="form-text">Current image:</small><br>
                                                    <img src="<?php echo e(asset('storage/' . $welcomeSection->image)); ?>" 
                                                         alt="Current Image" 
                                                         class="img-thumbnail" 
                                                         style="width: 200px; height: 150px; object-fit: cover;">
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <hr>
                                        <h5>Service Tile 1</h5>
                                        <div class="mb-3">
                                            <label for="service_title" class="form-label">Service Title</label>
                                            <input type="text" class="form-control" id="service_title" name="service_title" value="<?php echo e(old('service_title', $welcomeSection->service_title)); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_description" class="form-label">Service Description</label>
                                            <textarea class="form-control" id="service_description" name="service_description" rows="2"><?php echo e(old('service_description', $welcomeSection->service_description)); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_icon" class="form-label">Service Icon</label>
                                            <input type="file" class="form-control" id="service_icon" name="service_icon" accept="image/*">
                                            <?php if($welcomeSection->service_icon): ?>
                                                <div class="mt-2">
                                                    <small class="form-text">Current icon:</small><br>
                                                    <img src="<?php echo e(asset('storage/' . $welcomeSection->service_icon)); ?>" alt="Current Icon" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_link" class="form-label">Service Link</label>
                                            <input type="url" class="form-control" id="service_link" name="service_link" value="<?php echo e(old('service_link', $welcomeSection->service_link)); ?>">
                                        </div>

                                        <hr>
                                        <h5>Service Tile 2</h5>
                                        <div class="mb-3">
                                            <label for="service2_title" class="form-label">Service 2 Title</label>
                                            <input type="text" class="form-control" id="service2_title" name="service2_title" value="<?php echo e(old('service2_title', $welcomeSection->service2_title)); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="service2_description" class="form-label">Service 2 Description</label>
                                            <textarea class="form-control" id="service2_description" name="service2_description" rows="2"><?php echo e(old('service2_description', $welcomeSection->service2_description)); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="service2_icon" class="form-label">Service 2 Icon</label>
                                            <input type="file" class="form-control" id="service2_icon" name="service2_icon" accept="image/*">
                                            <?php if($welcomeSection->service2_icon): ?>
                                                <div class="mt-2">
                                                    <small class="form-text">Current icon:</small><br>
                                                    <img src="<?php echo e(asset('storage/' . $welcomeSection->service2_icon)); ?>" alt="Current Icon" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="service2_link" class="form-label">Service 2 Link</label>
                                            <input type="url" class="form-control" id="service2_link" name="service2_link" value="<?php echo e(old('service2_link', $welcomeSection->service2_link)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="sort_order" class="form-label">Sort Order</label>
                                            <input type="number" 
                                                   class="form-control <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="sort_order" 
                                                   name="sort_order" 
                                                   value="<?php echo e(old('sort_order', $welcomeSection->sort_order)); ?>" 
                                                   min="0">
                                            <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <div class="form-text">Lower numbers appear first</div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       <?php echo e(old('is_active', $welcomeSection->is_active) ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="is_active">
                                                    Active Status
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update Welcome Section
                                        </button>
                                        <a href="<?php echo e(route('admin.welcome-sections.index')); ?>" class="btn btn-secondary">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/admin/welcome-sections/edit.blade.php ENDPATH**/ ?>