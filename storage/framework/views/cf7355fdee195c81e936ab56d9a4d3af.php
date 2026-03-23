<?php
        $websiteSettings = \App\Models\WebsiteSetting::getSettings();
        $contactSettings = \App\Models\ContactSetting::getSettings();

        $phonePrimary = $contactSettings->phone_number ?? '';
        $phoneSecondary = $contactSettings->phone_number_2 ?? '';

        if (!$phonePrimary && !empty($websiteSettings['phone'])) {
                $phoneParts = array_map('trim', explode(',', $websiteSettings['phone']));
                $phonePrimary = $phoneParts[0] ?? '';
                $phoneSecondary = $phoneParts[1] ?? '';
        }
?>
<footer style="background-color: #fff8e5; background-image:url(<?php echo e(asset('assets/img/background.png')); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>">
                        <?php if(!empty($websiteSettings['footer_logo'])): ?>
                            <img src="<?php echo e(asset('storage/' . $websiteSettings['footer_logo'])); ?>" alt="<?php echo e($websiteSettings['company_name'] ?? 'Logo'); ?>" class="footer-logo">
                        <?php elseif(!empty($websiteSettings['logo'])): ?>
                            <img src="<?php echo e(asset('storage/' . $websiteSettings['logo'])); ?>" alt="<?php echo e($websiteSettings['company_name'] ?? 'Logo'); ?>" class="footer-logo">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="logo" class="footer-logo">
                        <?php endif; ?>
                    </a>
                    <p><?php echo e($websiteSettings['footer_description'] ?? ''); ?></p>
                    <div class="phone">
                          <i>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <path d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z
                               M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z"></path>
                            </svg>
                          </i><a href="mailto:<?php echo e($websiteSettings['email'] ?? ''); ?>"><?php echo e($websiteSettings['email'] ?? ''); ?></a>
                    </div>
                        <div class="phone d-flax align-items-center">
                          <i>
                              <svg version="1.1" xml:space="preserve" width="682.66669" height="682.66669" viewBox="0 0 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg"><clipPath clipPathUnits="userSpaceOnUse"><path d="M 0,512 H 512 V 0 H 0 Z"></path></clipPath><g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)"><g><g clip-path="url(#clipPath2333)"><g transform="translate(256,92)"><path d="m 0,0 c -126.964,143.662 -160,165.23 -160,240 0,88.366 71.634,160 160,160 88.365,0 160,-71.634 160,-160 C 160,165.854 130.212,147.337 0,0 Z" style="fill:none;stroke:#000;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"></path></g><g transform="translate(316,372)"><path d="m 0,0 -80,-80 -40,40" style="fill:none;stroke:#000;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"></path></g></g></g></g>
                              </svg>
                            </i>
                          <div class="footer-addresses">
                                                            <p class="mb-2"><strong>CLINIC & GROOMING CENTER:</strong><br><?php echo e($contactSettings->office1_address ?? ''); ?></p>
                                                            <p class="mb-0"><strong>SALES OUTLET:</strong><br><?php echo e($contactSettings->office2_address ?? ''); ?></p>
                          </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="widget-title">
                  <h3>Quick Links</h3>
                  <div class="boder"></div>
                    <ul>
                      <li><i class="fa-solid fa-angle-right"></i><a href="<?php echo e(route('home')); ?>">Home</a></li>
                      <li><i class="fa-solid fa-angle-right"></i><a href="<?php echo e(route('about')); ?>">About</a></li>
                      <li><i class="fa-solid fa-angle-right"></i><a href="<?php echo e(route('gallery')); ?>">Photo Gallery</a></li>
                      <li><i class="fa-solid fa-angle-right"></i><a href="<?php echo e(route('products.index')); ?>">Our Products</a></li>
                      
                      <li><i class="fa-solid fa-angle-right"></i><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                    </ul>
                  </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="working-hours">
                    <div class="widget-title">
                      <h3>working hours</h3>
                      <div class="boder"></div>
                      <div class="working-time">
                          <h6 class="pt-0"><strong>Salt Lake:</strong> <span><?php echo e($contactSettings->working_hours_salt_lake ?? ''); ?></span></h6>
                          <h6><strong>Chingrighata:</strong> <span><?php echo e($contactSettings->working_hours_chingrighata ?? ''); ?></span></h6>
                          <div class="call-us">
                              <img src="<?php echo e(asset('assets/img/hadphon.png')); ?>" alt="hadphon">
                              <div>
                                  <?php if($phonePrimary): ?>
                                      <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $phonePrimary)); ?>"><?php echo e($phonePrimary); ?></a><br>
                                  <?php endif; ?>
                                  <?php if($phoneSecondary): ?>
                                      <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $phoneSecondary)); ?>"><?php echo e($phoneSecondary); ?></a>
                                  <?php endif; ?>
                                  <span><?php echo e($websiteSettings['support_text'] ?? ''); ?></span>
                              </div>
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
                              <?php if(!empty($websiteSettings['phone'])): ?>
                                <li><a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $websiteSettings['phone'])); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                              <?php endif; ?>
                          </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p><?php echo e($websiteSettings['footer_copyright'] ?? ''); ?></p>
            <a href="#"><img src="<?php echo e(asset('assets/img/visa.jpg')); ?>" alt="cad"></a>
        </div>
    </div>
    <img src="<?php echo e(asset('assets/img/dabal-foot-1.png')); ?>" alt="hero-shaps" class="img-3">
</footer>

<!-- Progress Scroll to Top Button -->
<div class="progress-wrap" id="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="m50,1a49,49 0 0,1 0,98a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
    <span id="progress-value"><i class="fa-solid fa-up-long"></i></span>
</div>

<style>
/* Footer Addresses Styling */
.footer-addresses {
    line-height: 1.8;
}

.footer-addresses p {
    margin-bottom: 1rem;
    color: #64748b;
    font-size: 0.95rem;
}

.footer-addresses strong {
    color: #ee643c;
    font-weight: 600;
    display: block;
    margin-bottom: 0.25rem;
}

.footer-addresses p:last-child {
    margin-bottom: 0;
}

/* Progress Scroll to Top Button */
.progress-wrap {
    position: fixed;
    right: 30px;
    bottom: 30px;
    height: 55px;
    width: 55px;
    cursor: pointer;
    display: block;
    border-radius: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px);
    transition: all 200ms linear;
    background: linear-gradient(45deg, #ee643c, #c20466);
}

.progress-wrap.active-progress {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.progress-wrap::after {
    position: absolute;
    font-family: "Font Awesome 6 Free";
    content: "\f077";
    text-align: center;
    line-height: 55px;
    font-size: 16px;
    color: white;
    left: 0;
    top: 0;
    height: 55px;
    width: 55px;
    cursor: pointer;
    display: block;
    z-index: 1;
    transition: all 200ms linear;
    font-weight: 900;
}

.progress-wrap:hover::after {
    opacity: 0;
}

.progress-wrap svg path {
    fill: none;
    stroke: #ee643c;
    stroke-width: 3;
    box-sizing: border-box;
    transition: all 200ms linear;
}

.progress-wrap svg.progress-circle path {
    stroke: white;
    stroke-dasharray: 307.919;
    stroke-dashoffset: 307.919;
}

.progress-wrap #progress-value {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 16px;
    opacity: 0;
    transition: all 200ms linear;
    z-index: 2;
    font-weight: 900;
}

.progress-wrap:hover #progress-value {
    opacity: 1;
}

.progress-wrap:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(250, 68, 29, 0.4);
}

/* Mobile responsive */
@media (max-width: 768px) {
    .progress-wrap {
        right: 20px;
        bottom: 20px;
        height: 45px;
        width: 45px;
    }
    
    .progress-wrap::after {
        line-height: 45px;
        height: 45px;
        width: 45px;
        font-size: 14px;
    }
    
    .progress-wrap #progress-value {
        font-size: 14px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Progress scroll to top
    const progressPath = document.querySelector('.progress-wrap path');
    const pathLength = progressPath.getTotalLength();
    const progressWrap = document.querySelector('.progress-wrap');
    
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    
    const updateProgress = function() {
        const scroll = window.pageYOffset;
        const height = document.documentElement.scrollHeight - window.innerHeight;
        const progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    
    updateProgress();
    
    window.addEventListener('scroll', updateProgress);
    
    // Show/hide progress wrap
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 150) {
            progressWrap.classList.add('active-progress');
        } else {
            progressWrap.classList.remove('active-progress');
        }
    });
    
    // Click to scroll to top
    progressWrap.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        return false;
    });
});
</script>
<?php /**PATH C:\Users\SK NADIM\Downloads\_animalpride(1)\_animalpride\resources\views/frontend/sections/footer.blade.php ENDPATH**/ ?>