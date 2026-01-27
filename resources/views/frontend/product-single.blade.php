@extends('layouts.frontend')

@section('title', $product->name . ' - Chocolet')

@section('content')
    <section class="product-single-section">
        <div class="container">
            <div class="product-single-grid">
                <!-- Product Image -->
                <div class="product-image-display">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="main-img">
                </div>

                <!-- Product info -->
                <div class="product-info-wrapper">
                    <span class="product-category-tag">{{ $product->category->name }}</span>
                    <h1 class="product-single-title">{{ $product->name }}</h1>
                    <p class="product-single-description">
                        {{ $product->description }}
                    </p>

                    <div class="product-spec-grid">
                        <div class="spec-item">
                            <h4>Weight</h4>
                            <p>{{ $product->weight }}</p>
                        </div>
                        <div class="spec-item">
                            <h4>Ingredients</h4>
                            <p>{{ $product->ingredients }}</p>
                        </div>
                        <div class="spec-item">
                            <h4>Shelf Life</h4>
                            <p>{{ $product->shelf_life }}</p>
                        </div>
                        <div class="spec-item">
                            <h4>Storage</h4>
                            <p>{{ $product->storage }}</p>
                        </div>
                    </div>

                    <div class="product-actions">
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
