<?php $__env->startSection('styles'); ?>
<style>
/* Wishlist toggle button styling for home page */
.wishlist-toggle-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    color: #7f8c8d;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.wishlist-toggle-btn:hover {
    background: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
    transform: scale(1.1);
    text-decoration: none;
}

.wishlist-toggle-btn.active {
    background: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
}

.wishlist-toggle-btn.active:hover {
    background: rgba(231, 76, 60, 0.2);
    color: #e74c3c;
}

.wishlist-toggle-btn i {
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.wishlist-toggle-btn:hover i {
    transform: scale(1.1);
}

/* Loading state for wishlist buttons */
.wishlist-toggle-btn.btn-loading {
    pointer-events: none;
    opacity: 0.7;
}

.wishlist-toggle-btn.btn-loading i {
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Browse Categories Section Styles */
.food-categorie {
    text-align: center;
    padding: 30px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    margin: 10px;
    border: 2px solid #f0f0f0;
}

.food-categorie:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    border-color: #fa441d;
}

.food-categorie img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #fa441d;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    padding: 5px;
    background: white;
}

.food-categorie:hover img {
    transform: scale(1.1);
    border-color: #e63612;
    box-shadow: 0 5px 15px rgba(250, 68, 29, 0.3);
}

.food-categorie a {
    color: #2c3e50;
    font-weight: 600;
    font-size: 16px;
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
}

.food-categorie:hover a {
    color: #fa441d;
}

/* Responsive adjustments for categories */
@media (max-width: 768px) {
    .food-categorie img {
        width: 60px;
        height: 60px;
    }
    
    .food-categorie a {
        font-size: 14px;
    }
    
    .food-categorie {
        padding: 20px 15px;
        margin: 5px;
    }
}

/* Pet Types Section Styles */
.pet-types-section {
    background: #f8f9fa;
    padding: 60px 0;
}

.pet-type-tabs {
    margin-bottom: 40px;
}

.pet-type-tabs .nav-tabs {
    border: none;
    justify-content: center;
    margin-bottom: 0;
}

.pet-type-tabs .nav-link {
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    padding: 12px 25px;
    border-radius: 50px;
    margin: 0 8px 8px 0;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.pet-type-tabs .nav-link .pet-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    object-fit: cover;
}

.pet-type-tabs .nav-link:hover {
    color: #fa441d;
    border-color: #fa441d;
    background: #fff5f2;
}

.pet-type-tabs .nav-link.active {
    color: white;
    background: #fa441d;
    border-color: #fa441d;
}

.pet-type-tabs .nav-link .product-count {
    font-size: 11px;
    margin-left: 3px;
    opacity: 0.8;
}

.subcategory-grid {
    margin-top: 30px;
}

.subcategory-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    margin-bottom: 20px;
    overflow: hidden;
    border: 1px solid #f0f0f0;
    height: 280px;
}

.subcategory-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    border-color: #fa441d;
}

.subcategory-image {
    height: 140px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.subcategory-card.featured .subcategory-image {
    height: 160px;
}

.subcategory-image img {
    /* width: 100%; */
    /* height: 100%; */
    object-fit: cover;
    transition: transform 0.3s ease;
}

.subcategory-card:hover .subcategory-image img {
    transform: scale(1.05);
}

.subcategory-image .placeholder {
    color: #6c757d;
    font-size: 14px;
    text-align: center;
}

.subcategory-content {
    padding: 15px;
    height: calc(100% - 140px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.subcategory-card.featured .subcategory-content {
    height: calc(100% - 160px);
}

.subcategory-count {
    display: inline-block;
    background: #fa441d;
    color: white;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 8px;
    width: fit-content;
}

.subcategory-content h3 {
    font-size: 16px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.3;
}

.subcategory-content h3 a {
    color: #2c3e50;
    text-decoration: none;
    transition: color 0.3s ease;
}

.subcategory-content h3 a:hover {
    color: #fa441d;
}

.subcategory-content p {
    color: #6c757d;
    font-size: 12px;
    line-height: 1.4;
    margin-bottom: 12px;
    flex-grow: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.subcategory-button {
    display: inline-block;
    background: #fa441d;
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    transition: all 0.3s ease;
    text-align: center;
    width: fit-content;
}

.subcategory-button:hover {
    background: #e63612;
    color: white;
    transform: translateY(-1px);
    text-decoration: none;
}

.popular-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ffd700;
    color: #333;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border-radius: 15px;
    margin: 20px 0;
}

.empty-state i {
    color: #fa441d;
    margin-bottom: 20px;
}

.empty-state h4 {
    color: #2c3e50;
    margin-bottom: 15px;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 25px;
}

.empty-state .btn-primary {
    background: #fa441d;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.empty-state .btn-primary:hover {
    background: #e63612;
    transform: translateY(-2px);
}

.tab-content {
    min-height: 300px;
}

/* Responsive Design */
@media (max-width: 992px) {
    .pet-type-tabs .nav-link {
        padding: 10px 18px;
        font-size: 13px;
        margin: 0 5px 8px 0;
    }
    
    .subcategory-card {
        height: 260px;
        margin-bottom: 15px;
    }
    
    .subcategory-image {
        height: 120px;
    }
    
    .subcategory-content {
        padding: 12px;
        height: calc(100% - 120px);
    }
    
    .subcategory-content h3 {
        font-size: 15px;
    }
}

@media (max-width: 768px) {
    .pet-type-tabs .nav-tabs {
        flex-direction: column;
        padding: 5px;
    }
    
    .pet-type-tabs .nav-link {
        margin: 5px 0;
        justify-content: center;
        padding: 10px 15px;
    }
    
    .subcategory-card {
        height: 240px;
    }
    
    .subcategory-image {
        height: 100px;
    }
    
    .subcategory-content {
        height: calc(100% - 100px);
        padding: 10px;
    }
    
    .subcategory-content h3 {
        font-size: 14px;
    }
    
    .subcategory-content p {
        font-size: 11px;
    }
    
    .subcategory-button {
        padding: 6px 12px;
        font-size: 11px;
    }
}

/* Statistics Section Styles */
.statistic-icon {
    width: 60px !important;
    height: 60px !important;
    object-fit: contain !important;
    margin-bottom: 15px !important;
}

.count-text {
    text-align: center;
    padding: 20px;
}

.count-text img {
    display: block;
    margin: 0 auto 15px auto;
}

/* Ensure proper grid alignment for statistics */
@media (max-width: 992px) {
    .statistic-icon {
        width: 50px !important;
        height: 50px !important;
    }
}

@media (max-width: 768px) {
    .statistic-icon {
        width: 45px !important;
        height: 45px !important;
    }
    
    .count-text {
        padding: 15px;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-section" style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/background.png')); ?>)">
    <div class="container">
        <div class="row hero-one-slider owl-carousel owl-theme">
            <?php $__empty_1 = true; $__currentLoopData = $heroSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heroSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h3><?php echo e($heroSection->subtitle); ?></h3>
                            <h1><?php echo e($heroSection->title); ?></h1>
                            <a href="<?php echo e($heroSection->button_link); ?>" class="button" style="margin-top: 30px;"><?php echo e($heroSection->button_text); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <?php if($heroSection->image): ?>
                                <img src="<?php echo e(asset('storage/' . $heroSection->image)); ?>" alt="<?php echo e($heroSection->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/img/hero-img-1.png')); ?>" alt="<?php echo e($heroSection->title); ?>">
                            <?php endif; ?>
                            <img src="<?php echo e(asset('assets/img/hero-shaps.png')); ?>" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h3>We are your local dog home boarding</h3>
                               <h1>Take a Good Care of Pets</h1>
                            <a href="<?php echo e(route('products.index')); ?>" class="button" style="margin-top: 30px;">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <img src="<?php echo e(asset('assets/img/hero-img-1.png')); ?>" alt="img">
                            <img src="<?php echo e(asset('assets/img/hero-shaps.png')); ?>" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                             <h3>We are your local dog home boarding service</h3>
                            <h1>Healthy Pets, Happy People</h1>
                            <a href="<?php echo e(route('products.index')); ?>" class="button" style="margin-top: 30px;">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <img src="<?php echo e(asset('assets/img/slide-3.png')); ?>" alt="img">
                            <img src="<?php echo e(asset('assets/img/hero-shaps.png')); ?>" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <img src="<?php echo e(asset('assets/img/hero-shaps-1.png')); ?>" alt="hero-shaps" class="img-2">
    <img src="<?php echo e(asset('assets/img/dabal-foot-1.png')); ?>" alt="hero-shaps" class="img-3">
    <img src="<?php echo e(asset('assets/img/hero-shaps-1.png')); ?>" alt="hero-shaps" class="img-4">
</section> 

<section class="gap no-bottom">
    <div class="container">
        <?php $__empty_1 = true; $__currentLoopData = $welcomeSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $welcomeSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="welcome-to">
                    <h2><?php echo e($welcomeSection->title); ?></h2>
                    <p><?php echo e($welcomeSection->description); ?></p>
                   <a href="<?php echo e($welcomeSection->button_link); ?>" class="button" style="margin-top: 30px;"><?php echo e($welcomeSection->button_text); ?></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dog-walker two d-block">
                    <?php if($welcomeSection->image): ?>
                        <img src="<?php echo e(asset('storage/' . $welcomeSection->image)); ?>" class="w-100" alt="<?php echo e($welcomeSection->title); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/img/puppies.png')); ?>" class="puppies" alt="puppies">
                        <img src="<?php echo e(asset('assets/img/dog-walker-1.png')); ?>" class="w-100" alt="dog walker">
                    <?php endif; ?>
                    <img src="<?php echo e(asset('assets/img/line.png')); ?>" class="line" alt="line">
                    <img src="<?php echo e(asset('assets/img/dabal-foot.png')); ?>" class="dabal-foot" alt="dabal-foot">
                    <img src="<?php echo e(asset('assets/img/haddi.png')); ?>" class="haddi" alt="haddi">
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="welcome-to">
                    <h2>Welcome to The Pet Care Company</h2>
                    <p>Lorem ipsum dolor sit amet,consectetur adipiscing elit do eiusmod tempor incididunt ut</p>
                   <a href="<?php echo e(route('about')); ?>" class="button" style="margin-top: 30px;">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dog-walker two d-block">
                    <img src="<?php echo e(asset('assets/img/puppies.png')); ?>" class="puppies" alt="puppies">
                    <img src="<?php echo e(asset('assets/img/dog-walker-1.png')); ?>" class="w-100" alt="dog walker">
                    <img src="<?php echo e(asset('assets/img/line.png')); ?>" class="line" alt="line">
                    <img src="<?php echo e(asset('assets/img/dabal-foot.png')); ?>" class="dabal-foot" alt="dabal-foot">
                    <img src="<?php echo e(asset('assets/img/haddi.png')); ?>" class="haddi" alt="haddi">
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section> 
<section class="gap">
    <div class="container">
        <div class="heading">
            <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" alt="heading-img">
            <h6>Find Healthy Product By Category</h6>
            <h2>Browse By Categories</h2>
        </div>
        <div class="row slider-categorie owl-carousel owl-theme">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <?php if($category->image): ?>
                        <img src="<?php echo e(asset($category->image)); ?>" alt="<?php echo e($category->name); ?>" onerror="this.src='<?php echo e(asset('assets/img/food-categorie-' . (($loop->index % 5) + 1) . '.png')); ?>'">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/img/food-categorie-' . (($loop->index % 5) + 1) . '.png')); ?>" alt="<?php echo e($category->name); ?>">
                    <?php endif; ?>
                    <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Fallback static categories if no dynamic data -->
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-1.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Cat Supplies</a>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-2.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Dog Supplies</a>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-3.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Animal Feed</a>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-4.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Accessories</a>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="<?php echo e(asset('assets/img/food-categorie-5.png')); ?>" alt="food-categorie">
                    <a href="<?php echo e(route('products.index')); ?>">Horse Care</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="gap section-healthy-product" style="background-image: url(<?php echo e(asset('assets/img/healthy-product.png')); ?>); background-color: #f5f5f5;">
    <div class="container">
        <div class="heading">
            <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" alt="heading-img">
            <h6>Find Healthy Product</h6>
            <h2>Healthy Products</h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $healthyProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : asset('assets/img/food-1.png')); ?>" alt="<?php echo e($product->name); ?>">
                        <ul class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $product->rating): ?>
                                    <li><i class="fa-solid fa-star"></i></li>
                                <?php else: ?>
                                    <li><i class="fa-regular fa-star"></i></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <div class="add-to-cart">
                          <a href="#" class="add-to-cart-btn" data-product-id="<?php echo e($product->id); ?>">Add to Cart</a>
                          <a href="#" class="wishlist-toggle-btn" data-product-id="<?php echo e($product->id); ?>" title="Add to wishlist">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        </div>
                        <?php if($product->sale_price): ?>
                            <h4>-<?php echo e(round((($product->price - $product->sale_price) / $product->price) * 100)); ?>%</h4>
                        <?php endif; ?>
                    </div>
                    <span>
                        <?php if($product->category && $product->subcategory): ?>
                            <?php echo e($product->category->name); ?> > <?php echo e($product->subcategory->name); ?>

                        <?php elseif($product->category): ?>
                            <?php echo e($product->category->name); ?>

                        <?php else: ?>
                            Animal Feed
                        <?php endif; ?>
                    </span>
                    <?php if($product->brand): ?>
                        <div class="product-brand">
                            <i class="fas fa-tag"></i> <?php echo e($product->brand->name); ?>

                        </div>
                    <?php endif; ?>
                    <a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                    <h6>
                        <?php if($product->sale_price): ?>
                            <del>₹<?php echo e(number_format($product->price, 2)); ?></del>₹<?php echo e(number_format($product->sale_price, 2)); ?>

                        <?php else: ?>
                            ₹<?php echo e(number_format($product->price, 2)); ?>

                        <?php endif; ?>
                    </h6>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-9">
                <?php if($dealOfWeek): ?>
                <div class="deal-of-the-week">
                    <div class="healthy-product-img">
                        <h6 style="background-color: chocolate;">Deal of the Week</h6>
                        <img src="<?php echo e($dealOfWeek->image ? asset('storage/' . $dealOfWeek->image) : asset('assets/img/food-6.png')); ?>" alt="<?php echo e($dealOfWeek->name); ?>">
                        <ul class="star">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $dealOfWeek->rating): ?>
                                    <li><i class="fa-solid fa-star"></i></li>
                                <?php else: ?>
                                    <li><i class="fa-regular fa-star"></i></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="healthy-product">
                        <span>
                            <?php if($dealOfWeek->category && $dealOfWeek->subcategory): ?>
                                <?php echo e($dealOfWeek->category->name); ?> > <?php echo e($dealOfWeek->subcategory->name); ?>

                            <?php elseif($dealOfWeek->category): ?>
                                <?php echo e($dealOfWeek->category->name); ?>

                            <?php else: ?>
                                Animal Feed
                            <?php endif; ?>
                        </span>
                        <a href="<?php echo e(route('product.show', $dealOfWeek->slug)); ?>"><?php echo e($dealOfWeek->name); ?></a>
                        <h6>
                            <?php if($dealOfWeek->sale_price): ?>
                                <del>₹<?php echo e(number_format($dealOfWeek->price, 2)); ?></del>₹<?php echo e(number_format($dealOfWeek->sale_price, 2)); ?>

                            <?php else: ?>
                                ₹<?php echo e(number_format($dealOfWeek->price, 2)); ?>

                            <?php endif; ?>
                        </h6>
                        <?php if($dealOfWeek->sale_price): ?>
                            <h5>up to <?php echo e(round((($dealOfWeek->price - $dealOfWeek->sale_price) / $dealOfWeek->price) * 100)); ?>% off</h5>
                        <?php endif; ?>
                        <div class="add-to-cart">
                          <a href="#" class="button add-to-cart-btn" data-product-id="<?php echo e($dealOfWeek->id); ?>">Add to Cart</a>
                          <a href="#" class="wishlist-toggle-btn" data-product-id="<?php echo e($dealOfWeek->id); ?>" title="Add to wishlist">
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
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="<?php echo e(route('products.index')); ?>" class="button">View More Products</a>
            </div>
        </div>
    </div>
</section> 
<!-- Pet Types & Subcategories Section -->
<section class="gap pet-types-section">
    <div class="container">
        <div class="heading">
            <img src="<?php echo e(asset('assets/img/heading-img.png')); ?>" alt="heading-img">
            <h6>Shop By Pet Type</h6>
            <h2>Explore Subcategories by Pet Type</h2>
        </div>
        
        <?php if($petTypes->count() > 0): ?>
        <!-- Pet Type Tabs Navigation -->
        <div class="pet-type-tabs">
            <ul class="nav nav-tabs justify-content-center mb-5" id="petTypeTab" role="tablist">
                <?php $__currentLoopData = $petTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" id="<?php echo e(strtolower(str_replace(' ', '-', $petType->name))); ?>-tab" 
                            data-bs-toggle="tab" data-bs-target="#<?php echo e(strtolower(str_replace(' ', '-', $petType->name))); ?>" 
                            type="button" role="tab" aria-controls="<?php echo e(strtolower(str_replace(' ', '-', $petType->name))); ?>" 
                            aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                        <?php if($petType->image): ?>
                            <img src="<?php echo e(asset($petType->image)); ?>" alt="<?php echo e($petType->name); ?>" class="pet-icon">
                        <?php endif; ?>
                        <?php echo e($petType->name); ?>

                        <span class="product-count">(<?php echo e($petType->products_count); ?> products)</span>
                    </button>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Pet Type Tab Content -->
        <div class="tab-content" id="petTypeTabContent">
            <?php $__currentLoopData = $petTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="<?php echo e(strtolower(str_replace(' ', '-', $petType->name))); ?>" 
                 role="tabpanel" aria-labelledby="<?php echo e(strtolower(str_replace(' ', '-', $petType->name))); ?>-tab">
                <div class="subcategory-grid">
                    <?php if($petType->children->count() > 0): ?>
                    <div class="row">
                        <?php $__currentLoopData = $petType->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="subcategory-card">
                                <div class="subcategory-image">
                                    <?php if($subcategory->image): ?>
                                        <img src="<?php echo e(asset($subcategory->image)); ?>" alt="<?php echo e($subcategory->name); ?>">
                                    <?php else: ?>
                                        <div class="placeholder">
                                            <i class="fas fa-image fa-2x mb-2 d-block"></i>
                                            <?php echo e($subcategory->name); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="subcategory-content">
                                    <?php if($subcategory->products_count > 0): ?>
                                        <span class="subcategory-count">
                                            <i class="fas fa-box"></i> <?php echo e($subcategory->products_count); ?> Products
                                        </span>
                                    <?php endif; ?>
                                    <h3>
                                        <a href="<?php echo e(route('products.index', ['category' => $petType->slug, 'subcategory' => $subcategory->slug])); ?>">
                                            <?php echo e($subcategory->name); ?>

                                        </a>
                                    </h3>
                                    <?php if($subcategory->description): ?>
                                        <p><?php echo e(strlen($subcategory->description) > 80 ? substr($subcategory->description, 0, 80) . '...' : $subcategory->description); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('products.index', ['category' => $petType->slug, 'subcategory' => $subcategory->slug])); ?>" 
                                       class="subcategory-button">
                                        Shop Now <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-paw fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No subcategories available</h4>
                            <p class="text-muted">Subcategories for <?php echo e($petType->name); ?> will be added soon.</p>
                            <a href="<?php echo e(route('products.index', ['category' => $petType->slug])); ?>" class="btn btn-primary">
                                View All <?php echo e($petType->name); ?> Products
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <!-- Fallback if no pet types available -->
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-heart fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Pet categories coming soon</h4>
                <p class="text-muted">We're setting up our pet product categories. Check back soon!</p>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">View All Products</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<section style="background-image: url(assets/img/healthy-product.png); background-color: #f5f5f5;" class="gap care-services">
    <div class="container">
        <div class="heading">
            <img src="assets/img/heading-img.png" alt="heading-img">
            <h6>Call To Action</h6>
            <h2>We Love Pet Care</h2>
        </div>
        <div class="row">
            <?php if(isset($petCareServices) && $petCareServices->count() > 0): ?>
                <?php $__currentLoopData = $petCareServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 p-lg-0 col-md-6 col-sm-6">
                    <div class="pet-grooming">
                        <i>
                            <?php if($service->icon): ?>
                                <img src="<?php echo e(asset($service->icon)); ?>" alt="<?php echo e($service->name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/img/welcome-to-3.png')); ?>" alt="<?php echo e($service->name); ?>">
                            <?php endif; ?>
                        </i>
                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"></path>
                        </svg>
                        <a href="<?php echo e($service->service_link); ?>">
                            <h4><?php echo e($service->name); ?></h4>
                        </a>
                        <p><?php echo e($service->description); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                
                <div class="col-lg-3 p-lg-0 col-md-6 col-sm-6">
                    <div class="pet-grooming">
                        <i><img src="<?php echo e(asset('assets/img/welcome-to-3.png')); ?>" alt="icon"></i>
                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"></path>
                        </svg>
                        <a href="#"><h4>Online Order</h4></a>
                        <p>Order premium pet food and supplies online with fast delivery to your doorstep.</p>
                    </div>
                </div>
                <div class="col-lg-3 p-lg-0 col-md-6 col-sm-6">
                    <div class="pet-grooming">
                        <i><img src="<?php echo e(asset('assets/img/welcome-to-1.png')); ?>" alt="icon"></i>
                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"></path>
                        </svg>
                        <a href="#"><h4>Pet Grooming</h4></a>
                        <p>Professional grooming services to keep your pets clean, healthy, and looking their best.</p>
                    </div>
                </div>
                <div class="col-lg-3 p-lg-0 col-md-6 col-sm-6">
                    <div class="pet-grooming">
                        <i><img src="<?php echo e(asset('assets/img/welcome-to-4.png')); ?>" alt="icon"></i>
                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"></path>
                        </svg>
                        <a href="#"><h4>Pet Boarding</h4></a>
                        <p>Safe and comfortable boarding facilities for your pets when you're away.</p>
                    </div>
                </div>
                <div class="col-lg-3 p-lg-0 col-md-6 col-sm-6">
                    <div class="pet-grooming">
                        <i><img src="<?php echo e(asset('assets/img/welcome-to-2.png')); ?>" alt="icon"></i>
                        <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"></path>
                        </svg>
                        <a href="#"><h4>Dog Walking</h4></a>
                        <p>Professional dog walking services to keep your furry friends active and healthy.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="gap">
    <div class="container">
        <div class="row justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="count-text <?php echo e($loop->iteration > $statistics->count() - 2 && $statistics->count() % 2 == 0 ? 'mb-sm-0' : ''); ?> <?php echo e($loop->last ? 'mb-0' : ''); ?>">
                    <?php if($statistic->icon): ?>
                        <img alt="img" src="<?php echo e(asset('storage/' . $statistic->icon)); ?>" class="statistic-icon">
                    <?php else: ?>
                        <img alt="img" src="<?php echo e(asset('assets/img/fun-facts-' . (($loop->index % 4) + 1) . '.png')); ?>" class="statistic-icon">
                    <?php endif; ?>
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="<?php echo e($statistic->number); ?>"></h2>
                        <span><?php echo e($statistic->suffix); ?></span>
                   </div>
                   <h3 class="text"><?php echo e($statistic->title); ?></h3>
                   </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="count-text">
                    <img alt="img" src="<?php echo e(asset('assets/img/fun-facts-1.png')); ?>" class="statistic-icon">
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="100" ></h2>
                        <span>+</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="count-text">
                    <img alt="img" src="<?php echo e(asset('assets/img/fun-facts-2.png')); ?>" class="statistic-icon">
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="99" ></h2>
                        <span>%</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="count-text">
                    <img alt="img" src="<?php echo e(asset('assets/img/fun-facts-3.png')); ?>" class="statistic-icon">
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="2" ></h2>
                        <span>k</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="count-text">
                    <img alt="img" src="<?php echo e(asset('assets/img/fun-facts-4.png')); ?>" class="statistic-icon">
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="400" ></h2>
                        <span>+</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function() {
    // Simple tab switching functionality
    $('.pet-type-tabs .nav-link').click(function(e) {
        e.preventDefault();
        
        // Remove active from all tabs and panes
        $('.pet-type-tabs .nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');
        
        // Add active to clicked tab
        $(this).addClass('active');
        
        // Get target pane and show it
        var target = $(this).attr('data-bs-target');
        $(target).addClass('show active');
    });
    
    // Card hover effects
    $('.subcategory-card').hover(
        function() {
            $(this).addClass('hover-effect');
        },
        function() {
            $(this).removeClass('hover-effect');
        }
    );
});
</script>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('frontend.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\petnet_extract\resources\views/frontend/index.blade.php ENDPATH**/ ?>