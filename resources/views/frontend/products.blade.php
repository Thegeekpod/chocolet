@extends('layouts.frontend')

@section('title', 'Our Products - Chocolet')

@section('content')
    <section class="products-section padding">
        <div class="container">
            <div class="section-header">
                <span class="category">Our Collection</span>
                <h2 class="section-title">All Products</h2>
            </div>
            <div class="products-grid">
                <!-- Full list of products can go here -->
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/bravo.png" alt="Bravo"
                            class="product-image" />
                    </div>
                    <h3 class="product-name">Dark Bravo</h3>
                    <p>Rich dark chocolate</p>
                </a>
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/juicy-jelly.png"
                            alt="Juicy Jelly" class="product-image" />
                    </div>
                    <h3 class="product-name">Juicy Jelly</h3>
                    <p>Real fruit jelly</p>
                </a>
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/dayrio.png" alt="Dayrio"
                            class="product-image" />
                    </div>
                    <h3 class="product-name">Dayrio</h3>
                    <p>Mixed berry treat</p>
                </a>
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/07/coco-1.png" alt="Coco"
                            class="product-image" />
                    </div>
                    <h3 class="product-name">Coco Delight</h3>
                    <p>Creamy coconut candy</p>
                </a>
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/imly.png" alt="Imly"
                            class="product-image" />
                    </div>
                    <h3 class="product-name">Imly Candy</h3>
                    <p>Tangy tamarind</p>
                </a>
                <a href="{{ url('/product-detail') }}" class="product-item">
                    <div class="product-image-wrapper">
                        <img loading="lazy" src="https://sr25.in/wp-content/uploads/2025/06/rollaa.png" alt="Rollaa"
                            class="product-image" />
                    </div>
                    <h3 class="product-name">Rollaa Lollipop</h3>
                    <p>Fruity lollipop</p>
                </a>
            </div>
        </div>
    </section>
@endsection
