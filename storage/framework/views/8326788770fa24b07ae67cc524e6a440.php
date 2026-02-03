<div>
    <h2 class="section-title">
        <i class="fas fa-user-edit"></i> Profile Information
    </h2>
    <p class="section-subtitle">Update your account's profile information and email address.</p>

    <?php if(session('status') === 'profile-updated'): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Profile updated successfully!
        </div>
    <?php endif; ?>

    <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>">
        <?php echo csrf_field(); ?>
    </form>

    <form method="post" action="<?php echo e(route('profile.update')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>

        <div class="form-group">
            <label for="name" class="form-label">
                <i class="fas fa-user"></i> Full Name
            </label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="form-control" 
                value="<?php echo e(old('name', $user->name)); ?>" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Enter your full name"
            />
            <?php if($errors->get('name')): ?>
                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control" 
                value="<?php echo e(old('email', $user->email)); ?>" 
                required 
                autocomplete="username"
                placeholder="Enter your email address"
            />
            <?php if($errors->get('email')): ?>
                <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()): ?>
                <div class="verification-notice">
                    <p>
                        <i class="fas fa-exclamation-triangle"></i>
                        Your email address is unverified.
                        <button 
                            form="send-verification" 
                            class="verification-link"
                            type="submit"
                        >
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    <?php if(session('status') === 'verification-link-sent'): ?>
                        <p style="margin-top: 10px; color: #28a745; font-weight: 600;">
                            <i class="fas fa-check"></i>
                            A new verification link has been sent to your email address.
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>

            <?php if(session('status') === 'profile-updated'): ?>
                <span class="success-indicator">
                    <i class="fas fa-check"></i> Saved
                </span>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php /**PATH C:\Users\SK NADIM\Downloads\petnet_extract\resources\views/profile/partials/frontend-update-profile-information-form.blade.php ENDPATH**/ ?>