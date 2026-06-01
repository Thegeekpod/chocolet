@extends('layouts.frontend')

@section('title', 'About Us - Okay Polytech Pvt. Ltd.')

@section('styles')
    <style>
        /* ===== ABOUT PAGE STYLES ===== */

        /* Hero Banner */
        .about-hero {
            position: relative;
            padding: 160px 0 100px;
            background: linear-gradient(135deg, #f8fff4 0%, #fff5f5 50%, #f0faf5 100%);
            overflow: hidden;
            text-align: left;
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 168, 89, 0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .about-hero::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(227, 30, 36, 0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .about-hero-inner {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .about-hero-text .about-category-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            background: rgba(0, 168, 89, 0.1);
            color: var(--primary-green);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 24px;
        }

        .about-hero-text .about-category-tag span {
            font-size: 1rem;
        }

        .about-hero-title {
            font-size: 3.8rem;
            line-height: 1.1;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .about-hero-title .green {
            color: var(--primary-green);
        }

        .about-hero-subtitle {
            font-size: 1.15rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
            max-width: 540px;
        }

        .about-founded-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 24px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin-top: 10px;
        }

        .about-founded-badge .badge-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary-green), #00c96d);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .about-founded-badge .badge-text strong {
            display: block;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1;
        }

        .about-founded-badge .badge-text span {
            font-size: 0.8rem;
            color: var(--text-gray);
            font-weight: 500;
        }

        /* About Hero Stats */
        .about-stats-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .about-stat-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.07);
            text-align: center;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .about-stat-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-green), #00c96d);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .about-stat-card:hover::before {
            transform: scaleX(1);
        }

        .about-stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 168, 89, 0.12);
        }

        .about-stat-card .stat-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .about-stat-card .stat-num {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--primary-green);
            line-height: 1;
            margin-bottom: 6px;
        }

        .about-stat-card .stat-label {
            font-size: 0.85rem;
            color: var(--text-gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0;
        }

        .about-stat-card.red .stat-num {
            color: var(--primary-red);
        }

        /* ===== MISSION / VISION / VALUES ===== */
        .mvv-section {
            padding: 100px 0;
            background: var(--bg-light);
        }

        .mvv-section .section-label {
            text-align: center;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--primary-green);
            margin-bottom: 14px;
        }

        .mvv-section .section-heading {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 60px;
            color: var(--text-dark);
        }

        .mvv-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .mvv-card {
            background: #fff;
            border-radius: 24px;
            padding: 44px 34px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06);
            text-align: left;
            position: relative;
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .mvv-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 60px rgba(0, 168, 89, 0.13);
        }

        .mvv-card .mvv-icon-wrap {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 24px;
        }

        .mvv-card.mission .mvv-icon-wrap {
            background: rgba(0, 168, 89, 0.12);
        }

        .mvv-card.vision .mvv-icon-wrap {
            background: rgba(227, 30, 36, 0.1);
        }

        .mvv-card.values .mvv-icon-wrap {
            background: rgba(255, 176, 0, 0.12);
        }

        .mvv-card .mvv-tag {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            display: block;
        }

        .mvv-card.mission .mvv-tag {
            color: var(--primary-green);
        }

        .mvv-card.vision .mvv-tag {
            color: var(--primary-red);
        }

        .mvv-card.values .mvv-tag {
            color: #d48806;
        }

        .mvv-card h3 {
            font-size: 1.6rem;
            margin-bottom: 16px;
            color: var(--text-dark);
        }

        .mvv-card p {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .mvv-card .mvv-accent {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 80px;
            height: 80px;
            border-radius: 20px 0 24px 0;
            opacity: 0.06;
        }

        .mvv-card.mission .mvv-accent {
            background: var(--primary-green);
        }

        .mvv-card.vision .mvv-accent {
            background: var(--primary-red);
        }

        .mvv-card.values .mvv-accent {
            background: #f5a623;
        }

        /* ===== VALUES LIST ===== */
        .values-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .values-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0;
        }

        .values-list li .val-bullet {
            width: 28px;
            height: 28px;
            background: rgba(245, 166, 35, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: #d48806;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* ===== STORY SECTION ===== */
        .story-section {
            padding: 100px 0;
            background: #fff;
        }

        .story-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .story-timeline {
            position: relative;
            padding-left: 30px;
        }

        .story-timeline::before {
            content: '';
            position: absolute;
            top: 16px;
            left: 0;
            bottom: 16px;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary-green), var(--primary-red));
            border-radius: 99px;
        }

        .timeline-item {
            position: relative;
            padding-left: 28px;
            margin-bottom: 36px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-item .dot {
            position: absolute;
            left: -34px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary-green);
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px rgba(0, 168, 89, 0.3);
        }

        .timeline-item .dot.red {
            background: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(227, 30, 36, 0.3);
        }

        .timeline-item .tl-year {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--primary-green);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 4px;
        }

        .timeline-item .tl-year.red {
            color: var(--primary-red);
        }

        .timeline-item h4 {
            font-size: 1.1rem;
            margin-bottom: 6px;
            color: var(--text-dark);
        }

        .timeline-item p {
            font-size: 0.95rem;
            color: var(--text-gray);
            margin-bottom: 0;
            line-height: 1.7;
        }

        .story-right {
            text-align: left;
        }

        .story-right .section-label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--primary-green);
            margin-bottom: 14px;
            display: block;
        }

        .story-right h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            line-height: 1.15;
        }

        .story-right p {
            font-size: 1.05rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        /* ===== PRODUCT & PROCESS ===== */
        .process-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #00A859 0%, #00934e 50%, #00834a 100%);
            position: relative;
            overflow: hidden;
        }

        .process-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .process-section::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .process-inner {
            position: relative;
            z-index: 2;
        }

        .process-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .process-header .section-label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 14px;
            display: block;
        }

        .process-header h2 {
            font-size: 2.8rem;
            color: #fff;
            margin-bottom: 16px;
        }

        .process-header p {
            color: rgba(255, 255, 255, 0.85);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.05rem;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .process-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 36px 28px;
            text-align: center;
            transition: var(--transition-smooth);
        }

        .process-card:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-8px);
        }

        .process-card .pc-icon {
            font-size: 2.5rem;
            margin-bottom: 16px;
            display: block;
        }

        .process-card h4 {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 10px;
        }

        .process-card p {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin-bottom: 0;
        }

        .products-offered {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 44px;
            text-align: center;
        }

        .products-offered h3 {
            font-size: 1.7rem;
            color: #fff;
            margin-bottom: 30px;
        }

        .product-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
        }

        .product-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition-smooth);
            backdrop-filter: blur(6px);
        }

        .product-pill:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .about-hero-inner {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .about-hero-title {
                font-size: 2.8rem;
            }

            .mvv-grid {
                grid-template-columns: 1fr;
            }

            .story-inner {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .process-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .about-hero {
                padding: 130px 0 70px;
            }

            .about-hero-title {
                font-size: 2.2rem;
            }

            .about-stats-wrap {
                grid-template-columns: 1fr 1fr;
            }

            .process-grid {
                grid-template-columns: 1fr;
            }

            .mvv-section .section-heading,
            .story-right h2,
            .process-header h2 {
                font-size: 2rem;
            }
        }

        /* ===== LEADERSHIP SECTION ===== */
        .leadership-section {
            padding: 100px 0;
            background: #fff;
            position: relative;
        }

        .leadership-section .section-label {
            text-align: center;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--primary-green);
            margin-bottom: 14px;
        }

        .leadership-section .section-heading {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 60px;
            color: var(--text-dark);
        }

        .leadership-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: stretch;
        }

        .leader-card {
            background: var(--bg-light);
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: var(--transition-smooth);
            border: 1px solid rgba(0, 168, 89, 0.05);
        }

        .leader-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 55px rgba(0, 168, 89, 0.1);
            border-color: rgba(0, 168, 89, 0.15);
        }

        .leader-img-wrap {
            position: relative;
            width: 100%;
            height: 480px;
            overflow: hidden;
            background: #f0faf5;
        }

        .leader-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .leader-card:hover .leader-img-wrap img {
            transform: scale(1.04);
        }

        .leader-badge {
            position: absolute;
            bottom: 24px;
            left: 24px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--primary-green);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        .leader-card.red-theme .leader-badge {
            color: var(--primary-red);
        }

        .leader-info {
            padding: 40px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .leader-info h3 {
            font-size: 1.8rem;
            color: var(--text-dark);
            margin-bottom: 6px;
            font-weight: 800;
        }

        .leader-role {
            font-size: 0.95rem;
            color: var(--text-gray);
            font-weight: 600;
            margin-bottom: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
        }

        .leader-bio {
            font-size: 1.05rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 0;
        }

        /* ===== FACTORY SHOWCASE ===== */
        .factory-section {
            padding: 100px 0;
            background: var(--bg-light);
            position: relative;
            overflow: hidden;
        }

        .factory-inner {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 70px;
            align-items: center;
        }

        .factory-image-container {
            position: relative;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .factory-image-container img {
            width: 100%;
            height: auto;
            display: block;
            transition: var(--transition-smooth);
        }

        .factory-image-container:hover img {
            transform: scale(1.02);
        }

        .factory-floating-badge {
            position: absolute;
            top: 30px;
            left: 30px;
            background: var(--primary-green);
            color: #fff;
            padding: 14px 28px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 168, 89, 0.3);
            font-weight: 800;
            text-align: center;
        }

        .factory-floating-badge span {
            display: block;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            opacity: 0.9;
        }

        .factory-floating-badge strong {
            font-size: 1.4rem;
            display: block;
            margin-top: 2px;
        }

        .factory-info h2 {
            font-size: 2.8rem;
            color: var(--text-dark);
            margin-bottom: 24px;
            line-height: 1.15;
        }

        .factory-info p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .factory-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .fac-feat-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .fac-feat-icon {
            width: 44px;
            height: 44px;
            background: rgba(0, 168, 89, 0.15);
            color: var(--primary-green);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .fac-feat-text h5 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .fac-feat-text p {
            font-size: 0.88rem;
            color: var(--text-gray);
            margin-bottom: 0;
            line-height: 1.5;
        }
        .fac-feat-text {
    text-align: left;
}

        @media (max-width: 1024px) {
            .leadership-grid,
            .factory-inner {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            .leader-img-wrap {
                height: 400px;
            }
        }
    </style>
@endsection

@section('content')

    {{-- ===== ABOUT HERO ===== --}}
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-inner">

                {{-- Left: Text --}}
                <div class="about-hero-text">
                    <div class="about-category-tag">
                        <span>🍬</span> Our Story
                    </div>
                    <h1 class="about-hero-title">
                        How We Began<br>
                        Our <span class="green">Journey</span>
                    </h1>
                    <p class="about-hero-subtitle">
                        Founded in 2009 in Chinsurah, West Bengal, Okay Polytech Pvt. Ltd. is proud to present our brand,
                        "OKAY". As a premier manufacturer and supplier of a wide array of confectionery products,
                        including candies, jellies, biscuits, and wafers, we have established ourselves as a leading name
                        in the industry. Guided by a rich family heritage and entrepreneurial spirit spanning over 45 years, we are committed to delivering impeccable product quality, innovative offerings, and delightful tastes to our consumers. Our state-of-the-art infrastructure is equipped with the latest and most advanced automated machinery, enabling us to serve generations of customers across Bengal and India.
                    </p>
                    <div class="about-founded-badge">
                        <div class="badge-icon">🏭</div>
                        <div class="badge-text">
                            <strong>Est. 2009</strong>
                            <span>Chinsurah, West Bengal</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Stats --}}
                <div class="about-stats-wrap">
                    <div class="about-stat-card">
                        <span class="stat-icon">👑</span>
                        <div class="stat-num">45+</div>
                        <p class="stat-label">Years of Legacy</p>
                    </div>
                    <div class="about-stat-card red">
                        <span class="stat-icon">🍭</span>
                        <div class="stat-num">50+</div>
                        <p class="stat-label">Product Varieties</p>
                    </div>
                    <div class="about-stat-card">
                        <span class="stat-icon">🤝</span>
                        <div class="stat-num">1000+</div>
                        <p class="stat-label">Happy Clients</p>
                    </div>
                    <div class="about-stat-card red">
                        <span class="stat-icon">⚙️</span>
                        <div class="stat-num">100%</div>
                        <p class="stat-label">Automated Machinery</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== LEADERSHIP SECTION ===== --}}
    <section class="leadership-section">
        <div class="container">
            <p class="section-label">Our Leadership</p>
            <h2 class="section-heading">The Visionaries Behind Okay Confectionery</h2>

            <div class="leadership-grid">
                
                {{-- Dipak Ghosh --}}
                <div class="leader-card">
                    <div class="leader-img-wrap">
                        <img src="{{ asset('assets/Dipak-Ghosh.png') }}" alt="Dipak Ghosh">
                        <span class="leader-badge">Founder & Visionary</span>
                    </div>
                    <div class="leader-info">
                        <h3>Dipak Ghosh</h3>
                        <span class="leader-role">Founder, Okay Confectionery</span>
                        <p class="leader-bio">
                            Dipak Ghosh is the visionary founder behind Okay Confectionery, whose inspiring journey began more than 45 years ago with a passion for confectionery and a determination to build something meaningful from the ground up. Starting the business at a very young age without any external support, his dedication, hard work, and entrepreneurial spirit transformed a small initiative into one of the leading confectionery brands in Bengal and across India. Under his leadership, Okay Confectionery has grown with a strong commitment to quality, trust, and innovation, earning the love of generations of customers.
                        </p>
                    </div>
                </div>

                {{-- Parash Ghosh --}}
                <div class="leader-card red-theme">
                    <div class="leader-img-wrap">
                        <img src="{{ asset('assets/Parash-Ghosh.png') }}" alt="Parash Ghosh">
                        <span class="leader-badge">Director</span>
                    </div>
                    <div class="leader-info">
                        <h3>Parash Ghosh</h3>
                        <span class="leader-role">Director, Okay Confectionery</span>
                        <p class="leader-bio">
                            Parash Ghosh, son of Dipak Ghosh, joined the family business after completing his studies and has been actively contributing to the growth and success of Okay Confectionery for the last 10 years. With a modern vision and strong dedication towards the brand, he has played an important role in expanding the company’s presence while continuing the legacy of quality, trust, and customer satisfaction established by his father. His passion and commitment continue to drive the company towards new milestones in the confectionery industry.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== FACTORY SHOWCASE ===== --}}
    <section class="factory-section">
        <div class="container">
            <div class="factory-inner">
                
                {{-- Left: Image --}}
                <div class="factory-image-container">
                    <img src="{{ asset('assets/Okay-Factory.jpg.jpeg') }}" alt="Okay Confectionery Factory">
                    <div class="factory-floating-badge">
                        <span>Production</span>
                        <strong>100% Auto</strong>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="factory-info">
                    <h2>Our State-of-the-Art<br>Manufacturing Facility</h2>
                    <p>
                        Okay Confectionery operates from a highly sophisticated manufacturing plant equipped with cutting-edge, fully automated machinery. Our dedication to quality and hygiene is absolute, ensuring every candy, wafer, and chocolate is produced under the highest safety standards to deliver pure joy to our consumers.
                    </p>
                    
                    <div class="factory-features">
                        <div class="fac-feat-item">
                            <div class="fac-feat-icon">⚙️</div>
                            <div class="fac-feat-text">
                                <h5>Automated Lines</h5>
                                <p>Human-touch-free processing for supreme hygiene and quality.</p>
                            </div>
                        </div>
                        
                        <div class="fac-feat-item">
                            <div class="fac-feat-icon">🛡️</div>
                            <div class="fac-feat-text">
                                <h5>Quality Assured</h5>
                                <p>Rigorous multi-stage checkups from raw inputs to packaging.</p>
                            </div>
                        </div>

                        <div class="fac-feat-item">
                            <div class="fac-feat-icon">🧼</div>
                            <div class="fac-feat-text">
                                <h5>Hygienic Standards</h5>
                                <p>Compliant with global standards and FSSAI regulations.</p>
                            </div>
                        </div>

                        <div class="fac-feat-item">
                            <div class="fac-feat-icon">🚚</div>
                            <div class="fac-feat-text">
                                <h5>Massive Scale</h5>
                                <p>Serving millions of happy faces in Bengal and across India daily.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== MISSION / VISION / VALUES ===== --}}
    <section class="mvv-section">
        <div class="container">
            <p class="section-label">What Drives Us</p>
            <h2 class="section-heading">Our Mission, Vision & Values</h2>

            <div class="mvv-grid">

                {{-- Mission --}}
                <div class="mvv-card mission">
                    <div class="mvv-icon-wrap">🎯</div>
                    <span class="mvv-tag">Mission</span>
                    <h3>Mission</h3>
                    <p>
                        Okay Confectionery inspires and innovates with a unique &amp; wide range of
                        confectionery Products. This allows us to accommodate consumer wishes and expectations
                        through high-quality products, with appearances &amp; taste. We are dedicated to fully
                        satisfying our customers' needs through our commitment to doing our job better each day
                        meticulously select and use only the highest quality raw materials and ingredients to
                        achieve superior product quality.
                    </p>
                    <div class="mvv-accent"></div>
                </div>

                {{-- Vision --}}
                <div class="mvv-card vision">
                    <div class="mvv-icon-wrap">🔭</div>
                    <span class="mvv-tag">Vision</span>
                    <h3>Vision</h3>
                    <p>
                        To build a leading confectionery-based company with the drive to grow and develop the
                        confectionery market, through our longstanding expertise, innovation and empowered talent.
                    </p>
                    <div class="mvv-accent"></div>
                </div>

                {{-- Values --}}
                <div class="mvv-card values">
                    <div class="mvv-icon-wrap">⭐</div>
                    <span class="mvv-tag">Values</span>
                    <h3>Values</h3>
                    <p style="margin-bottom: 8px;">
                        Okay is committed to a high standard of company values that is reflected in the attention
                        that we give to our product development, customer relations and employees. We always
                        appreciate our customers feedback and our values are reflected in the way we do business
                        acting legally and honestly.
                    </p>
                    <p style="margin-bottom: 14px;">We stand behind our values of:</p>
                    <ul class="values-list">
                        <li><span class="val-bullet">1</span> Quality.</li>
                        <li><span class="val-bullet">2</span> Knowledge.</li>
                        <li><span class="val-bullet">3</span> Safety.</li>
                        <li><span class="val-bullet">4</span> Progression.</li>
                    </ul>
                    <div class="mvv-accent"></div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== PRODUCT & PROCESS ===== --}}
    <section class="process-section">
        <div class="process-inner">
            <div class="container">

                <div class="process-header">
                    <span class="section-label">Product &amp; Process</span>
                    <h2>Product &amp; Process</h2>
                    <p>
                        We proudly offer a wide range of products, including candies, lollipops, jellies,
                        chocolates, wafers, and biscuits. Our robust infrastructure has the latest and most
                        advanced machinery, ensuring efficient and high-quality production processes.
                    </p>
                </div>

                <div class="process-grid">
                    <div class="process-card">
                        <span class="pc-icon">🏭</span>
                        <h4>Robust Infrastructure</h4>
                        <p>Our infrastructure has the latest and most advanced machinery, ensuring efficient and
                            high-quality production processes.</p>
                    </div>
                    <div class="process-card">
                        <span class="pc-icon">🌾</span>
                        <h4>Premium Raw Materials</h4>
                        <p>We meticulously select and use only the highest quality raw materials and ingredients to achieve
                            superior product quality.</p>
                    </div>
                    <div class="process-card">
                        <span class="pc-icon">🍬</span>
                        <h4>Wide Product Range</h4>
                        <p>Candies, lollipops, jellies, chocolates, wafers, and biscuits — crafted with care for every
                            consumer.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
