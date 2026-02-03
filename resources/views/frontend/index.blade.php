@extends('frontend.layouts.layout')

@section('title', 'Home')

@section('content')
@php
    $websiteSettings = \App\Models\WebsiteSetting::getSettings();
    $contactSettings = \App\Models\ContactSetting::getSettings();
@endphp
@if(isset($heroSections) && $heroSections->count() > 0)
<section class="hero-section" style="background-color: #fff8e5; background-image:url({{ asset('assets/img/background.png') }})">
    <div class="container">
        <div class="row hero-one-slider owl-carousel owl-theme">
            @foreach($heroSections as $hero)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h1>{{ $hero->title }}</h1>
                            <h3>{{ $hero->subtitle }}</h3>
                            @if($hero->button_text && $hero->button_link)
                                <a href="{{ $hero->button_link }}" class="button">{{ $hero->button_text }}</a>
                            @else
                                <a href="{{ route('contact') }}" class="button">Get Appointment</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            @if($hero->image)
                                <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}">
                            @else
                                <img src="{{ asset('assets/img/hero-img-1.png') }}" alt="{{ $hero->title }}">
                            @endif
                            <img src="{{ asset('assets/img/hero-shaps.png') }}" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                        </div>
                    </div>
    <img src="{{ asset('assets/img/hero-shaps-1.png') }}" alt="hero-shaps" class="img-2">
    <img src="{{ asset('assets/img/dabal-foot-1.png') }}" alt="hero-shaps" class="img-3">
    <img src="{{ asset('assets/img/hero-shaps-1.png') }}" alt="hero-shaps" class="img-4">
</section>
@endif 
@if(isset($petCareServices) && $petCareServices->count() > 0)
<section class="gap no-bottom">
    <div class="container">
                <div class="row">
            @foreach($petCareServices as $index => $service)
            <div class="col-lg-4 col-md-6 {{ $loop->last ? 'mb-0' : '' }}">
                <div class="we-provide">
                    <div class="we-provide-img">
                        @if($service->icon)
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->name }}">
                        @else
                            <img src="{{ asset('assets/img/we-provide-' . (($index % 3) + 1) . '.jpg') }}" alt="{{ $service->name }}">
                        @endif
                        <svg width="326" height="326" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="{{ $index % 2 == 0 ? '#fedc4f' : '#fb5e3c' }}"/>
                        </svg>
                        </div>
                    <a href="{{ $service->link ?? '#' }}"><h5>{{ $service->name }}</h5></a>
                    <p>{{ $service->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.' }}</p>
                    </div>
                        </div>
            @endforeach
                    </div>
                </div>
</section> 
@endif
<section class="gap no-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="welcome-to">
                    @if(isset($welcomeSections) && $welcomeSections->count() > 0)
                        @foreach($welcomeSections->take(1) as $welcome)
                            <h2>{{ $welcome->title }}</h2>
                            <p>{{ $welcome->description }}</p>
                        @endforeach
                    @else
                        <h2>Welcome to Animal Pride</h2>
                        <p>Lorem ipsum dolor sit amet,consectetur adipiscing elit do eiusmod tempor incididunt ut labore et.Lorem ipsumsit amet, consectetur adipiscing elit, sed do eiusmod teincididunt ut laamet,consectetur adipiscing elibore et.</p>
                    @endif
                    <div class="row mt-lg-5">
                        <div class="col-md-6">
                            <div class="pet-grooming">
                            <i><img src="{{ asset('assets/img/welcome-to-1.png') }}" alt="icon"></i>
                            <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"/>
                            </svg>
                            <a href="#"><h4>Pet Grooming</h4></a>
                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiu incididunt ut labore et.</p>
                </div>
            </div>
                        <div class="col-md-6">
                            <div class="pet-grooming mb-0">
                            <i><img src="{{ asset('assets/img/welcome-to-2.png') }}" alt="icon"></i>
                            <svg width="138" height="138" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#940c69"/>
                            </svg>
                            <a href="#"><h4>Dog Walking</h4></a>
                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiu incididunt ut labore et.</p>
        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dog-walker two d-block">
                    <img src="{{ asset('assets/img/puppies.png') }}" class="puppies" alt="puppies">
                    <img src="{{ asset('assets/img/dog-walker-1.png') }}" class="w-100" alt="dog walker">
                    <img src="{{ asset('assets/img/line.png') }}" class="line" alt="line">
                    <img src="{{ asset('assets/img/dabal-foot.png') }}" class="dabal-foot" alt="dabal-foot">
                    <img src="{{ asset('assets/img/haddi.png') }}" class="haddi" alt="haddi">
                </div>
            </div>
        </div>
    </div>
</section> 
<section class="gap">
    <div class="container">
        <div class="heading">
            <img src="{{ asset('assets/img/heading-img.png') }}" alt="heading-img">
            <h6>Find Healthy Product By Category</h6>
            <h2>Browse By Categories</h2>
        </div>
        <div class="slider-categorie owl-carousel owl-theme">
            @forelse($categories ?? [] as $index => $category)
            <div class="item">
                <div class="food-categorie">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" onerror="this.src='{{ asset('assets/img/food-categorie-' . (($index % 5) + 1) . '.png') }}'">
                    @else
                        <img src="{{ asset('assets/img/food-categorie-' . (($index % 5) + 1) . '.png') }}" alt="{{ $category->name }}">
                    @endif
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                </div>
            </div>
            @empty
            {{-- Fallback static categories --}}
            <div class="item">
                <div class="food-categorie">
                    <img src="{{ asset('assets/img/food-categorie-1.png') }}" alt="food-categorie">
                    <a href="{{ route('products.index') }}">Cat Supplies</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="{{ asset('assets/img/food-categorie-2.png') }}" alt="food-categorie">
                    <a href="{{ route('products.index') }}">Dog Supplies</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="{{ asset('assets/img/food-categorie-3.png') }}" alt="food-categorie">
                    <a href="{{ route('products.index') }}">Animal Feed</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="{{ asset('assets/img/food-categorie-4.png') }}" alt="food-categorie">
                    <a href="{{ route('products.index') }}">Accessories</a>
                </div>
            </div>
            <div class="item">
                <div class="food-categorie">
                    <img src="{{ asset('assets/img/food-categorie-5.png') }}" alt="food-categorie">
                    <a href="{{ route('products.index') }}">Horse Care</a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<section class="gap section-healthy-product" style="background-image: url({{ asset('assets/img/healthy-product.png') }}); background-color: #f5f5f5;">
    <div class="container">
        <div class="heading">
            <img src="{{ asset('assets/img/heading-img.png') }}" alt="heading-img">
            <h6>Find Healthy Product</h6>
            <h2>Healthy Products</h2>
        </div>
        <div class="row">
            @forelse($healthyProducts ?? [] as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 {{ $loop->index >= 4 ? 'mb-lg-0' : '' }}">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                            <img src="{{ asset('assets/img/food-' . (($loop->index % 6) + 1) . '.png') }}" alt="{{ $product->name }}">
                                @endif
                        <ul class="star">
                            @for($i = 1; $i <= 5; $i++)
                                <li><i class="fa-solid fa-star {{ $i <= ($product->rating ?? 5) ? '' : 'text-muted' }}"></i></li>
                            @endfor
                        </ul>
                        <div class="add-to-cart">
                          <a href="#" class="add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</a>
                            <a href="#" class="wishlist-toggle-btn" data-product-id="{{ $product->id }}">
                            <i class="fa-regular fa-heart"></i>
                          </a>
                        </div>
                        @if($product->is_on_sale && $product->discount_percentage)
                            <h4>-{{ $product->discount_percentage }}%</h4>
                        @endif
                        @if($product->stock_quantity <= 0)
                            <div class="out-of-stock">Out of Stock</div>
                        @endif
                        </div>
                    <span>{{ $product->category->name ?? 'Uncategorized' }}</span>
                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                    <h6>
                        @if($product->sale_price)
                            <del>₹{{ number_format($product->price, 2) }}</del> ₹{{ number_format($product->sale_price, 2) }}
                        @else
                            ₹{{ number_format($product->price, 2) }}
                        @endif
                    </h6>
                </div>
            </div>
            @if($loop->index == 4)
            <div class="col-lg-9">
                <div class="deal-of-the-week">
                    @if(isset($dealOfWeek) && $dealOfWeek)
                    <div class="healthy-product-img">
                        <h6>Deal of the Week</h6>
                        @if($dealOfWeek->image)
                            <img src="{{ asset('storage/' . $dealOfWeek->image) }}" alt="{{ $dealOfWeek->name }}">
                                @else
                            <img src="{{ asset('assets/img/food-6.png') }}" alt="{{ $dealOfWeek->name }}">
                                @endif
                        <ul class="star">
                            @for($i = 1; $i <= 5; $i++)
                                <li><i class="fa-solid fa-star {{ $i <= ($dealOfWeek->rating ?? 5) ? '' : 'text-muted' }}"></i></li>
                            @endfor
                        </ul>
                    </div>
                    <div class="healthy-product">
                        <span>{{ $dealOfWeek->category->name ?? 'Uncategorized' }}</span>
                        <a href="{{ route('product.show', $dealOfWeek->slug) }}">{{ $dealOfWeek->name }}</a>
                        <h6>
                            @if($dealOfWeek->sale_price)
                                <del>₹{{ number_format($dealOfWeek->price, 2) }}</del> ₹{{ number_format($dealOfWeek->sale_price, 2) }}
                            @else
                                ₹{{ number_format($dealOfWeek->price, 2) }}
                            @endif
                        </h6>
                        @if($dealOfWeek->discount_percentage)
                            <h5>up to {{ $dealOfWeek->discount_percentage }}% off</h5>
                        @endif
                        <div class="add-to-cart">
                          <a href="#" class="button add-to-cart-btn" data-product-id="{{ $dealOfWeek->id }}">Add to Cart</a>
                            <a href="#" class="wishlist-toggle-btn" data-product-id="{{ $dealOfWeek->id }}">
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
                    @else
                    {{-- Fallback static deal --}}
                    <div class="healthy-product-img">
                        <h6>Deal of the Week</h6>
                        <img src="{{ asset('assets/img/food-6.png') }}" alt="food">
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
                        <a href="{{ route('products.index') }}">Healthy Dog Food Roaster Chicken</a>
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
                    @endif
            </div>
        </div>
        @endif
            @empty
            {{-- Fallback static products --}}
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <img src="{{ asset('assets/img/food-1.png') }}" alt="food">
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
                    <a href="{{ route('products.index') }}">Procan Adult Dog Food</a>
                    <h6>₹32.00</h6>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<section class="gap">
    <div class="container">
        <div class="row">
            @forelse($statistics ?? [] as $index => $statistic)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="count-text">
                    @if($statistic->icon)
                        <img alt="img" src="{{ asset('storage/' . $statistic->icon) }}">
                    @else
                        <img alt="img" src="{{ asset('assets/img/fun-facts-' . (($index % 4) + 1) . '.png') }}">
                    @endif
                   <div>
                   <div class="d-flex justify-content-center">
                        <h2 class="count" data-number="{{ $statistic->number }}"></h2>
                            <span>{{ $statistic->suffix ?? '+' }}</span>
                   </div>
                   <h3 class="text">{{ $statistic->title }}</h3>
                   </div>
                </div>
            </div>
            @empty
            {{-- Fallback static statistics --}}
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="count-text">
                    <img alt="img" src="{{ asset('assets/img/fun-facts-1.png') }}">
                   <div>
                   <div class="d-flex justify-content-center">
                            <h2 class="count" data-number="100"></h2>
                        <span>+</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="count-text">
                    <img alt="img" src="{{ asset('assets/img/fun-facts-2.png') }}">
                   <div>
                   <div class="d-flex justify-content-center">
                            <h2 class="count" data-number="99"></h2>
                        <span>%</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="count-text">
                    <img alt="img" src="{{ asset('assets/img/fun-facts-3.png') }}">
                   <div>
                   <div class="d-flex justify-content-center">
                            <h2 class="count" data-number="2"></h2>
                        <span>k</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="count-text">
                    <img alt="img" src="{{ asset('assets/img/fun-facts-4.png') }}">
                   <div>
                   <div class="d-flex justify-content-center">
                            <h2 class="count" data-number="400"></h2>
                        <span>+</span>
                   </div>
                   <h3 class="text">Client Served</h3>
                  </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>   

<style>
/* Statistics Section Styling - No Background Container */
section.gap .count-text {
    text-align: center;
    padding: 0;
    background: transparent;
    border-radius: 0;
    box-shadow: none;
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

section.gap .count-text:hover {
    transform: translateY(-5px);
}

section.gap .count-text img {
    width: 80px;
    height: 80px;
    object-fit: contain;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

section.gap .count-text:hover img {
    transform: scale(1.1);
}

section.gap .count-text > div {
    width: 100%;
}

section.gap .count-text .d-flex {
    margin-bottom: 15px;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
}

section.gap .count-text h2.count {
    font-size: 3.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #ee643c, #c20466);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    line-height: 1;
    transition: all 0.3s ease;
}

section.gap .count-text:hover h2.count {
    transform: scale(1.05);
}

section.gap .count-text .d-flex span {
    font-size: 2rem;
    font-weight: 600;
    color: #c20466;
    margin-left: 5px;
    transition: all 0.3s ease;
}

section.gap .count-text:hover .d-flex span {
    color: #ee643c;
}

section.gap .count-text h3.text {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin: 0;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

section.gap .count-text:hover h3.text {
    color: #c20466;
}

/* Ensure items align in same line */
section.gap .row {
    display: flex;
    align-items: center;
    justify-content: center;
}

section.gap .row > div {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0;
}

/* Responsive Design */
@media (max-width: 992px) {
    section.gap .count-text img {
        width: 70px;
        height: 70px;
        margin-bottom: 15px;
    }
    
    section.gap .count-text h2.count {
        font-size: 3rem;
    }
    
    section.gap .count-text .d-flex span {
        font-size: 1.8rem;
    }
    
    section.gap .count-text h3.text {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    section.gap .count-text img {
        width: 60px;
        height: 60px;
        margin-bottom: 12px;
    }
    
    section.gap .count-text h2.count {
        font-size: 2.5rem;
    }
    
    section.gap .count-text .d-flex span {
        font-size: 1.5rem;
    }
    
    section.gap .count-text h3.text {
        font-size: 1rem;
    }
    
    section.gap .row {
        flex-wrap: wrap;
    }
    
    section.gap .row > div {
        margin-bottom: 30px;
    }
}

@media (max-width: 576px) {
    section.gap .count-text img {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }
    
    section.gap .count-text h2.count {
        font-size: 2rem;
    }
    
    section.gap .count-text .d-flex span {
        font-size: 1.3rem;
    }
    
    section.gap .count-text h3.text {
        font-size: 0.9rem;
    }
}

/* Animation for count numbers */
@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

section.gap .count-text h2.count {
    animation: countUp 0.6s ease-out;
}
</style>

<section>
    <div class="container">
        <div class="heading">
            <img src="{{ asset('assets/img/heading-img.png') }}" alt="heading-img">
            <h6>Meet Our Experts</h6>
            <h2>Best Working Team</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="team-working">
                    <img src="{{ asset('assets/img/team-1.jpg') }}" alt="team">
                    <svg width="188" height="188" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#000"/>
                    </svg>
                    <span>Veterinary Assistant</span>
                    <a href="team-details.html"><h4>Gorjona Hiller</h4></a>
                    <ul class="social-icon">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-working">
                    <img src="{{ asset('assets/img/team-2.jpg') }}" alt="team">
                    <svg width="188" height="188" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#000"/>
                    </svg>
                    <span>Veterinary Assistant</span>
                    <a href="team-details.html"><h4>Willimes Domson</h4></a>
                    <ul class="social-icon">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-working mb-0">
                    <img src="{{ asset('assets/img/team-3.jpg') }}" alt="team">
                    <svg width="188" height="188" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#000"/>
                    </svg>
                    <span>Veterinary Assistant</span>
                    <a href="team-details.html"><h4>Thomas Walkar</h4></a>
                    <ul class="social-icon">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap"> 
    <div class="container">
        <div class="dog-walker">
            <img src="{{ asset('assets/img/dog-walker.png') }}" alt="dog walker">
            <img src="{{ asset('assets/img/line.png') }}" class="line" alt="line">
            <img src="{{ asset('assets/img/dabal-foot.png') }}" class="dabal-foot" alt="dabal-foot">
            <div class="dog-walker-text">
                <h2>Find a dog walker or pet care</h2>
                <p>Place your trust in We Love Pets, an award-winning dog walking and pet care</p>
                <form>
                    <input placeholder="Enter address or postcode..." name="Enter address" type="text">
                    <button class="button">Find Branch</button>
                </form>
            </div>
        </div>
    </div>
</section>  
<section class="section-client gap" style="background-image: url(assets/img/client-b.jpg)">
    <div class="container">
        <div class="heading two">
            <h2>What Our Client’s Say</h2>
        </div>
        <div class="client-slider owl-carousel owl-theme">
            <div class="item" >
                <div class="client">
                    <img src="{{ asset('assets/img/client.png') }}" alt="client">
                    <div class="client-text">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p>Excepteur sint occaecat cupidatat nilesm aniu deserunt mollit anim Lorem set dolo liem amet dolor sit amet, consectetur adipiscing il erunti nuliems elit sed incididunt</p>
                        <h4>Qlark Domous</h4>
                        <span>Health Advisor</span>
                        <i class="quote">
                            <img src="{{ asset('assets/img/quote.png') }}" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="client">
                    <img src="{{ asset('assets/img/client.png') }}" alt="client">
                    <div class="client-text">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p>Excepteur sint occaecat cupidatat nilesm aniu deserunt mollit anim Lorem set dolo liem amet dolor sit amet, consectetur adipiscing il erunti nuliems elit sed incididunt</p>
                        <h4>Willimes Marko</h4>
                        <span>Health Advisor</span>
                        <i class="quote">
                            <img src="{{ asset('assets/img/quote.png') }}" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <div class="item" >
                <div class="client">
                    <img src="{{ asset('assets/img/client.png') }}" alt="client">
                    <div class="client-text">
                        <ul class="star">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <p>Excepteur sint occaecat cupidatat nilesm aniu deserunt mollit anim Lorem set dolo liem amet dolor sit amet, consectetur adipiscing il erunti nuliems elit sed incididunt</p>
                        <h4>Qlark Domous</h4>
                        <span>Health Advisor</span>
                        <i class="quote">
                            <img src="{{ asset('assets/img/quote.png') }}" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
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
<section class="gap no-bottom">
    <div class="container">
        <div class="heading">
            <img src="{{ asset('assets/img/heading-img.png') }}" alt="heading-img">
            <h6>Blog and News</h6>
            <h2>Recent Articles</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-style">
                    <figure>
                        <img src="{{ asset('assets/img/blog-1.jpg') }}" alt="img">
                    </figure>
                    <a href="#"><h6>Animal Care</h6></a>
                    <div class="blog-style-text">
                        <h5>23<span>May,2023</span></h5>
                        <div>
                            <a href="blog-details.html"><h3>The Best High Fiber Dog Food</h3></a>
                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiuincididunut labore et.</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/man.jpg') }}" alt="man">
                                <h4>Willimes Domson</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-style">
                    <figure>
                        <img src="{{ asset('assets/img/blog-2.jpg') }}" alt="img">
                    </figure>
                    <a href="#"><h6>Animal Care</h6></a>
                    <div class="blog-style-text">
                        <h5>23<span>May,2023</span></h5>
                        <div>
                            <a href="blog-details.html"><h3>The Basic Necessities of Proper Pet Care</h3></a>
                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiuincididunut labore et.</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/man.jpg') }}" alt="man">
                                <h4>Willimes Domson</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-style mb-0">
                    <figure>
                        <img src="{{ asset('assets/img/blog-3.jpg') }}" alt="img">
                    </figure>
                    <a href="#"><h6>Animal Care</h6></a>
                    <div class="blog-style-text">
                        <h5>23<span>May,2023</span></h5>
                        <div>
                            <a href="blog-details.html"><h3>Pets need care and attention</h3></a>
                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiuincididunut labore et.</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/man.jpg') }}" alt="man">
                                <h4>Willimes Domson</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="btn-center">
                <a href="our-blog.html" class="button">View All News</a>
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

                          <img src="{{ asset('assets/img/food-1.png') }}" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Brown Sandwich</h3>

                          <p class="theme-clr font-semi-bold">1 x $10.50</p>

                        </div>

                        <a href="JavaScript:void(0)" id="crosss"></a>

                      </li>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="{{ asset('assets/img/food-2.png') }}" alt="Product Image">

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

@endsection
