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
                @foreach ($products as $product)
                    <a href="{{ url('/product/' . $product->slug) }}" class="product-item">
                        <div class="product-image-wrapper">
                            <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="product-image" />
                        </div>
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p>{{ $product->tagline }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
