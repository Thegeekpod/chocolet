// Wait for DOM to load
document.addEventListener('DOMContentLoaded', () => {

    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // --- Header Scroll Effect ---
    const header = document.querySelector('#main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // --- Hero Swiper Initialization ---
    const swiper = new Swiper('.hero-swiper', {
        effect: 'fade',
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        speed: 1000,
        fadeEffect: {
            crossFade: true
        },
        on: {
            init: function () {
                animateSlideContent(this.slides[this.activeIndex]);
            },
            slideChangeTransitionStart: function () {
                animateSlideContent(this.slides[this.activeIndex]);
            }
        }
    });

    function animateSlideContent(slide) {
        const product = slide.querySelector('.swiper-main');
        const cover = slide.querySelector('.slide-cover');

        gsap.fromTo(product,
            { y: 50, opacity: 0, scale: 0.8 },
            { y: 0, opacity: 1, scale: 1, duration: 1.5, ease: "expo.out" }
        );

        gsap.fromTo(cover,
            { scale: 1.2, opacity: 0 },
            { scale: 1, opacity: 1, duration: 2, ease: "power2.out" }
        );
    }

    // --- Hero Text Animations ---
    const tl = gsap.timeline({ defaults: { ease: "power4.out", duration: 1.2 } });

    tl.from(".subheading", {
        y: 30,
        opacity: 0,
        delay: 0.5
    })
        .from(".main-title", {
            y: 50,
            opacity: 0,
        }, "-=0.8")
        .from(".description", {
            y: 30,
            opacity: 0,
        }, "-=0.8")
        .from(".hero-btns .btn", {
            y: 20,
            opacity: 0,
            stagger: 0.2
        }, "-=0.8");

    // Sticky Nav Hover Micro-animation
    const navLinks = document.querySelectorAll('.nav-pill a');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', () => {
            gsap.to(link, { scale: 1.05, duration: 0.3 });
        });
        link.addEventListener('mouseleave', () => {
            gsap.to(link, { scale: 1, duration: 0.3 });
        });
    });

    // Background shapes slow movement
    gsap.to(".circle-1", {
        x: 20,
        y: 20,
        duration: 10,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });

    gsap.to(".circle-2", {
        x: -30,
        y: 10,
        duration: 15,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });


    // --- Products Swiper Initialization (Curve View) ---
    new Swiper('.products-swiper', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 5,
                coverflowEffect: {
                    rotate: 15,
                    stretch: 0,
                    depth: 150,
                    modifier: 1,
                }
            },
        },
    });

    // --- Brands Tab Switching Logic ---
    const brandData = window.brandsData || {};

    const pills = document.querySelectorAll('.category-pill');
    const brandTitle = document.getElementById('brand-title');
    const brandDesc = document.getElementById('brand-description');
    const brandImage = document.getElementById('brand-main-image');
    const brandLink = document.getElementById('brand-link');
    const logosGrid = document.getElementById('brand-logos-grid');

    if (pills.length > 0) {
        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                const category = pill.getAttribute('data-category');
                if (!brandData[category]) return;

                // Update active state
                pills.forEach(p => p.classList.remove('active'));
                pill.classList.add('active');

                // Animate content out
                gsap.to(['#brand-display-content', '#brand-logos-grid'], {
                    opacity: 0,
                    y: 20,
                    duration: 0.4,
                    onComplete: () => {
                        // Update content
                        const data = brandData[category];
                        if (brandTitle) brandTitle.textContent = data.title;
                        if (brandDesc) brandDesc.textContent = data.desc;
                        if (brandLink) brandLink.href = data.link || '/products';
                        if (brandImage) {
                            brandImage.src = `/storage/${data.main_img}`;
                            brandImage.alt = data.title;
                        }

                        // Update logos
                        if (logosGrid) {
                            logosGrid.innerHTML = '';
                            if (data.logos) {
                                data.logos.forEach(logoPath => {
                                    const logoCard = document.createElement('div');
                                    logoCard.className = 'logo-card';
                                    logoCard.innerHTML = `<img src="/storage/${logoPath}" alt="Brand Logo">`;
                                    logosGrid.appendChild(logoCard);
                                });
                            }
                        }

                        // Animate content in
                        gsap.to(['#brand-display-content', '#brand-logos-grid'], {
                            opacity: 1,
                            y: 0,
                            duration: 0.6,
                            stagger: 0.1,
                            ease: "power2.out"
                        });
                    }
                });
            });
        });
    }


    // --- About Section Animations ---
    const aboutSection = document.querySelector('.about-section');
    if (aboutSection) {
        // Visual Animation
        gsap.from(".about-visual .about-main-img", {
            scrollTrigger: {
                trigger: ".about-section",
                start: "top 70%",
            },
            y: 50,
            opacity: 0,
            duration: 1.2,
            ease: "power3.out"
        });

        gsap.from(".float-card", {
            scrollTrigger: {
                trigger: ".about-section",
                start: "top 60%",
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            delay: 0.5,
            ease: "back.out(1.7)"
        });

        // Content Animation
        gsap.from(".about-content > *", {
            scrollTrigger: {
                trigger: ".about-section",
                start: "top 70%",
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.1,
            ease: "power2.out"
        });

        // Number Counter Animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');

            ScrollTrigger.create({
                trigger: ".about-section",
                start: "top 70%",
                onEnter: () => {
                    gsap.to(counter, {
                        innerHTML: target,
                        duration: 2.5,
                        snap: { innerHTML: 1 },
                        ease: "power1.out",
                        onUpdate: function () {
                            counter.innerHTML = Math.ceil(this.targets()[0].innerHTML) + "+";
                        }
                    });
                },
                once: true
            });
        });
    }

    // --- Categories Section Animations ---
    const categoriesSection = document.querySelector('.categories-section');
    if (categoriesSection) {
        const categoryCards = document.querySelectorAll(".categories-grid .category-card");

        // Set initial state
        gsap.set(categoryCards, { opacity: 1, y: 0 });

        // Animate on scroll
        gsap.from(categoryCards, {
            scrollTrigger: {
                trigger: ".categories-section",
                start: "top 80%",
                toggleActions: "play none none none"
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.1,
            ease: "power2.out",
            clearProps: "all"
        });
    }

    // --- Our Products Section Animations ---
    const ourProductsSection = document.querySelector('.our-products-section');
    if (ourProductsSection) {
        const productItems = document.querySelectorAll(".product-item");

        // Set initial state
        gsap.set(productItems, { opacity: 1, y: 0 });

        // Animate on scroll
        gsap.from(productItems, {
            scrollTrigger: {
                trigger: ".our-products-section",
                start: "top 75%",
                toggleActions: "play none none none"
            },
            y: 60,
            opacity: 0,
            duration: 0.9,
            stagger: 0.15,
            ease: "power3.out",
            clearProps: "all"
        });
    }

    // --- Back to Top Button ---
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

});
