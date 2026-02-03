<div>
    <h2 class="section-title">
        <i class="fas fa-exclamation-triangle"></i> Delete Account
    </h2>
    <p class="section-subtitle">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

    <button 
        type="button" 
        class="btn-danger" 
        onclick="openDeleteModal()"
    >
        <i class="fas fa-trash-alt"></i> Delete Account
    </button>

    <!-- Delete Account Modal -->
    <div id="deleteModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-triangle"></i> Delete Account
            </div>
            
            <div class="modal-body">
                Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </div>

            <form method="post" action="<?php echo e(route('profile.destroy')); ?>" id="delete-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        class="form-control" 
                        placeholder="Enter your password to confirm"
                        required
                    />
                    <?php if($errors->userDeletion->get('password')): ?>
                        <?php $__currentLoopData = $errors->userDeletion->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="error-message">
                                <i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <div class="modal-footer">
                    <button 
                        type="button" 
                        class="btn-secondary" 
                        onclick="closeDeleteModal()"
                    >
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Show modal if there are validation errors
<?php if($errors->userDeletion->isNotEmpty()): ?>
    document.addEventListener('DOMContentLoaded', function() {
        openDeleteModal();
    });
<?php endif; ?>
</script>
<?php /**PATH C:\Users\SK NADIM\Downloads\petnet_extract\resources\views/profile/partials/frontend-delete-user-form.blade.php ENDPATH**/ ?>