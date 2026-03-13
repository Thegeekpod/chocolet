@extends('layouts.frontend')

@section('title', $product->name . ' - Chocolet')

@section('content')
    <section class="product-single-section">
        <div class="container">
            <div class="product-single-grid">
                <!-- Product Image & Gallery -->
                <div class="product-visual-column">
                    <div class="swiper product-main-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-image-display">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="main-img">
                                </div>
                            </div>
                            @if ($product->gallery)
                                @foreach ($product->gallery as $img)
                                    <div class="swiper-slide">
                                        <div class="product-image-display">
                                            <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" class="main-img">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @if ($product->gallery && count($product->gallery) > 0)
                        <div class="swiper product-thumbs-swiper mt-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="gallery-item-thumb">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Main image thumb">
                                    </div>
                                </div>
                                @foreach ($product->gallery as $img)
                                    <div class="swiper-slide">
                                        <div class="gallery-item-thumb">
                                            <img src="{{ asset('storage/' . $img) }}" alt="Gallery image thumb">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product info -->
                <div class="product-info-wrapper">
                    <span class="product-category-tag">{{ $product->category->name }}</span>
                    <h1 class="product-single-title">{{ $product->name }}</h1>
                    <p class="product-single-description">
                        {{ $product->description }}
                    </p>
                    <hr style="{{ $product->long_description ? '' : 'margin-bottom: 30px;' }}" />
                    <div class="product-long-description mt-4">
                        {!! $product->long_description !!}
                    </div>

                    <div class="product-actions mt-5">
                        <a href="{{ url('/contact') }}" class="btn btn-primary">
                            Inquiry Now <i class="fas fa-paper-plane"></i>
                        </a>
                        <a href="{{ url('/products') }}" class="btn btn-secondary">
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if ($relatedProducts->count() > 0)
        <section class="products-section" style="background: #fdfdfd; padding: 100px 0;">
            <div class="container">
                <div class="section-header">
                    <span class="category">More Sweetness</span>
                    <h2 class="section-title">Related Products</h2>
                </div>
                <div class="products-grid">
                    @foreach ($relatedProducts as $related)
                        <div class="product-item">
                            <div class="product-image-wrapper">
                                <img loading="lazy" src="{{ asset('storage/' . $related->image) }}"
                                    alt="{{ $related->name }}" class="product-image" />
                            </div>
                            <h3 class="product-name">{{ $related->name }}</h3>
                            <a href="{{ url('/product/' . $related->slug) }}" class="product-cta">View Details</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var thumbsSwiper = new Swiper(".product-thumbs-swiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });

            var mainSwiper = new Swiper(".product-main-swiper", {
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                thumbs: {
                    swiper: thumbsSwiper,
                },
            });
        });
    </script>
@endsection
