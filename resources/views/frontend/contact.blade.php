@extends('layouts.frontend')

@section('title', 'Contact Us - Okay Polytech Pvt. Ltd.')

@section('styles')
    <style>
        /* ===== CONTACT PAGE ===== */
        .contact-page {
            padding: 140px 0 100px;
            background: var(--bg-light);
        }

        /* Info Cards Row */
        .contact-info-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 60px;
        }

        .contact-info-card {
            background: #fff;
            border-radius: 20px;
            padding: 32px 28px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: flex-start;
            gap: 18px;
            transition: var(--transition-smooth);
        }

        .contact-info-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 168, 89, 0.12);
        }

        .contact-info-card .ci-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(0, 168, 89, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-info-card .ci-icon i {
            font-size: 1.4rem;
            color: var(--primary-green);
        }

        .contact-info-card .ci-body h4 {
            font-size: 1rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .contact-info-card .ci-body p {
            font-size: 0.92rem;
            color: var(--text-gray);
            line-height: 1.6;
            margin-bottom: 0;
        }

        .contact-info-card .ci-body a {
            color: var(--text-gray);
            text-decoration: none;
            transition: color 0.2s;
        }

        .contact-info-card .ci-body a:hover {
            color: var(--primary-green);
        }

        /* Main Grid */
        .contact-main-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 50px;
            align-items: start;
        }

        /* Left: Additional Info */
        .contact-left {
            background: #fff;
            border-radius: 24px;
            padding: 44px 36px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .contact-left .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(0, 168, 89, 0.1);
            color: var(--primary-green);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 18px;
        }

        .contact-left h2 {
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: 14px;
            line-height: 1.2;
        }

        .contact-left>p {
            font-size: 1rem;
            color: var(--text-gray);
            line-height: 1.75;
            margin-bottom: 32px;
        }

        .contact-detail-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .contact-detail-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .contact-detail-item .cd-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(0, 168, 89, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-detail-item .cd-icon i {
            font-size: 1.1rem;
            color: var(--primary-green);
        }

        .contact-detail-item h5 {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .contact-detail-item p {
            font-size: 0.98rem;
            color: var(--text-dark);
            margin-bottom: 0;
            line-height: 1.6;
        }

        .contact-detail-item p a {
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.2s;
        }

        .contact-detail-item p a:hover {
            color: var(--primary-green);
        }

        /* Right: Form */
        .contact-form-box {
            background: #fff;
            border-radius: 24px;
            padding: 44px 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .contact-form-box h3 {
            font-size: 1.7rem;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .contact-form-box>p {
            font-size: 0.98rem;
            color: var(--text-gray);
            margin-bottom: 30px;
        }

        .contact-form-inner {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            text-align: left;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 14px 18px;
            border: 1.5px solid #e8e8e8;
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.98rem;
            color: var(--text-dark);
            background: #fafafa;
            transition: border-color 0.25s, box-shadow 0.25s;
            outline: none;
            width: 100%;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(0, 168, 89, 0.1);
            background: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 130px;
        }

        .contact-submit-btn-wrap {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .contact-submit-btn-wrap .btn {
            flex-shrink: 0;
        }

        .form-success-msg {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 20px;
            background: rgba(0, 168, 89, 0.08);
            border: 1px solid rgba(0, 168, 89, 0.2);
            border-radius: 12px;
            color: #047a3c;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .form-success-msg i {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        @media (max-width: 1024px) {
            .contact-main-grid {
                grid-template-columns: 1fr;
            }

            .contact-info-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .contact-page {
                padding: 120px 0 70px;
            }

            .form-row-2 {
                grid-template-columns: 1fr;
            }

            .contact-form-box,
            .contact-left {
                padding: 30px 24px;
            }
            .contact-info-card{
                text-align:left;
            }
        }
    </style>
@endsection

@section('content')
    <section class="contact-page">
        <div class="container">

            {{-- Page Header --}}
            <div style="text-align:center; margin-bottom: 50px;">
                <!-- <span
                    style="display:inline-block; padding:7px 18px; background:rgba(0,168,89,0.1); color:var(--primary-green); border-radius:50px; font-size:0.82rem; font-weight:700; text-transform:uppercase; letter-spacing:2px; margin-bottom:16px;">Get
                    In Touch</span> -->
                <h1 style="font-size:3rem; color:var(--text-dark); margin-bottom:14px;">Contact Us</h1>
                <p style="font-size:1.05rem; color:var(--text-gray); max-width:520px; margin:0 auto;">Have a question or want
                    to enquire about our products? <br>We're here to help.</p>
            </div>

            {{-- Info Cards --}}
            <div class="contact-info-cards">
                <div class="contact-info-card">
                    <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="ci-body">
                        <h4>Address</h4>
                        <p>Kamdevpur, Delhi Road,<br>Sugandha, Hooghly – 712102</p>
                    </div>
                </div>
                <div class="contact-info-card">
                    <div class="ci-icon"><i class="fas fa-envelope"></i></div>
                    <div class="ci-body">
                        <h4>E-mail</h4>
                        <p>
                            <a href="mailto:okaypoly2009@gmail.com">okaypoly2009@gmail.com</a><br>
                            <a href="mailto:support@okpolytech.in">support@okpolytech.in</a>
                        </p>
                    </div>
                </div>
                <div class="contact-info-card">
                    <div class="ci-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="ci-body">
                        <h4>Phone</h4>
                        <p><a href="tel:+918584912729">+91 85849 12729</a></p>
                    </div>
                </div>
            </div>

            {{-- Main Grid --}}
            <div class="contact-main-grid">

                {{-- Left: Details --}}
                {{-- <div class="contact-left">
                    <span class="section-tag">📍 Find Us</span>
                    <h2>We'd Love to Hear From You</h2>
                    <p>Whether you have a question about our products, need pricing information, or want to discuss a bulk
                        order — our team is ready to help.</p>

                    <div class="contact-detail-list">
                        <div class="contact-detail-item">
                            <div class="cd-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h5>Address</h5>
                                <p>Kamdevpur, Delhi Road, Sugandha,<br>Hooghly – 712102, West Bengal</p>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="cd-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h5>Email Us</h5>
                                <p>
                                    <a href="mailto:okaypoly2009@gmail.com">okaypoly2009@gmail.com</a><br>
                                    <a href="mailto:support@okpolytech.in">support@okpolytech.in</a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="cd-icon"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <h5>Call Us</h5>
                                <p><a href="tel:+918584912729">+91 85849 12729</a></p>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="cd-icon"><i class="fas fa-clock"></i></div>
                            <div>
                                <h5>Business Hours</h5>
                                <p>Monday – Saturday: 9:00 AM – 6:00 PM<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- Right: Form --}}
                <div class="contact-form-box">
                    <h3>Send Us a Message</h3>
                    <p>Fill out the form below and we'll get back to you as soon as possible.</p>

                    @if (session('contact_success'))
                        <div class="form-success-msg">
                            <i class="fas fa-check-circle"></i>
                            {{ session('contact_success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="form-success-msg"
                            style="background:rgba(227,30,36,0.08); border-color:rgba(227,30,36,0.2); color:#c0392b;">
                            <i class="fas fa-exclamation-circle"></i>
                            Please fix the errors below and try again.
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form-inner">
                        @csrf
                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="full_name">Full Name <span style="color:var(--primary-red)">*</span></label>
                                <input type="text" id="full_name" name="full_name" placeholder="Your full name"
                                    value="{{ old('full_name') }}" required>
                                @error('full_name')
                                    <span style="color:var(--primary-red);font-size:0.82rem;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address <span style="color:var(--primary-red)">*</span></label>
                                <input type="email" id="email" name="email" placeholder="your@email.com"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span style="color:var(--primary-red);font-size:0.82rem;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="+91 XXXXX XXXXX"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" placeholder="How can we help?"
                                    value="{{ old('subject') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span style="color:var(--primary-red)">*</span></label>
                            <textarea id="message" name="message" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <span style="color:var(--primary-red);font-size:0.82rem;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="contact-submit-btn-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
@endsection
