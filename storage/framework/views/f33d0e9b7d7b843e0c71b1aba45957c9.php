

<?php $__env->startSection('title', 'Photo Gallery'); ?>

<?php $__env->startSection('content'); ?>
<section class="banner" style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/banner.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Photo Gallery</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">pages</li>
                        <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#ee643c"></path>
                        </svg>
                        <img src="<?php echo e(asset('assets/img/banner-img-1.jpg')); ?>" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#ee643c"></path>
                        </svg>
                        <img src="<?php echo e(asset('assets/img/banner-img-2.jpg')); ?>" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo e(asset('assets/img/hero-shaps-1.png')); ?>" alt="hero-shaps" class="img-2">
    <img src="<?php echo e(asset('assets/img/hero-shaps-1.png')); ?>" alt="hero-shaps" class="img-4">
</section>
<div class="gap">
    <div class="container">
        <?php if($images->count() > 0): ?>
            <?php
                $imageChunks = $images->chunk(ceil($images->count() / 3));
            ?>
            <div class="row">
                <?php $__currentLoopData = $imageChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columnIndex => $columnImages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 <?php echo e($columnIndex == 2 ? 'col-md-12' : ''); ?>">
                    <?php $__currentLoopData = $columnImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="about-gallery-img <?php echo e($loop->last && $columnIndex == 0 ? '' : ($loop->last && $columnIndex == 1 && $imageChunks->count() < 3 ? 'mb-lg-0' : '')); ?>">
                        <a href="<?php echo e(asset($image->path)); ?>" data-fancybox="gallery">
                           <i class="fa-solid fa-plus"></i>
                        </a>
                        <figure>
                            <img alt="<?php echo e($image->title ?: 'Gallery Image'); ?>" 
                                 src="<?php echo e(asset($image->path)); ?>"
                                 title="<?php echo e($image->title ?: 'Gallery Image'); ?>">
                        </figure>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-5">
                        <h3>No Images Available</h3>
                        <p class="text-muted">Gallery images will be displayed here once they are uploaded.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride\resources\views/frontend/pages/gallery.blade.php ENDPATH**/ ?>