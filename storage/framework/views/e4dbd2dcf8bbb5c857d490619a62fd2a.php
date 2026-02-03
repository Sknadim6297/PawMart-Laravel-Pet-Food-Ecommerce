

<?php $__env->startSection('title', 'Our Products - Animal Pride'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.active-filters {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 12px;
    border-left: 4px solid #ee643c;
    margin-bottom: 25px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.active-filters h6 {
    color: #374151;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 14px;
}

.filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
}

.filter-tag {
    background: linear-gradient(135deg, #ee643c 0%, #c20466 100%);
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 2px 4px rgba(250, 68, 29, 0.2);
    transition: all 0.2s ease;
}

.filter-tag:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(250, 68, 29, 0.3);
}

.remove-filter {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    line-height: 1;
    width: 18px;
    height: 18px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.remove-filter:hover {
    background: rgba(255, 255, 255, 0.4);
    color: white;
    text-decoration: none;
    transform: scale(1.1);
}

.clear-all-filters {
    color: #ee643c;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid #ee643c;
    padding: 8px 16px;
    border-radius: 25px;
    background: white;
    transition: all 0.2s ease;
}

.clear-all-filters:hover {
    background: #ee643c;
    color: white;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(250, 68, 29, 0.2);
}

/* Product Brand Styling */
.product-brand {
    font-size: 11px;
    color: #666;
    margin-top: 3px;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.product-brand i {
    font-size: 10px;
}

/* Subcategory Styling */
.subcategory-list {
    background: #f8f9fa;
    border-radius: 5px;
    padding: 8px;
    border-left: 3px solid #fe5716;
}

.subcategory-list li a {
    color: #555 !important;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.subcategory-list li a:hover,
.subcategory-list li a.active {
    color: #fe5716 !important;
    background: rgba(254, 87, 22, 0.1);
    border-radius: 3px;
    padding: 3px 8px;
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
    .active-filters {
        padding: 10px;
        margin-bottom: 15px !important;
    }
    
    .active-filters h6 {
        font-size: 14px;
        margin-bottom: 8px !important;
    }
    
    .filter-tag {
        font-size: 10px;
        padding: 4px 8px;
        gap: 4px;
    }
    
    .remove-filter {
        width: 14px;
        height: 14px;
        font-size: 12px;
    }
    
    .clear-all-filters {
        font-size: 10px;
        padding: 4px 8px;
    }
    
    .product-brand {
        font-size: 10px;
        margin-top: 2px;
        margin-bottom: 3px;
    }
    
    .product-brand i {
        font-size: 8px;
    }
    
    /* Adjust product card layout for mobile */
    .healthy-product {
        margin-bottom: 20px;
    }
    
    .healthy-product span {
        font-size: 12px;
        margin-bottom: 3px;
        display: block;
    }
    
    .healthy-product a {
        font-size: 14px;
        line-height: 1.3;
        margin-bottom: 5px;
        display: block;
    }
    
    .healthy-product h6 {
        font-size: 16px;
        margin-top: 5px;
    }
}

@media (max-width: 480px) {
    .filter-tags {
        gap: 4px;
    }
    
    .filter-tag {
        font-size: 9px;
        padding: 3px 6px;
    }
    
    .product-brand {
        font-size: 9px;
    }
    
    .healthy-product span {
        font-size: 11px;
    }
    
    .healthy-product a {
        font-size: 13px;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="banner" style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/banner.png')); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Our Products</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">shop</li>
                        <li class="breadcrumb-item active" aria-current="page">Our Products</li>
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

<section class="gap products-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="sidebar">
            <h3>Category</h3>
            <div class="boder-bar"></div>
            <ul class="category">
              <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <li>
                <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>" 
                   class="<?php echo e(request('category') == $category->slug ? 'active' : ''); ?>">
                   <?php echo e($category->name); ?>

                   <span><?php echo e($category->products_count); ?></span>
                </a>
                
                <?php if($category->children->count() > 0 && request('category') == $category->slug): ?>
                  <ul class="subcategory-list" style="margin-left: 20px; margin-top: 8px;">
                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="margin-bottom: 5px;">
                      <a href="<?php echo e(route('products.index', ['category' => $category->slug, 'subcategory' => $subcategory->slug])); ?>" 
                         class="<?php echo e(request('subcategory') == $subcategory->slug ? 'active' : ''); ?>"
                         style="font-size: 14px; color: #666; padding-left: 15px; position: relative;">
                         <i class="fas fa-arrow-right" style="position: absolute; left: 0; top: 50%; transform: translateY(-50%); font-size: 10px;"></i>
                         <?php echo e($subcategory->name); ?>

                         <span><?php echo e($subcategory->products_count); ?></span>
                      </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <li>
                <a href="#">No categories available<span>0</span></a>
              </li>
              <?php endif; ?>
              <?php if(request('category')): ?>
              <li>
                <a href="<?php echo e(route('products.index')); ?>" class="text-primary">
                  <i class="fas fa-arrow-left me-1"></i>All Products
                </a>
              </li>
              <?php endif; ?>
            </ul>
        </div>
        
        <div class="sidebar">
            <h3>Brand</h3>
            <div class="boder-bar"></div>
            <ul class="category">
              <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <li>
                <a href="<?php echo e(route('products.index', array_merge(request()->query(), ['brand' => $brand->slug]))); ?>" 
                   class="<?php echo e(request('brand') == $brand->slug ? 'active' : ''); ?>">
                   <?php echo e($brand->name); ?>

                   <span><?php echo e($brand->products_count); ?></span>
                </a>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <li>
                <a href="#">No brands available<span>0</span></a>
              </li>
              <?php endif; ?>
              <?php if(request('brand')): ?>
              <li>
                <a href="<?php echo e(route('products.index', request()->except('brand'))); ?>" class="text-primary">
                  <i class="fas fa-times me-1"></i>Clear Brand Filter
                </a>
              </li>
              <?php endif; ?>
            </ul>
        </div>
        
        <div class="sidebar">
            <h3>Price</h3>
            <div class="boder-bar"></div>
            <div class="modern-price-filter">
              <form method="GET" action="<?php echo e(route('products.index')); ?>">
                <?php if(request('category')): ?>
                  <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                <?php endif; ?>
                <?php if(request('subcategory')): ?>
                  <input type="hidden" name="subcategory" value="<?php echo e(request('subcategory')); ?>">
                <?php endif; ?>
                <?php if(request('brand')): ?>
                  <input type="hidden" name="brand" value="<?php echo e(request('brand')); ?>">
                <?php endif; ?>
                <?php if(request('in_stock')): ?>
                  <input type="hidden" name="in_stock" value="<?php echo e(request('in_stock')); ?>">
                <?php endif; ?>
                
                <!-- Price Range Visual -->
                <div class="price-range-visual">
                  <div class="price-bars">
                    <div class="price-bar" style="height: 25px;"></div>
                    <div class="price-bar" style="height: 12.5px;"></div>
                    <div class="price-bar" style="height: 12.5px;"></div>
                    <div class="price-bar" style="height: 12.5px;"></div>
                    <div class="price-bar" style="height: 12.5px;"></div>
                    <div class="price-bar" style="height: 12.5px;"></div>
                  </div>
                </div>
                
                <!-- Range Slider -->
                <div class="modern-range-slider">
                  <div class="range-container">
                    <div class="range-track">
                      <div class="range-fill" id="rangeFill"></div>
                    </div>
                    <input type="range" min="0" max="1000" value="<?php echo e(request('min_price', 0)); ?>" 
                           id="minRange" name="min_range" class="range-input">
                    <input type="range" min="0" max="1000" value="<?php echo e(request('max_price', 1000)); ?>" 
                           id="maxRange" name="max_range" class="range-input">
                  </div>
                  <div class="range-labels">
                    <span>₹0</span>
                    <span>₹200</span>
                    <span>₹400</span>
                    <span>₹600</span>
                    <span>₹800</span>
                    <span>₹1000</span>
                  </div>
                </div>
                
                <!-- Price Dropdowns -->
                <div class="price-dropdowns">
                  <div class="price-select-group">
                    <select class="modern-select" name="min_price" id="minPrice">
                      <option value="" <?php echo e(!request('min_price') ? 'selected' : ''); ?>>Min</option>
                      <option value="0" <?php echo e(request('min_price') == '0' ? 'selected' : ''); ?>>₹0</option>
                      <option value="100" <?php echo e(request('min_price') == '100' ? 'selected' : ''); ?>>₹100</option>
                      <option value="200" <?php echo e(request('min_price') == '200' ? 'selected' : ''); ?>>₹200</option>
                      <option value="300" <?php echo e(request('min_price') == '300' ? 'selected' : ''); ?>>₹300</option>
                      <option value="500" <?php echo e(request('min_price') == '500' ? 'selected' : ''); ?>>₹500</option>
                      <option value="750" <?php echo e(request('min_price') == '750' ? 'selected' : ''); ?>>₹750</option>
                    </select>
                  </div>
                  <span class="price-separator">to</span>
                  <div class="price-select-group">
                    <select class="modern-select" name="max_price" id="maxPrice">
                      <option value="100" <?php echo e(request('max_price') == '100' ? 'selected' : ''); ?>>₹100</option>
                      <option value="200" <?php echo e(request('max_price') == '200' ? 'selected' : ''); ?>>₹200</option>
                      <option value="300" <?php echo e(request('max_price') == '300' ? 'selected' : ''); ?>>₹300</option>
                      <option value="500" <?php echo e(request('max_price') == '500' ? 'selected' : ''); ?>>₹500</option>
                      <option value="750" <?php echo e(request('max_price') == '750' ? 'selected' : ''); ?>>₹750</option>
                      <option value="1000" <?php echo e(request('max_price') == '1000' ? 'selected' : ''); ?>>₹1000</option>
                      <option value="" <?php echo e(!request('max_price') ? 'selected' : ''); ?>>Max</option>
                    </select>
                  </div>
                </div>
                
                <button type="submit" class="modern-filter-btn">Apply Filter</button>
              </form>
            </div>
        </div>
        
        <div class="sidebar">
            <h3>Availability</h3>
            <div class="boder-bar"></div>
            <ul class="category">
              <li>
                <a href="<?php echo e(route('products.index', array_merge(request()->query(), ['in_stock' => '1']))); ?>" 
                   class="<?php echo e(request('in_stock') == '1' ? 'active' : ''); ?>">
                   In Stock Only
                   <span><?php echo e(\App\Models\Product::active()->inStock()->count()); ?></span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(route('products.index', request()->except('in_stock'))); ?>" 
                   class="<?php echo e(!request('in_stock') ? 'active' : ''); ?>">
                   All Products
                   <span><?php echo e(\App\Models\Product::active()->count()); ?></span>
                </a>
              </li>
            </ul>
        </div>
        

      </div>
      
      <div class="col-lg-9">
        <div class="items-number">
          <span>Items <?php echo e($products->firstItem() ?? 0); ?>-<?php echo e($products->lastItem() ?? 0); ?> of <?php echo e($products->total() ?? 0); ?></span>
          <div class="d-flex align-items-center sort-section">
            <label for="sort-select" class="me-2">Sort By:</label>
            <form method="GET" action="<?php echo e(route('products.index')); ?>" class="d-inline">
              <?php if(request('category')): ?>
                <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
              <?php endif; ?>
              <?php if(request('subcategory')): ?>
                <input type="hidden" name="subcategory" value="<?php echo e(request('subcategory')); ?>">
              <?php endif; ?>
              <?php if(request('brand')): ?>
                <input type="hidden" name="brand" value="<?php echo e(request('brand')); ?>">
              <?php endif; ?>
              <?php if(request('min_price')): ?>
                <input type="hidden" name="min_price" value="<?php echo e(request('min_price')); ?>">
              <?php endif; ?>
              <?php if(request('max_price')): ?>
                <input type="hidden" name="max_price" value="<?php echo e(request('max_price')); ?>">
              <?php endif; ?>
              <select name="sort" id="sort-select" class="form-select sort-dropdown" onchange="this.form.submit()">
                <option value="created_at" <?php echo e(request('sort') == 'created_at' ? 'selected' : ''); ?>>Recently Added</option>
                <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>Name A-Z</option>
                <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>Price Low to High</option>
                <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>Price High to Low</option>
                <option value="featured" <?php echo e(request('sort') == 'featured' ? 'selected' : ''); ?>>Featured</option>
              </select>
            </form>
          </div>
        </div>
        
        <!-- Active Filters Display -->
        <?php if(request('category') || request('subcategory') || request('brand') || request('min_price') || request('max_price') || request('in_stock')): ?>
        <div class="active-filters mb-4">
            <h6 class="mb-2">Active Filters:</h6>
            <div class="filter-tags d-flex flex-wrap gap-2">
                <?php if(request('category')): ?>
                    <?php 
                        $categoryName = \App\Models\Category::where('slug', request('category'))->first()->name ?? request('category');
                    ?>
                    <span class="filter-tag">
                        Category: <?php echo e($categoryName); ?>

                        <a href="<?php echo e(route('products.index', request()->except('category'))); ?>" class="remove-filter">×</a>
                    </span>
                <?php endif; ?>
                
                <?php if(request('subcategory')): ?>
                    <?php 
                        $subcategoryName = \App\Models\Category::where('slug', request('subcategory'))->first()->name ?? request('subcategory');
                    ?>
                    <span class="filter-tag">
                        Subcategory: <?php echo e($subcategoryName); ?>

                        <a href="<?php echo e(route('products.index', request()->except('subcategory'))); ?>" class="remove-filter">×</a>
                    </span>
                <?php endif; ?>
                
                <?php if(request('brand')): ?>
                    <?php 
                        $brandName = \App\Models\Brand::where('slug', request('brand'))->first()->name ?? request('brand');
                    ?>
                    <span class="filter-tag">
                        Brand: <?php echo e($brandName); ?>

                        <a href="<?php echo e(route('products.index', request()->except('brand'))); ?>" class="remove-filter">×</a>
                    </span>
                <?php endif; ?>
                
                <?php if(request('min_price') || request('max_price')): ?>
                    <span class="filter-tag">
                        Price: ₹<?php echo e(request('min_price', 0)); ?> - ₹<?php echo e(request('max_price', 1000)); ?>

                        <a href="<?php echo e(route('products.index', request()->except(['min_price', 'max_price']))); ?>" class="remove-filter">×</a>
                    </span>
                <?php endif; ?>
                
                <?php if(request('in_stock')): ?>
                    <span class="filter-tag">
                        In Stock Only
                        <a href="<?php echo e(route('products.index', request()->except('in_stock'))); ?>" class="remove-filter">×</a>
                    </span>
                <?php endif; ?>
                
                <a href="<?php echo e(route('products.index')); ?>" class="clear-all-filters">Clear All Filters</a>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row">
          <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 col-sm-6">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <?php if($product->image): ?>
                          <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                        <?php else: ?>
                          <img src="<?php echo e(asset('assets/img/food-1.png')); ?>" alt="<?php echo e($product->name); ?>">
                        <?php endif; ?>
                        
                        <ul class="star">
                          <?php for($i = 1; $i <= 5; $i++): ?>
                            <li><i class="fa-solid fa-star <?php echo e($i <= $product->rating ? '' : 'text-muted'); ?>"></i></li>
                          <?php endfor; ?>
                        </ul>
                        
                        <div class="add-to-cart">
                          <a href="#" class="add-to-cart-btn" data-product-id="<?php echo e($product->id); ?>">Add to Cart</a>
                          <a href="#" class="wishlist-toggle-btn" data-product-id="<?php echo e($product->id); ?>">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        </div>
                        
                        <?php if($product->is_on_sale): ?>
                          <h4>-<?php echo e($product->discount_percentage); ?>%</h4>
                        <?php endif; ?>
                        
                        <?php if($product->stock_quantity <= 0): ?>
                          <div class="out-of-stock">Out of Stock</div>
                        <?php endif; ?>
                    </div>
                    
                    <span><?php echo e($product->category->name ?? 'Uncategorized'); ?></span>
                    <?php if($product->brand): ?>
                        <div class="product-brand">
                            <i class="fas fa-tag"></i> <?php echo e($product->brand->name); ?>

                        </div>
                    <?php endif; ?>
                    <a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                    
                    <?php if($product->is_on_sale): ?>
                      <h6><del>₹<?php echo e(number_format($product->price, 2)); ?></del>₹<?php echo e(number_format($product->sale_price, 2)); ?></h6>
                    <?php else: ?>
                      <h6>₹<?php echo e(number_format($product->price, 2)); ?></h6>
                    <?php endif; ?>
                </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
              <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h4>No products found</h4>
                <p class="text-muted">Try adjusting your filters or browse all categories.</p>
                <a href="<?php echo e(route('products.index')); ?>" class="button">View All Products</a>
              </div>
            </div>
          <?php endif; ?>
        </div>
        
        <?php if($products->hasPages()): ?>
        <div class="pagination-wrapper mt-4">
          <?php echo e($products->appends(request()->query())->links('pagination::bootstrap-4')); ?>

        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<style>
/* Remove old range styles that conflict with new design */
.price-field {
  position: relative;
  width: 100%;
  height: auto;
  background: none;
  padding: 0;
}

.price-field input[type="range"] {
  display: none; /* Hide old range inputs */
}

.filter-price {
  width: 100%;
  border: none;
  padding: 0;
}

.price-wrap {
  display: none; /* Hide old price wrap */
}

.price-field button.button {
  display: none; /* Hide old button */
}

.wrapper {
  padding: 0;
}

/* Ensure new styles take precedence */
.modern-price-filter * {
  box-sizing: border-box;
}

/* Enhanced category active state */
.category li a.active {
  background: linear-gradient(135deg, #ee643c 0%, #c20466 100%);
  color: white !important;
  border-radius: 8px;
  padding: 8px 15px;
  font-weight: 500;
  transform: translateX(5px);
  box-shadow: 0 4px 8px rgba(250, 68, 29, 0.2);
}

.out-of-stock {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: #dc3545;
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 12px;
  font-weight: bold;
}

.healthy-product-img {
  position: relative;
}

.pagination-wrapper {
  display: flex;
  justify-content: center;
}

.pagination .page-link {
  color: var(--primary-color, #ee643c);
  border: 1px solid #dee2e6;
}

.pagination .page-item.active .page-link {
  background-color: var(--primary-color, #ee643c);
  border-color: var(--primary-color, #ee643c);
}

.sort-section {
  gap: 10px;
}

.sort-dropdown {
  min-width: 200px;
  border: 2px solid #ddd;
  border-radius: 5px;
  padding: 8px 12px;
  background-color: #fff;
  font-size: 14px;
}

.sort-dropdown:focus {
  border-color: var(--primary-color, #ee643c);
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(250, 68, 29, 0.25);
}

.items-number {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 8px;
  border: 1px solid #e9ecef;
}
.sidebar {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  margin-bottom: 20px;
}

.sidebar h3 {
  margin-bottom: 15px;
  color: #333;
  font-size: 18px;
  font-weight: 600;
}
</style>

<script>
// Modern Price Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
  const minRange = document.getElementById('minRange');
  const maxRange = document.getElementById('maxRange');
  const minSelect = document.getElementById('minPrice');
  const maxSelect = document.getElementById('maxPrice');
  const rangeFill = document.getElementById('rangeFill');

  if (minRange && maxRange && rangeFill) {
    
    // Function to update the visual range fill
    function updateRangeFill() {
      const min = parseInt(minRange.min);
      const max = parseInt(minRange.max);
      const minVal = parseInt(minRange.value);
      const maxVal = parseInt(maxRange.value);
      
      // Calculate percentages
      const minPercent = ((minVal - min) / (max - min)) * 100;
      const maxPercent = ((maxVal - min) / (max - min)) * 100;
      
      // Update the range fill
      rangeFill.style.left = minPercent + '%';
      rangeFill.style.width = (maxPercent - minPercent) + '%';
    }
    
    // Ensure minimum doesn't exceed maximum
    function validateRanges() {
      const minVal = parseInt(minRange.value);
      const maxVal = parseInt(maxRange.value);
      
      if (minVal >= maxVal) {
        minRange.value = maxVal - 50;
      }
      
      if (maxVal <= minVal) {
        maxRange.value = minVal + 50;
      }
    }
    
    // Update range from sliders
    minRange.addEventListener('input', function() {
      validateRanges();
      updateRangeFill();
      // Update select dropdown
      const closestOption = findClosestOption(minSelect, this.value);
      if (closestOption) minSelect.value = closestOption;
    });

    maxRange.addEventListener('input', function() {
      validateRanges();
      updateRangeFill();
      // Update select dropdown
      const closestOption = findClosestOption(maxSelect, this.value);
      if (closestOption) maxSelect.value = closestOption;
    });
    
    // Update range from select dropdowns
    if (minSelect) {
      minSelect.addEventListener('change', function() {
        if (this.value) {
          minRange.value = this.value;
          validateRanges();
          updateRangeFill();
        }
      });
    }
    
    if (maxSelect) {
      maxSelect.addEventListener('change', function() {
        if (this.value) {
          maxRange.value = this.value;
          validateRanges();
          updateRangeFill();
        }
      });
    }
    
    // Helper function to find closest option value
    function findClosestOption(selectElement, targetValue) {
      let closest = null;
      let minDiff = Infinity;
      
      for (let option of selectElement.options) {
        if (option.value && !isNaN(option.value)) {
          const diff = Math.abs(parseInt(option.value) - parseInt(targetValue));
          if (diff < minDiff) {
            minDiff = diff;
            closest = option.value;
          }
        }
      }
      
      return closest;
    }
    
    // Initialize on page load
    updateRangeFill();
  }
  
  // Add hover effects to price bars
  const priceBars = document.querySelectorAll('.price-bar');
  priceBars.forEach((bar, index) => {
    bar.addEventListener('mouseenter', function() {
      this.style.transform = 'scaleY(1.2)';
      this.style.opacity = '1';
    });
    
    bar.addEventListener('mouseleave', function() {
      this.style.transform = 'scaleY(1)';
      this.style.opacity = '0.8';
    });
  });
});

// Add to cart functionality (enhanced)
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('add-to-cart-btn')) {
    e.preventDefault();
    const productId = e.target.getAttribute('data-product-id');
    
    // Add loading state
    const originalText = e.target.textContent;
    e.target.textContent = 'Adding...';
    e.target.disabled = true;
    
    // Simulate API call (replace with actual AJAX call)
    setTimeout(() => {
      e.target.textContent = originalText;
      e.target.disabled = false;
      // Show success message or update cart count
    }, 1000);
  }
});
</script>

<style>
.price-field {
  position: relative;
  height: 50px;
  margin: 15px 0;
}

.price-field input[type="range"] {
  position: absolute;
  width: 100%;
  height: 4px;
  background: none;
  pointer-events: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}

.price-field input[type="range"]::-webkit-slider-thumb {
  height: 18px;
  width: 18px;
  background: #ee643c;
  border-radius: 50%;
  border: 2px solid white;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  pointer-events: auto;
  -webkit-appearance: none;
  cursor: pointer;
}

.price-field input[type="range"]::-moz-range-thumb {
  height: 18px;
  width: 18px;
  background: #ee643c;
  border-radius: 50%;
  border: 2px solid white;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  pointer-events: auto;
  cursor: pointer;
  -moz-appearance: none;
}

.range-track {
  position: absolute;
  width: 100%;
  height: 4px;
  background: #ddd;
  border-radius: 2px;
  top: 50%;
  transform: translateY(-50%);
}

.range-fill {
  position: absolute;
  height: 100%;
  background: linear-gradient(90deg, #ee643c, #c20466);
  border-radius: 2px;
  transition: all 0.1s ease;
}

.price-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.price-wrap-1, .price-wrap-2 {
  position: relative;
  flex: 1;
}

.price-wrap-1 input, .price-wrap-2 input {
  width: 100%;
  padding: 8px 25px 8px 8px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  font-size: 14px;
  background: white;
  transition: border-color 0.2s ease;
}

.price-wrap-1 input:focus, .price-wrap-2 input:focus {
  outline: none;
  border-color: #ee643c;
}

.price-wrap-1 label, .price-wrap-2 label {
  position: absolute;
  right: 8px;
  top: 50%;
  transform: translateY(-50%);
  color: #666;
  font-weight: 500;
}

.price-wrap_line {
  color: #666;
  font-weight: 500;
}

.price-title {
  font-weight: 600;
  color: #333;
  margin-bottom: 15px;
  display: block;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride\resources\views/frontend/products/index.blade.php ENDPATH**/ ?>