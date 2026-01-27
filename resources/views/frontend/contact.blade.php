@extends('layouts.frontend')

@section('title', 'Contact Us - Chocolet')

@section('content')
    <section class="contact-section contact-section-padding">
        <div class="container">
            <div class="section-header">
                <span class="category">Get In Touch</span>
                <h2 class="section-title">Contact Us</h2>
            </div>
            <div class="contact-grid contact-grid-custom">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p>We'd love to hear from you! Whether you have a question about our products, exports, or anything
                        else, our team is ready to answer all your questions.</p>
                    <div class="contact-item contact-item-mb-20">
                        <strong>Address:</strong>
                        <p>Chocolet India, Main Street, Confectionery Zone</p>
                    </div>
                    <div class="contact-item contact-item-mb-20">
                        <strong>Phone:</strong>
                        <p>+91 XXX XXX XXXX</p>
                    </div>
                    <div class="contact-item contact-item-mb-20">
                        <strong>Email:</strong>
                        <p>info@chocolet.com</p>
                    </div>
                </div>
                <div class="contact-form-wrapper">
                    <form action="#" method="POST" class="contact-form-custom">
                        <input type="text" placeholder="Your Name" class="contact-input-custom">
                        <input type="email" placeholder="Your Email" class="contact-input-custom">
                        <textarea placeholder="Your Message" rows="5" class="contact-textarea-custom"></textarea>
                        <button type="submit" class="btn btn-primary contact-submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
