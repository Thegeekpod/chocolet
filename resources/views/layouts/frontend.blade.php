<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Chocolet - Quality Confectionery')</title>
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
    <header id="main-header">
        <div class="container header-inner">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <div class="logo-circle">
                        @if ($app_setting && $app_setting->logo)
                        <img src="{{ asset('storage/' . $app_setting->logo) }}" alt="{{ $app_setting->site_name }}">
                        @else
                        <span class="brand-name brand-name-header">🍫</span>
                        @endif
                    </div>
                </a>
            </div>



            <nav class="nav-pill">
                <div class="mobile-logo footer-logo">
                    <span class="footer-logo-icon">🍫</span>
                    <span class="footer-logo-text">Chocolet</span>
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
                        @if ($app_setting && $app_setting->footer_logo)
                        <img src="{{ asset('storage/' . $app_setting->footer_logo) }}"
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
                        @if ($app_setting->twitter_url)
                        <a href="{{ $app_setting->twitter_url }}" class="social-icon" aria-label="Twitter"><i
                                class="fab fa-twitter"></i></a>
                        @endif
                        @if ($app_setting->linkedin_url)
                        <a href="{{ $app_setting->linkedin_url }}" class="social-icon" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if ($app_setting->youtube_url)
                        <a href="{{ $app_setting->youtube_url }}" class="social-icon" aria-label="YouTube"><i
                                class="fab fa-youtube"></i></a>
                        @endif
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
                        @foreach ($app_categories as $cat)
                        <li><a href="{{ url('/') }}#categories">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact -->
                <div class="footer-column">
                    <h4 class="footer-title">Contact Us</h4>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <p>{{ $app_setting->address ?? 'India' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <p>
                                <a href="tel:{{ $app_setting->contact_phone ?? '' }}"
                                    style="color: inherit; text-decoration: none;">
                                    {{ $app_setting->contact_phone ?? '+91' }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <p>
                                <a href="mailto:{{ $app_setting->contact_email ?? '' }}"
                                    style="color: inherit; text-decoration: none;">
                                    {{ $app_setting->contact_email ?? 'info@chocolet.com' }}
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
</body>

</html>