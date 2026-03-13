<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @if (isset($app_seo) && $app_seo->meta_title)
            {{ $app_seo->meta_title }}
        @elseif(isset($app_setting) && $app_setting->global_meta_title)
            {{ $app_setting->global_meta_title }}
        @else
            @yield('title', 'Chocolet - Quality Confectionery')
        @endif
    </title>

    <meta name="description"
        content="{{ isset($app_seo) && $app_seo->meta_description ? $app_seo->meta_description : $app_setting->global_meta_description ?? 'Quality Confectionery for everyone.' }}">

    @if (isset($app_setting) && $app_setting->head_scripts)
        {!! $app_setting->head_scripts !!}
    @endif

    @if (isset($app_seo) && $app_seo->other_scripts)
        {!! $app_seo->other_scripts !!}
    @endif
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('pages.css') }}" />
    <link rel="stylesheet" href="{{ asset('responsive.css') }}" />
    @yield('styles')
</head>

<body>
    @if (isset($app_setting) && $app_setting->body_scripts)
        {!! $app_setting->body_scripts !!}
    @endif
    <header id="main-header">
        <div class="container header-inner">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <div class="logo-circle">
                        @if ($app_setting && $app_setting->logo)
                            <img src="{{ asset('storage/' . $app_setting->logo) }}" alt="{{ $app_setting->site_name }}">
                        @else
                            <h2 class="brand-name brand-name-header" style="font-size: 2rem; margin: 0;">
                                {{ $app_setting->site_name ?? 'Chocolet' }}</h2>
                        @endif
                    </div>
                </a>
            </div>



            <nav class="nav-pill">
                <div class="mobile-logo footer-logo">
                    <a href="{{ url('/') }}"
                        style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                        @if ($app_setting && $app_setting->logo)
                            <img src="{{ asset('storage/' . $app_setting->logo) }}"
                                alt="{{ $app_setting->site_name }}" style="max-height: 40px;">
                        @else
                            <span class="footer-logo-icon">🍫</span>
                            <span class="footer-logo-text">{{ $app_setting->site_name ?? 'Chocolet' }}</span>
                        @endif
                    </a>
                </div>
                <ul>
                    <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">HOME</a></li>
                    <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">ABOUT US</a>
                    </li>
                    <li><a href="{{ url('/products') }}"
                            class="{{ Request::is('products') ? 'active' : '' }}">PRODUCTS</a></li>
                    <li><a href="{{ url('/gallery') }}"
                            class="{{ Request::is('gallery') ? 'active' : '' }}">GALLERY</a>
                    </li>
                    <li><a href="{{ url('/contact') }}"
                            class="{{ Request::is('contact') ? 'active' : '' }}">CONTACT</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <button class="hamburger-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <!-- Brand Column -->
                <div class="footer-brand">
                    <div class="footer-logo">
                        @if ($app_setting && ($app_setting->footer_logo || $app_setting->logo))
                            <img src="{{ asset('storage/' . ($app_setting->footer_logo ?? $app_setting->logo)) }}"
                                alt="{{ $app_setting->site_name }}" style="max-height: 50px;">
                        @else
                            <span class="footer-logo-icon">🍫</span>
                            <span class="footer-logo-text">{{ $app_setting->site_name ?? 'Chocolet' }}</span>
                        @endif
                    </div>
                    <p class="footer-tagline">
                        {{ $app_setting->footer_text ?? 'Quality Confectionery for everyone.' }}
                    </p>
                    <div class="footer-social">
                        @if ($app_setting)
                            @if ($app_setting->facebook_url)
                                <a href="{{ $app_setting->facebook_url }}" class="social-icon" aria-label="Facebook"><i
                                        class="fab fa-facebook-f"></i></a>
                            @endif
                            @if ($app_setting->instagram_url)
                                <a href="{{ $app_setting->instagram_url }}" class="social-icon"
                                    aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            @endif
                            {{-- @if ($app_setting->twitter_url)
                                <a href="{{ $app_setting->twitter_url }}" class="social-icon" aria-label="Twitter"><i
                                        class="fab fa-twitter"></i></a>
                            @endif --}}
                            {{-- @if ($app_setting->linkedin_url)
                                <a href="{{ $app_setting->linkedin_url }}" class="social-icon" aria-label="LinkedIn"><i
                                        class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if ($app_setting->youtube_url)
                                <a href="{{ $app_setting->youtube_url }}" class="social-icon" aria-label="YouTube"><i
                                        class="fab fa-youtube"></i></a>
                            @endif --}}
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-column">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/') }}#categories">Categories</a></li>
                        <li><a href="{{ url('/products') }}">Our Products</a></li>
                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- Products -->
                <div class="footer-column">
                    <h4 class="footer-title">Categories</h4>
                    <ul class="footer-links">
                        @forelse ($footer_categories as $cat)
                            <li><a href="{{ url('/category/' . $cat->slug) }}">{{ $cat->name }}</a>
                            </li>
                        @empty
                            <li><a href="{{ url('/products') }}">All Products</a></li>
                        @endforelse
                    </ul>
                </div>

                <!-- Contact -->
                <div class="footer-column">
                    <h4 class="footer-title">Contact Us</h4>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <p>Kamdevpur, Delhi Road,<br>Sugandha, Hooghly – 712102,<br>West Bengal</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <p>
                                <a href="tel:+918584912729" style="color: inherit; text-decoration: none;">
                                    +91 85849 12729
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <p>
                                <a href="mailto:okaypoly2009@gmail.com" style="color: inherit; text-decoration: none;">
                                    okaypoly2009@gmail.com
                                </a><br>
                                <a href="mailto:support@okpolytech.in" style="color: inherit; text-decoration: none;">
                                    support@okpolytech.in
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">© {{ date('Y') }} {{ $app_setting->site_name ?? 'Chocolet' }} All rights
                        reserved.</p>
                    <ul class="footer-bottom-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- GSAP for Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    @yield('scripts')

    @if (isset($app_setting) && $app_setting->footer_scripts)
        {!! $app_setting->footer_scripts !!}
    @endif
</body>

</html>
