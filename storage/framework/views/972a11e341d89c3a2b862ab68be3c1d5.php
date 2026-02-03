

<?php $__env->startSection('title', 'Our Blog'); ?>

<?php $__env->startSection('content'); ?>
<section class="banner" style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/banner.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Our Blog</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">Our Blog</li>
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
<section class="gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if($blogs->count() > 0): ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-style our-blog">
                            <figure>
                                <?php if($blog->image_url): ?>
                                    <img src="<?php echo e($blog->image_url); ?>" alt="<?php echo e($blog->title); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/img/our-blog-1.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                                <?php endif; ?>
                            </figure>
                            <?php if($blog->category): ?>
                                <a href="<?php echo e(route('blog.category', $blog->category->slug)); ?>"><h6><?php echo e($blog->category->name); ?></h6></a>
                            <?php endif; ?>
                            <div class="blog-style-text">
                                <h5><?php echo e($blog->created_at->format('d')); ?><span><?php echo e($blog->created_at->format('M,Y')); ?></span></h5>
                                <div>
                                    <a href="<?php echo e(route('blog.show', $blog->slug)); ?>"><h3><?php echo e($blog->title); ?></h3></a>
                                    <p><?php echo e(Str::limit(strip_tags($blog->description), 200)); ?></p>
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo e(asset('assets/img/man.jpg')); ?>" alt="author">
                                        <h4><?php echo e($blog->author ?? 'Admin'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="text-center py-5">
                        <h3>No blog posts found</h3>
                        <p>Check back later for new content!</p>
                    </div>
                <?php endif; ?>

                <?php if($blogs->hasPages()): ?>
                    <ul class="pagination">
                        <?php if($blogs->onFirstPage()): ?>
                            <li class="prev disabled"><span><i class='fa-solid fa-arrow-left'></i></span></li>
                        <?php else: ?>
                            <li class="prev"><a href="<?php echo e($blogs->previousPageUrl()); ?>"><i class='fa-solid fa-arrow-left'></i></a></li>
                        <?php endif; ?>

                        <?php $__currentLoopData = $blogs->getUrlRange(1, $blogs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $blogs->currentPage()): ?>
                                <li class="active"><span><?php echo e($page); ?></span></li>
                            <?php else: ?>
                                <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($blogs->hasMorePages()): ?>
                            <li class="next"><a href="<?php echo e($blogs->nextPageUrl()); ?>"><i class='fa-solid fa-arrow-right'></i></a></li>
                        <?php else: ?>
                            <li class="next disabled"><span><i class='fa-solid fa-arrow-right'></i></span></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                    <div class="sidebar">
                        <h3>Recent Posts</h3>
                        <div class="boder-bar"></div>
                        <ul class="recent-post">
                            <?php if($recentBlogs && $recentBlogs->count() > 0): ?>
                                <?php $__currentLoopData = $recentBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e($loop->last ? 'end' : ''); ?>">
                                        <?php if($recentBlog->image_url): ?>
                                            <img alt="recent-posts-img" src="<?php echo e($recentBlog->image_url); ?>">
                                        <?php else: ?>
                                            <img alt="recent-posts-img" src="<?php echo e(asset('assets/img/recent-posts-1.jpg')); ?>">
                                        <?php endif; ?>
                                        <div>
                                            <span><?php echo e($recentBlog->created_at->format('F d, Y')); ?></span>
                                            <a href="<?php echo e(route('blog.show', $recentBlog->slug)); ?>"><?php echo e(Str::limit($recentBlog->title, 50)); ?></a>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li>
                                    <img alt="recent-posts-img" src="<?php echo e(asset('assets/img/recent-posts-1.jpg')); ?>">
                                    <div>
                                        <span>No recent posts</span>
                                        <a href="#">Check back later for new content</a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sidebar">
                        <h3>Categories</h3>
                        <div class="boder-bar"></div>
                        <ul class="categories">
                            <?php if($categories && $categories->count() > 0): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e($loop->last ? 'end' : ''); ?>">
                                        <a href="<?php echo e(route('blog.category', $category->slug)); ?>"><?php echo e($category->name); ?><span><?php echo e($category->blogs_count ?? 0); ?></span></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li class="end">
                                    <a href="#">No categories<span>0</span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sidebar">
                        <h3>Instagram</h3>
                        <div class="boder-bar"></div>
                        <ul class="instagram-posts">
                            <?php if($galleryImages && $galleryImages->count() > 0): ?>
                                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(asset('storage/' . $image->image)); ?>" data-fancybox="gallery">
                                            <figure><img alt="gallery" src="<?php echo e(asset('storage/' . $image->image)); ?>"></figure>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-1.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-1.jpg')); ?>"></figure></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-2.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-2.jpg')); ?>"></figure></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-3.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-3.jpg')); ?>"></figure></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-4.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-4.jpg')); ?>"></figure></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-5.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-5.jpg')); ?>"></figure></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(asset('assets/img/gallery-image-6.jpg')); ?>" data-fancybox="gallery"><figure><img alt="girl" src="<?php echo e(asset('assets/img/gallery-image-6.jpg')); ?>"></figure></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <h5><i class="fa-brands fa-instagram"></i>Follow @animalpride</h5>
                    </div>
                    
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/frontend/blog/index.blade.php ENDPATH**/ ?>