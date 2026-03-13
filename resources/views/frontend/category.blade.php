@extends('layouts.frontend')

@section('title', $category->name . ' - Chocolet')

@section('content')
    <section class="products-section padding">
        <div class="container">
            <div class="section-header">
                <span class="category">Category Collection</span>
                <h2 class="section-title">{{ $category->name }}</h2>
            </div>

            <div class="products-grid">
                @forelse ($products as $product)
                    <a href="{{ url('/product/' . $product->slug) }}" class="product-item">
                        <div class="product-image-wrapper">
                            <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="product-image" />
                        </div>
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p>{{ $product->tagline }}</p>
                    </a>
                @empty
                    <div class="no-products">
                        <p>No products found in this category.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
