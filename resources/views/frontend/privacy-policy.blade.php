@extends('layouts.frontend')

@section('title', 'Privacy Policy - Okay Polytech Pvt. Ltd.')

@section('styles')
    <style>
        .privacy-page {
            padding: 140px 0 100px;
            background: #fbfbfd;
        }

        .privacy-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 50px;
        }

        .privacy-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            background: rgba(0, 168, 89, 0.1);
            color: var(--primary-green, #00a859);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .privacy-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .privacy-header p {
            color: #6c757d;
            font-size: 1.05rem;
        }

        .privacy-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 50px 60px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            max-width: 960px;
            margin: 0 auto;
            border: 1px solid rgba(0, 0, 0, 0.04);
            line-height: 1.8;
            color: #444a57;
        }

        .privacy-card h2 {
            font-size: 1.45rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-top: 36px;
            margin-bottom: 14px;
            position: relative;
            padding-left: 16px;
        }

        .privacy-card h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 4px;
            bottom: 4px;
            width: 4px;
            background: var(--primary-green, #00a859);
            border-radius: 4px;
        }

        .privacy-card h2:first-of-type {
            margin-top: 0;
        }

        .privacy-card p {
            margin-bottom: 16px;
            font-size: 1rem;
        }

        .privacy-card ul {
            margin: 0 0 20px 24px;
            padding: 0;
        }

        .privacy-card ul li {
            margin-bottom: 10px;
            list-style-type: disc;
        }

        .privacy-contact-box {
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px 30px;
            margin-top: 30px;
            border: 1px solid #e9ecef;
        }

        .privacy-contact-box p {
            margin-bottom: 8px;
        }

        .privacy-contact-box p:last-child {
            margin-bottom: 0;
        }

        .privacy-contact-box a {
            color: var(--primary-green, #00a859);
            text-decoration: none;
            font-weight: 600;
        }

        .privacy-contact-box a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .privacy-page {
                padding: 110px 0 60px;
            }

            .privacy-header h1 {
                font-size: 2rem;
            }

            .privacy-card {
                padding: 30px 22px;
                border-radius: 18px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="privacy-page">
        <div class="container">
            <div class="privacy-header">
                <span class="privacy-tag"><i class="fas fa-shield-alt"></i> Transparency & Trust</span>
                <h1>Privacy Policy</h1>
                <p>Last updated: {{ date('F d, Y') }}</p>
            </div>

            <div class="privacy-card">
                <h2>1. Introduction</h2>
                <p>
                    Welcome to <strong>Okay Polytech Pvt. Ltd.</strong> ("we," "our," or "us"). We are committed to protecting your personal information and your right to privacy. This Privacy Policy governs your visit to our website and explains how we collect, safeguard, and disclose information resulting from your use of our services.
                </p>

                <h2>2. Information We Collect</h2>
                <p>We may collect information about you in a variety of ways when you interact with our website:</p>
                <ul>
                    <li><strong>Personal Contact Information:</strong> Name, email address, phone number, and any inquiry message details you provide through our contact forms or customer support channels.</li>
                    <li><strong>Technical and Usage Data:</strong> IP address, browser type, operating system, referring URLs, device information, and pages visited to help us optimize site performance and security.</li>
                    <li><strong>Cookies and Tracking Technologies:</strong> Information gathered via cookies to recognize returning visitors, maintain preferences, and analyze general site traffic.</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We use the information we collect for legitimate business purposes, including:</p>
                <ul>
                    <li>Responding to your product inquiries, sample requests, and partnership proposals.</li>
                    <li>Improving our website functionality, product offerings, and user experience.</li>
                    <li>Protecting our website, network, and users against unauthorized access, fraud, spam, and cyber threats.</li>
                    <li>Complying with applicable legal and statutory regulations.</li>
                </ul>

                <h2>4. Cookies and Web Beacons</h2>
                <p>
                    Our website may use standard cookies to improve your browsing experience. You can choose to disable cookies through your individual browser settings; however, doing so may affect some site features and functionality.
                </p>

                <h2>5. Data Security</h2>
                <p>
                    We implement appropriate administrative, technical, and physical security measures to safeguard your personal data from unauthorized access, loss, alteration, or disclosure. While we make every reasonable effort to protect your information, no internet transmission or electronic storage method can guarantee complete absolute security.
                </p>

                <h2>6. Sharing of Information</h2>
                <p>
                    We do not sell, rent, trade, or otherwise share your personal identification information with outside parties. We may disclose information only when required by law or to protect the rights, property, and safety of Okay Polytech Pvt. Ltd. and our users.
                </p>

                <h2>7. Third-Party Links</h2>
                <p>
                    Our website may contain links to external sites (such as social networks or partner sites). We are not responsible for the privacy practices or content of third-party websites. We encourage you to review their respective privacy policies.
                </p>

                <h2>8. Changes to This Privacy Policy</h2>
                <p>
                    We may update our Privacy Policy periodically to reflect changes in our operational or regulatory requirements. We will post the revised version on this page with an updated "Last updated" date.
                </p>

                <h2>9. Contact Us</h2>
                <p>
                    If you have questions, feedback, or concerns regarding this Privacy Policy or how your personal information is handled, please reach out to us:
                </p>

                <div class="privacy-contact-box">
                    <p><strong>Okay Polytech Pvt. Ltd.</strong></p>
                    <p><i class="fas fa-map-marker-alt" style="color: var(--primary-green, #00a859); width: 20px;"></i> Kamdevpur, Delhi Road, Sugandha, Hooghly – 712102, West Bengal, India</p>
                    <p><i class="fas fa-envelope" style="color: var(--primary-green, #00a859); width: 20px;"></i> <a href="mailto:support@okpolytech.in">support@okpolytech.in</a> / <a href="mailto:okaypoly2009@gmail.com">okaypoly2009@gmail.com</a></p>
                    <p><i class="fas fa-phone" style="color: var(--primary-green, #00a859); width: 20px;"></i> <a href="tel:+918584912729">+91 85849 12729</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
