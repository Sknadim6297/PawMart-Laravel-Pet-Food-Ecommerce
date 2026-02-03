<header>
  <?php
    $websiteSettings = \App\Models\WebsiteSetting::getSettings();
  ?>
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-slid">
        <div>
          <div class="phone-data">
            <div class="phone">
              <i>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z
                   M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z"></path>
                </svg>
              </i><a href="mailto:<?php echo e($websiteSettings['email'] ?? 'username@domain.com'); ?>"><?php echo e($websiteSettings['email'] ?? 'username@domain.com'); ?></a>
            </div>
            <div class="phone d-flax align-items-center">
              <i>
                <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd"><path d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z"></path><path d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z"></path><path d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z"></path></g></svg>
              </i>
              <a class="me-3" href="tel:7439767977">7439767977</a>
              <a class="me-3" href="tel:9748546599">9748546599</a>
            </div>
          </div>
        </div>
        <div>
          <div class="social-links">
            <ul class="social-icon">
              <?php if(!empty($websiteSettings['facebook_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['facebook_url']); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['twitter_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['twitter_url']); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['instagram_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['instagram_url']); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['linkedin_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['linkedin_url']); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['youtube_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['youtube_url']); ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['phone'])): ?>
                <li><a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $websiteSettings['phone'])); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
              <?php endif; ?>
            </ul>
            <div class="login">
                <?php if(auth()->guard()->check()): ?>
                    <div class="dropdown" id="userDropdown">
                        <a href="#" class="dropdown-toggle" id="userDropdownToggle">
                            <i class="fa-solid fa-user"></i>
                            <?php echo e(explode(' ', Auth::user()->name)[0]); ?>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('orders.index')); ?>">
                                    <i class="fa-solid fa-box"></i>
                                    My Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                                    <i class="fa-solid fa-user-gear"></i>
                                    Profile Settings
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: contents;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <i class="fa-solid fa-user"></i>
                    <a href="<?php echo e(route('login')); ?>">Login / Register</a>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bottom-bar">
      <a href="<?php echo e(url('/')); ?>">
        <?php if(!empty($websiteSettings['logo'])): ?>
          <img src="<?php echo e(asset('storage/' . $websiteSettings['logo'])); ?>" alt="<?php echo e($websiteSettings['company_name'] ?? 'Logo'); ?>" class="main-logo">
        <?php else: ?>
          <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="logo" class="main-logo">
        <?php endif; ?>
      </a>
        <nav class="navbar">
        <ul class="navbar-links">
                    <li class="navbar-dropdown">
                      <a href="<?php echo e(route('home')); ?>"><i>
                        <img alt="home" src="<?php echo e(asset('assets/img/home.png')); ?>">
                      </i>home</a>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="<?php echo e(route('about')); ?>">About</a>
                    </li>
                    <li class="navbar-dropdown menu-item-children">
                      <a href="javascript:void(0)">pages</a>
                      <div class="dropdown">
                        <a href="<?php echo e(route('gallery')); ?>">photo gallery</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown menu-item-children">
                      <a href="javascript:void(0)">Shop</a>
                      <div class="dropdown">
                        <a href="<?php echo e(route('products.index')); ?>">our products</a>
                        <a href="<?php echo e(route('cooked-foods.index')); ?>">cooked foods</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown menu-item-children">
                      <a href="javascript:void(0)">News</a>
                      <div class="dropdown">
                        <a href="<?php echo e(route('blog')); ?>">our blog</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="<?php echo e(route('contact')); ?>">Contact</a>
                    </li>
        </ul>
      </nav>
      <div class="menu-end">
               <div class="line"></div>
               <!-- Header Icons Container -->
               <div class="header-icons">
                   <!-- Wishlist Icon -->
                   <div class="wishlist-icon">
                       <?php if(auth()->guard()->check()): ?>
                           <a href="<?php echo e(route('wishlist.index')); ?>" class="icon-link" title="Wishlist">
                               <i class="fa-solid fa-heart"></i>
                               <span class="icon-count wishlist-count"><?php echo e($wishlistCount ?? 0); ?></span>
                           </a>
                       <?php else: ?>
                           <a href="javascript:void(0)" class="icon-link wishlist-auth-required" title="Wishlist">
                               <i class="fa-solid fa-heart"></i>
                               <span class="icon-count wishlist-count">0</span>
                           </a>
                       <?php endif; ?>
                   </div>
                   <!-- Cart Icon -->
                   <div class="cart-icon">
                       <a href="JavaScript:void(0)" class="icon-link" id="show" title="Shopping Cart">
                           <i class="fa-solid fa-shopping-bag"></i>
                           <?php if(auth()->guard()->check()): ?>
                               <span class="icon-count cart-count"><?php echo e($cartCount ?? 0); ?></span>
                           <?php else: ?>
                               <span class="icon-count cart-count">0</span>
                           <?php endif; ?>
                       </a>
                   </div>
               </div>
               <div class="hamburger-icon">
                  <div class="bar-menu">
                    <i class="fa-solid fa-bars"></i>
                  </div>
            </div>
      </div>
    </div>
  </div>
  <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
      <div class="res-log">
        <a href="<?php echo e(url('/')); ?>">
          <?php if(!empty($websiteSettings['company_logo_white'])): ?>
            <img src="<?php echo e(asset('storage/' . $websiteSettings['company_logo_white'])); ?>" alt="<?php echo e($websiteSettings['company_name'] ?? 'Logo'); ?>" class="mobile-logo">
          <?php elseif(!empty($websiteSettings['logo'])): ?>
            <img src="<?php echo e(asset('storage/' . $websiteSettings['logo'])); ?>" alt="<?php echo e($websiteSettings['company_name'] ?? 'Logo'); ?>" class="mobile-logo">
          <?php else: ?>
            <img src="<?php echo e(asset('assets/img/logo-w.png')); ?>" alt="Responsive Logo" class="mobile-logo">
          <?php endif; ?>
        </a>
      </div>
        <ul>
          <li><a href="<?php echo e(route('home')); ?>"><i>
            <img alt="home" src="<?php echo e(asset('assets/img/home.png')); ?>">
          </i>Home</a></li>
          
          <li><a href="<?php echo e(route('about')); ?>">About</a></li>
          
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('gallery')); ?>">photo gallery</a></li>
              </ul>
          </li>
          
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">Shop</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('products.index')); ?>">our products</a></li>
                <li><a href="<?php echo e(route('cooked-foods.index')); ?>">cooked foods</a></li>
              </ul>
          </li>
          
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">News</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('blog')); ?>">our blog</a></li>
              </ul>
          </li>

          <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>

          </ul>

          <!-- Mobile User Authentication Section -->
          <div class="login">
              <?php if(auth()->guard()->check()): ?>
                  <div class="dropdown" id="mobileUserDropdown">
                      <a href="#" class="dropdown-toggle" id="mobileUserDropdownToggle">
                          <i class="fa-solid fa-user"></i>
                          <?php echo e(explode(' ', Auth::user()->name)[0]); ?>

                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a class="dropdown-item" href="<?php echo e(route('orders.index')); ?>">
                                  <i class="fa-solid fa-box"></i>
                                  My Orders
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                                  <i class="fa-solid fa-user-gear"></i>
                                  Profile Settings
                              </a>
                          </li>
                          <li>
                              <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: contents;">
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="dropdown-item">
                                      <i class="fa-solid fa-right-from-bracket"></i>
                                      Logout
                                  </button>
                              </form>
                          </li>
                      </ul>
                  </div>
              <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>">
                      <i class="fa-solid fa-user"></i>
                      Login / Register
                  </a>
              <?php endif; ?>
          </div>

          <ul class="social-icon">
              <?php if(!empty($websiteSettings['facebook_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['facebook_url']); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['twitter_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['twitter_url']); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['instagram_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['instagram_url']); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['linkedin_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['linkedin_url']); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <?php endif; ?>
              <?php if(!empty($websiteSettings['youtube_url'])): ?>
                <li><a href="<?php echo e($websiteSettings['youtube_url']); ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
              <?php endif; ?>
          </ul>

          <a href="JavaScript:void(0)" id="res-cross"></a>
      </div>
  </div>
</header><?php /**PATH /home/u783962882/domains/tazen.in/public_html/animalpride/resources/views/frontend/sections/header.blade.php ENDPATH**/ ?>