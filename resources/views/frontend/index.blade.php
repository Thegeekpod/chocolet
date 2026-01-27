@extends('layouts.frontend')

@section('content')
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <h5 class="subheading">
                    {!! $app_setting->hero_subheading ?? 'Quality Products of <span class="highlight">ASHA Group</span>' !!}
                </h5>
                <h1 class="main-title">
                    {!! $app_setting->hero_title ?? 'WELCOME TO <br /><span class="brand-text">Chocolet</span>' !!}
                </h1>
                <p class="description">
                    {{ $app_setting->hero_description ?? 'Chocolet is a leading manufacturer and exporter of high-quality confectionery products.' }}
                </p>
                <div class="hero-btns">
                    <a href="{{ url('/products') }}" class="btn btn-primary">View Products <i
                            class="fas fa-arrow-right"></i></a>
                    <a href="{{ url('/contact') }}" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
            <div class="hero-visual">
                @if ($app_setting && $app_setting->hero_slides)
                    <div class="swiper hero-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($app_setting->hero_slides as $slide)
                                <div class="swiper-slide">
                                    <div class="slide-cover">
                                        <img loading="lazy" src="{{ asset('storage/' . ($slide['bg'] ?? '')) }}"
                                            alt="Background" />
                                    </div>
                                    <div class="swiper-main">
                                        <img loading="lazy" src="{{ asset('storage/' . ($slide['prod'] ?? '')) }}"
                                            alt="Product" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="hero-bg-shapes">
            <div class="shape circle-1"></div>
            <div class="shape circle-2"></div>
        </div>
    </section>


    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container about-container">
            <div class="about-visual">
                <div class="visual-bg-circle"></div>
                <div class="about-image-wrapper">
                    @if ($app_setting && $app_setting->about_image)
                        <img loading="lazy" src="{{ asset('storage/' . $app_setting->about_image) }}" alt="About"
                            class="about-main-img" />
                    @else
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/bravo.jpg" alt="About Chocolet"
                            class="about-main-img" />
                    @endif
                </div>
                <!-- Floating Elements -->
                <div class="float-card content-1">
                    <div class="float-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="float-text">
                        <strong>{{ $app_setting->about_years ?? '25+' }}</strong>
                        <span>Years Experience</span>
                    </div>
                </div>
                <div class="float-card content-2">
                    <div class="float-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="float-text">
                        <strong>{{ $app_setting->about_countries ?? '50+' }}</strong>
                        <span>Countries</span>
                    </div>
                </div>
            </div>

            <div class="about-content">
                <span class="about-label">{{ $app_setting->about_label ?? 'Our Story' }}</span>
                <h2 class="section-title about-title">
                    {{ $app_setting->about_title ?? 'Crafting Sweet Memories Since 1999' }}
                </h2>
                <p class="about-description">
                    {{ $app_setting->about_description_1 ?? 'At Chocolet, we believe that every piece of confectionery tells a story.' }}
                </p>
                <p class="about-description">
                    {{ $app_setting->about_description_2 ?? 'We combine traditional recipes with modern technology to create products that spark joy.' }}
                </p>

                <div class="stats-grid">
                    <div class="stat-item">
                        <h4 class="counter" data-target="{{ $app_setting->stat_1_val ?? '100' }}">0</h4>
                        <p>{{ $app_setting->stat_1_text ?? 'Premium Products' }}</p>
                    </div>
                    <div class="stat-item">
                        <h4 class="counter" data-target="{{ $app_setting->stat_2_val ?? '50' }}">0</h4>
                        <p>{{ $app_setting->stat_2_text ?? 'Global Export' }}</p>
                    </div>
                    <div class="stat-item">
                        <h4 class="counter" data-target="{{ $app_setting->stat_3_val ?? '1000' }}">0</h4>
                        <p>{{ $app_setting->stat_3_text ?? 'Happy Clients' }}</p>
                    </div>
                </div>

                <a href="{{ url('/about') }}" class="btn btn-primary btn-mt-40">
                    Discover More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Products Carousel Section -->
    <section class="products-section" id="products">
        <div class="container">
            <div class="section-header">
                <span class="category">Our Collection</span>
                <h2 class="section-title">{{ $app_setting->featured_products_title ?? 'Featured Products' }}</h2>
            </div>
            @if ($app_setting && $app_setting->featured_products_json)
                <div class="swiper products-swiper">
                    <div class="swiper-wrapper">
                        @php
                            $featuredItems = $app_setting->featured_products_json;
                            $count = count($featuredItems);
                            $totalNeeded = 20;
                            $iterations = ceil($totalNeeded / ($count ?: 1));
                        @endphp
                        @for ($i = 0; $i < $iterations; $i++)
                            @foreach ($featuredItems as $item)
                                <div class="swiper-slide">
                                    <a href="{{ url('/products') }}">
                                        <div class="product-card">
                                            <div class="wrapper">
                                                <img loading="lazy" src="{{ asset('storage/' . ($item['bg'] ?? '')) }}"
                                                    class="cover-image" alt="Background" />
                                            </div>
                                            <img loading="lazy" src="{{ asset('storage/' . ($item['logo'] ?? '')) }}"
                                                class="title" alt="Title" />
                                            <img loading="lazy" src="{{ asset('storage/' . ($item['prod'] ?? '')) }}"
                                                class="character" alt="Character" />
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section" id="categories">
        <div class="container">
            <div class="section-header">
                <span class="category">Our Sweet Range</span>
                <h2 class="section-title">Product Categories</h2>
            </div>

            <div class="categories-grid">
                @foreach ($categories as $category)
                    <div class="category-card">
                        <div class="category-bg category-bg-img"
                            style="background-image: url('{{ asset('storage/' . $category->image) }}');">
                        </div>
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-candy-cane"></i>
                            </div>
                            <h3>{{ $category->name }}</h3>

                            <span class="category-btn">View Collection <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Our Products Section -->
    <section class="our-products-section">
        <div class="container">
            <div class="products-header">
                <span class="category">Premium Selection</span>
                <h2 class="section-title">Our Products</h2>
                <p class="max-w-600-center">
                    Discover our handcrafted confectionery collection, made with
                    premium ingredients and innovative flavors
                </p>
            </div>

            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-item" data-product="{{ $product->slug }}">
                        <div class="product-image-wrapper">

                            <div class="product-bg-circle"></div>
                            <img loading="lazy" src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}" class="product-image" />
                        </div>
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-tagline">
                            {{ $product->tagline }}
                        </p>
                        <div class="product-features">
                            @if ($product->features)
                                @foreach ($product->features as $feature)
                                    <span class="feature-tag">{{ $feature }}</span>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ url('/product/' . $product->slug) }}" class="product-cta">
                            Explore <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="brands-section" id="brands">
        <div class="brands-container">
            <div class="section-header">
                <span class="category">Premium Quality</span>
                <h2 class="section-title">Our Brands</h2>
            </div>

            @if ($app_setting && $app_setting->brands_data)
                <!-- Filter Pills -->
                <div class="brand-categories">
                    @foreach ($app_setting->brands_data as $slug => $brand)
                        <div class="category-pill {{ $loop->first ? 'active' : '' }}"
                            data-category="{{ $slug }}">
                            {{ ucfirst(str_replace('-', ' ', $slug)) }}
                        </div>
                    @endforeach
                </div>

                @php
                    $firstBrandSlug = array_key_first($app_setting->brands_data);
                    $firstBrand = $app_setting->brands_data[$firstBrandSlug];
                @endphp

                <!-- Feature Brand Display -->
                <div class="brand-display" id="brand-display-content">
                    <div class="display-image">
                        <img loading="lazy" src="{{ asset('storage/' . ($firstBrand['main_img'] ?? '')) }}"
                            alt="{{ $firstBrand['title'] ?? '' }}" id="brand-main-image" />
                    </div>
                    <div class="display-info">
                        <h3 id="brand-title">{{ $firstBrand['title'] ?? '' }}</h3>
                        <p id="brand-description">
                            {{ $firstBrand['desc'] ?? '' }}
                        </p>
                        <a href="{{ $firstBrand['link'] ?? url('/products') }}" class="explore-btn"
                            id="brand-link">Explore All Products</a>
                    </div>
                </div>

                <!-- Bottom Logos Grid -->
                <div class="brand-logos-grid" id="brand-logos-grid">
                    @if (isset($firstBrand['logos']))
                        @foreach ($firstBrand['logos'] as $logo)
                            <div class="logo-card">
                                <img loading="lazy" src="{{ asset('storage/' . $logo) }}" alt="Brand Logo" />
                            </div>
                        @endforeach
                    @endif
                </div>

                <script>
                    window.brandsData = {!! json_encode($app_setting->brands_data) !!};
                </script>
            @endif
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="why-choose-bg">
            <div class="wc-blob wc-blob-1"></div>
            <div class="wc-blob wc-blob-2"></div>
        </div>
        <div class="why-choose-container">
            <div class="section-header">
                <span class="category">Our Promise</span>
                <h2 class="section-title">{{ $app_setting->why_title ?? 'Why Choose Chocolet?' }}</h2>
            </div>

            <div class="features-grid">
                @if ($app_setting && $app_setting->why_features)
                    @foreach ($app_setting->why_features as $feature)
                        <div class="feature-card">
                            <div class="icon-wrapper">
                                <i class="{{ $feature['icon'] ?? 'fas fa-check' }}"></i>
                                <div class="icon-blob"></div>
                            </div>
                            <h3>{{ $feature['title'] ?? '' }}</h3>
                            <p>{{ $feature['desc'] ?? '' }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
