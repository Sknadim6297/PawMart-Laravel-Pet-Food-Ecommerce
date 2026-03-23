<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* Make category circles light orange */
.food-categorie {
    border-color: #ff8c5a !important;
}

.food-categorie:before {
    background-color: #ff8c5a !important;
}

.food-categorie:hover {
    border-color: #ff7a3d !important;
}

.food-categorie:hover:before {
    background-color: #ff7a3d !important;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $websiteSettings = \App\Models\WebsiteSetting::getSettings();
    $contactSettings = \App\Models\ContactSetting::getSettings();
?>
<?php if(isset($heroSections) && $heroSections->count() > 0): ?>
<section class="hero-section" style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/background.png')); ?>)">
    <div class="container">
        <div class="row hero-one-slider owl-carousel owl-theme">
            <?php $__currentLoopData = $heroSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h1><?php echo e($hero->title); ?></h1>
                            <h3><?php echo e($hero->subtitle); ?></h3>
                            <?php if($hero->button_text && $hero->button_link): ?>
                                <a href="<?php echo e($hero->button_link); ?>" class="button"><?php echo e($hero->button_text); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('contact')); ?>" class="button">Get Appointment</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <?php if($hero->image): ?>
                                <img src="<?php echo e(asset('storage/' . $hero->image)); ?>" alt="<?php echo e($hero->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/img/hero-img-1.png')); ?>" alt="<?php echo e($hero->title); ?>">
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
    <img src="<?php echo e(asset('assets/img/dabal-foot-1.png')); ?>" alt="hero-shaps" class="img-3">
<?php endif; ?> 
<section class="gap section-healthy-product" style="background-image: url(<?php echo e(asset('assets/img/healthy-product.png')); ?>); background-color: #f5f5f5;">
    <div class="container">
        <div class="heading">
            <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" alt="heading-img">
            <h6>Find Healthy Product</h6>
            <h2>Healthy Products</h2>
        </div>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $healthyProducts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-3 col-md-4 col-sm-6 <?php echo e($loop->index >= 4 ? 'mb-lg-0' : ''); ?>">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                                <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/food-' . (($loop->index % 6) + 1) . '.png')); ?>" alt="<?php echo e($product->name); ?>">
                                <?php endif; ?>
                        <ul class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <li><i class="fa-solid fa-star <?php echo e($i <= ($product->rating ?? 5) ? '' : 'text-muted'); ?>"></i></li>
                            <?php endfor; ?>
                        </ul>
                        <div class="add-to-cart">
                          <a href="#" class="add-to-cart-btn" data-product-id="<?php echo e($product->id); ?>">Add to Cart</a>
                            <a href="#" class="wishlist-toggle-btn" data-product-id="<?php echo e($product->id); ?>">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        </div>
                        <?php if($product->is_on_sale && $product->discount_percentage): ?>
                            <h4>-<?php echo e($product->discount_percentage); ?>%</h4>
                        <?php endif; ?>
                        <?php if($product->stock_quantity <= 0): ?>
                            <div class="out-of-stock">Out of Stock</div>
                        <?php endif; ?>
                        </div>
                    <span><?php echo e($product->category->name ?? 'Uncategorized'); ?></span>
                    <a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                    <h6>
                        <?php if($product->sale_price): ?>
                            <del>₹<?php echo e(number_format($product->price, 2)); ?></del> ₹<?php echo e(number_format($product->sale_price, 2)); ?>

                        <?php else: ?>
                            ₹<?php echo e(number_format($product->price, 2)); ?>

                        <?php endif; ?>
                    </h6>
                </div>
            </div>
            <?php if($loop->index == 4): ?>
            <div class="col-lg-9">
                <div class="deal-of-the-week">
                    <?php if(isset($dealOfWeek) && $dealOfWeek): ?>
                    <div class="healthy-product-img">
                        <h6>Deal of the Week</h6>
                        <?php if($dealOfWeek->image): ?>
                            <img src="<?php echo e(asset('storage/' . $dealOfWeek->image)); ?>" alt="<?php echo e($dealOfWeek->name); ?>">
                                <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/food-6.png')); ?>" alt="<?php echo e($dealOfWeek->name); ?>">
                                <?php endif; ?>
                        <ul class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <li><i class="fa-solid fa-star <?php echo e($i <= ($dealOfWeek->rating ?? 5) ? '' : 'text-muted'); ?>"></i></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="healthy-product">
                        <span><?php echo e($dealOfWeek->category->name ?? 'Uncategorized'); ?></span>
                        <a href="<?php echo e(route('product.show', $dealOfWeek->slug)); ?>"><?php echo e($dealOfWeek->name); ?></a>
                        <h6>
                            <?php if($dealOfWeek->sale_price): ?>
                                <del>₹<?php echo e(number_format($dealOfWeek->price, 2)); ?></del> ₹<?php echo e(number_format($dealOfWeek->sale_price, 2)); ?>

                            <?php else: ?>
                                ₹<?php echo e(number_format($dealOfWeek->price, 2)); ?>

                            <?php endif; ?>
                        </h6>
                        <?php if($dealOfWeek->discount_percentage): ?>
                            <h5>up to <?php echo e($dealOfWeek->discount_percentage); ?>% off</h5>
                        <?php endif; ?>
                        <div class="add-to-cart">
                          <a href="#" class="button add-to-cart-btn" data-product-id="<?php echo e($dealOfWeek->id); ?>">Add to Cart</a>
                            <a href="#" class="wishlist-toggle-btn" data-product-id="<?php echo e($dealOfWeek->id); ?>">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        </div>
                        <div id="countdown">
                            <ul>
                              <li><span id="days"></span>days</li>
                              <li><span id="hours"></span>Hour</li>
                              <li><span id="minutes"></span>Min</li>
                              <li class="mb-0"><span id="seconds"></span>Sec</li>
                            </ul>
                           </div>
                    </div>
                    <?php else: ?>
                    
                    <div class="healthy-product-img">
                        <h6>Deal of the Week</h6>
                        <img src="<?php echo e(asset('assets/img/food-6.png')); ?>" alt="food">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
            </ul>
        </div>
                    <div class="healthy-product">
                        <span>Animal Feed</span>
                        <a href="<?php echo e(route('products.index')); ?>">Healthy Dog Food Roaster Chicken</a>
                        <h6><del>₹32.00</del>₹22.00</h6>
                        <h5>up to 14% off</h5>
                        <div class="add-to-cart">
                            <a href="#" class="button">Add to Cart</a>
                            <a href="#" class="heart-wishlist">
                                <i class="fa-regular fa-heart"></i>
                                    </a>
                                </div>
                        <div id="countdown">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hour</li>
                                <li><span id="minutes"></span>Min</li>
                                <li class="mb-0"><span id="seconds"></span>Sec</li>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <img src="<?php echo e(asset('assets/img/food-1.png')); ?>" alt="food">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <div class="add-to-cart">
                            <a href="#">Add to Cart</a>
                            <a href="#" class="heart-wishlist">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                    </div>
                </div>
                    <span>Animal Feed</span>
                    <a href="<?php echo e(route('products.index')); ?>">Procan Adult Dog Food</a>
                    <h6>₹32.00</h6>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php if(isset($petCareServices) && $petCareServices->count() > 0): ?>
<section class="gap no-bottom">
    <div class="container">
                <div class="row">
            <?php $__currentLoopData = $petCareServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 <?php echo e($loop->last ? 'mb-0' : ''); ?>">
                <div class="we-provide">
                    <div class="we-provide-img">
                        <?php if($service->icon): ?>
                            <img src="<?php echo e(asset('storage/' . $service->icon)); ?>" alt="<?php echo e($service->name); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/we-provide-' . (($index % 3) + 1) . '.jpg')); ?>" alt="<?php echo e($service->name); ?>">
                        <?php endif; ?>
                        <svg width="326" height="326" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="<?php echo e($index % 2 == 0 ? '#fedc4f' : '#fb5e3c'); ?>"/>
                        </svg>
                        </div>
                    <a href="<?php echo e($service->link ?? '#'); ?>"><h5><?php echo e($service->name); ?></h5></a>
                    <p><?php echo e($service->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.'); ?></p>
                    </div>
                        </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
</section> 
<?php endif; ?>
<section class="gap no-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="welcome-to">
                    <?php if(isset($welcomeSections) && $welcomeSections->count() > 0): ?>
                        <?php $mainWelcome = $welcomeSections->first(); ?>
                        <?php if(!empty($mainWelcome->title)): ?>
                            <h2><?php echo e($mainWelcome->title); ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($mainWelcome->description)): ?>
                            <p><?php echo e($mainWelcome->description); ?></p>
                        <?php endif; ?>
                        <div class="row mt-lg-5">
                            <?php if(!empty($mainWelcome->service_title) || !empty($mainWelcome->service_description) || !empty($mainWelcome->service_icon)): ?>
                                <div class="col-md-6">
                                    <div class="pet-grooming mb-0">
                                        <?php if(!empty($mainWelcome->service_icon)): ?>
                                            <i><img src="<?php echo e(asset('storage/' . $mainWelcome->service_icon)); ?>" alt="icon"></i>
                                        <?php endif; ?>
                                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"/>
                                        </svg>
                                        <?php if(!empty($mainWelcome->service_link) && !empty($mainWelcome->service_title)): ?>
                                            <a href="<?php echo e($mainWelcome->service_link); ?>"><h4><?php echo e($mainWelcome->service_title); ?></h4></a>
                                        <?php elseif(!empty($mainWelcome->service_title)): ?>
                                            <h4><?php echo e($mainWelcome->service_title); ?></h4>
                                        <?php endif; ?>
                                        <?php if(!empty($mainWelcome->service_description)): ?>
                                            <p><?php echo e($mainWelcome->service_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($mainWelcome->service2_title) || !empty($mainWelcome->service2_description) || !empty($mainWelcome->service2_icon)): ?>
                                <div class="col-md-6">
                                    <div class="pet-grooming mb-0">
                                        <?php if(!empty($mainWelcome->service2_icon)): ?>
                                            <i><img src="<?php echo e(asset('storage/' . $mainWelcome->service2_icon)); ?>" alt="icon"></i>
                                        <?php endif; ?>
                                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"/>
                                        </svg>
                                        <?php if(!empty($mainWelcome->service2_link) && !empty($mainWelcome->service2_title)): ?>
                                            <a href="<?php echo e($mainWelcome->service2_link); ?>"><h4><?php echo e($mainWelcome->service2_title); ?></h4></a>
                                        <?php elseif(!empty($mainWelcome->service2_title)): ?>
                                            <h4><?php echo e($mainWelcome->service2_title); ?></h4>
                                        <?php endif; ?>
                                        <?php if(!empty($mainWelcome->service2_description)): ?>
                                            <p><?php echo e($mainWelcome->service2_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if(!empty($mainWelcome->image)): ?>
                    <div class="dog-walker two d-block">
                        <img src="<?php echo e(asset('storage/' . $mainWelcome->image)); ?>" class="w-100" alt="<?php echo e($mainWelcome->title ?? 'Welcome'); ?>">
                    </div>
                <?php else: ?>
                    <div class="dog-walker two d-block">
                        <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" class="w-100" alt="Welcome">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="gap">
    <div class="container">
        <div class="heading">
            <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" alt="heading-img">
            <h6>Find Healthy Product By Category</h6>
            <h2>Browse By Categories</h2>
        </div>
        <div class="slider-categorie owl-carousel owl-theme">
            <?php $__empty_1 = true; $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="item">
                <div class="food-categorie">
                    <?php if($category->image): ?>
                        <img src="<?php echo e(asset($category->image)); ?>" alt="<?php echo e($category->name); ?>" onerror="this.src='<?php echo e(asset('assets/img/food-categorie-' . (($index % 5) + 1) . '.png')); ?>'">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/img/food-categorie-' . (($index % 5) + 1) . '.png')); ?>" alt="<?php echo e($category->name); ?>">
                    <?php endif; ?>
                    <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-1.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Cat Supplies</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-2.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Dog Supplies</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-3.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Animal Feed</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-4.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Accessories</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-5.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Horse Care</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="section-client gap" style="background-image: url(assets/img/client-b.jpg)">
    <div class="container">
        <div class="heading two">
            <h2>What Our Client’s Say</h2>
        </div>
        <div class="client-slider owl-carousel owl-theme">
            <?php $__empty_1 = true; $__currentLoopData = $testimonials ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="item">
                <div class="client">
                    <img src="<?php echo e($testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets/img/client.png')); ?>" alt="<?php echo e($testimonial->client_name); ?>">
                    <div class="client-text">
                        <ul class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <li><i class="fa-solid fa-star <?php echo e($i <= ($testimonial->rating ?? 5) ? '' : 'text-muted'); ?>"></i></li>
                            <?php endfor; ?>
                        </ul>
                        <p><?php echo e($testimonial->message); ?></p>
                        <h4><?php echo e($testimonial->client_name); ?></h4>
                        <span><?php echo e($testimonial->designation ?? 'Client'); ?></span>
                        <i class="quote">
                            <img src="<?php echo e(asset('assets/img/quote.png')); ?>" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="item">
                <div class="client">
                    <img src="<?php echo e(asset('assets/img/client.png')); ?>" alt="client">
                    <div class="client-text">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p>Excepteur sint occaecat cupidatat nilesm aniu deserunt mollit anim Lorem set dolo liem amet dolor sit amet, consectetur adipiscing il erunti nuliems elit sed incididunt.</p>
                        <h4>Qlark Domous</h4>
                        <span>Health Advisor</span>
                        <i class="quote">
                            <img src="<?php echo e(asset('assets/img/quote.png')); ?>" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="rated">
            <ul class="star">
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <h4>Rated 4.5 Out of 5.0</h4>
        </div>
    </div>
</section> 
<!-- cart-popup -->
    <div id="lightbox" class="lightbox clearfix">
        <div class="white_content">
            <a href="javascript:;" class="textright" id="close"><i class="fa-regular fa-circle-xmark"></i></a>
                <div class="cart-popup">
                <ul>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="<?php echo e(asset('assets/img/food-1.png')); ?>" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Brown Sandwich</h3>

                          <p class="theme-clr font-semi-bold">1 x $10.50</p>

                        </div>

                        <a href="JavaScript:void(0)" id="crosss"></a>

                      </li>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="<?php echo e(asset('assets/img/food-2.png')); ?>" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Banana Leaves</h3>

                          <p class="theme-clr font-semi-bold">1 x $12.60</p>

                        </div>

                        <a href="JavaScript:void(0)" id="cross"></a>

                      </li>

                </ul>

                <div class="cart-total d-flex align-items-center justify-content-between">

                <span class="font-semi-bold">Total:</span>

                <span class="font-semi-bold">$23.10</span>

                </div>

                <div class="cart-btns d-flex align-items-center justify-content-between">

                <a class="font-bold" href="JavaScript:void">View Cart</a>

                <a class="font-bold theme-bg-clr text-white checkout" href="JavaScript:void">Checkout</a>

                </div>
        </div>
        </div>
    </div>
<!-- cart-popup end -->
<!-- search-popup -->
<div class="search-popup">
        <button class="close-search"><i class="fa-solid fa-arrow-right"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
</div>
<!-- search-popup end -->
<!-- progress -->
<div id="progress">
      <span id="progress-value"><i class="fa-solid fa-up-long"></i></span>
</div>
<!-- progress end -->

<script>
// Count animation for statistics
document.addEventListener('DOMContentLoaded', function() {
    const countElements = document.querySelectorAll('.count[data-number]');
    
    const animateCount = (element) => {
        const target = parseInt(element.getAttribute('data-number'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const updateCount = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current);
                requestAnimationFrame(updateCount);
            } else {
                element.textContent = target;
            }
        };
        
        updateCount();
    };
    
    // Use Intersection Observer to trigger animation when section is visible
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCount(entry.target);
            }
        });
    }, observerOptions);
    
    countElements.forEach(element => {
        observer.observe(element);
    });
    
    // Initialize owl-carousel for categories slider
    if (typeof jQuery !== 'undefined' && jQuery.fn.owlCarousel) {
        jQuery('.slider-categorie').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    }
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/frontend/index.blade.php ENDPATH**/ ?>