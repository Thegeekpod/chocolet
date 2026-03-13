@extends('layouts.frontend')

@section('title', 'Gallery - Chocolet')

@section('content')
    <section class="gallery-section gallery-section-padding">
        <div class="container">
            <div class="section-header">
                <span class="category">Sweet Moments</span>
                <h2 class="section-title">Our Gallery</h2>
            </div>
            <div class="gallery-grid gallery-grid-custom">
                @forelse($images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title ?? 'Gallery Image' }}"
                        class="gallery-img-custom">
                @empty
                    <div class="no-products text-center w-100">
                        <p>No gallery images uploaded yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
