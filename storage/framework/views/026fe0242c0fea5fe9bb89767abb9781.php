<div>
    <h2 class="section-title">
        <i class="fas fa-shield-alt"></i> Update Password
    </h2>
    <p class="section-subtitle">Ensure your account is using a long, random password to stay secure.</p>

    <?php if(session('status') === 'password-updated'): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Password updated successfully!
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('password.update')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        <div class="form-group">
            <label for="update_password_current_password" class="form-label">
                <i class="fas fa-lock"></i> Current Password
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="form-control" 
                autocomplete="current-password"
                placeholder="Enter your current password"
            />
            <?php if($errors->updatePassword->get('current_password')): ?>
                <?php $__currentLoopData = $errors->updatePassword->get('current_password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="update_password_password" class="form-label">
                <i class="fas fa-key"></i> New Password
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="form-control" 
                autocomplete="new-password"
                placeholder="Enter your new password (min. 8 characters)"
            />
            <?php if($errors->updatePassword->get('password')): ?>
                <?php $__currentLoopData = $errors->updatePassword->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation" class="form-label">
                <i class="fas fa-check-circle"></i> Confirm Password
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="form-control" 
                autocomplete="new-password"
                placeholder="Confirm your new password"
            />
            <?php if($errors->updatePassword->get('password_confirmation')): ?>
                <?php $__currentLoopData = $errors->updatePassword->get('password_confirmation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Password
            </button>

            <?php if(session('status') === 'password-updated'): ?>
                <span class="success-indicator">
                    <i class="fas fa-check"></i> Saved
                </span>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/profile/partials/frontend-update-password-form.blade.php ENDPATH**/ ?>