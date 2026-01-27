@extends('layouts.admin')

@section('title', 'Site Settings - Chocolet Admin')

@section('styles')
    <style>
        .repeater-item {
            border: 1px solid #ebedf2;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            position: relative;
            background: #fcfcfc;
        }

        .repeater-item .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .preview-img {
            max-height: 80px;
            display: block;
            margin-top: 5px;
            border: 1px solid #ddd;
            padding: 2px;
        }
    </style>
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Site Settings </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Header, Footer & Home Content</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="settingTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#general">General</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#hero">Hero Section</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#about">About Section</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#stats">Stats & Featured</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#brands">Brands</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#why">Why Choose Us</a></li>
                    </ul>

                    <form class="forms-sample mt-4" action="{{ route('admin.settings.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="settingTabContent">

                            <!-- General Tab -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_name">Site Name</label>
                                            <input type="text" class="form-control" id="site_name" name="site_name"
                                                value="{{ $setting->site_name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Header Logo</label>
                                            <input type="file" name="logo" class="form-control">
                                            @if ($setting->logo)
                                                <img src="{{ asset('storage/' . $setting->logo) }}" class="preview-img">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Footer Logo</label>
                                            <input type="file" name="footer_logo" class="form-control">
                                            @if ($setting->footer_logo)
                                                <img src="{{ asset('storage/' . $setting->footer_logo) }}"
                                                    class="preview-img">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="footer_text">Footer Description</label>
                                    <textarea class="form-control" id="footer_text" name="footer_text" rows="4">{{ $setting->footer_text }}</textarea>
                                </div>

                                <h4 class="card-title mt-4">Contact Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Email</label><input type="email"
                                                class="form-control" name="contact_email"
                                                value="{{ $setting->contact_email }}"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Phone</label><input type="text"
                                                class="form-control" name="contact_phone"
                                                value="{{ $setting->contact_phone }}"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label>Address</label>
                                    <textarea class="form-control" name="address" rows="2">{{ $setting->address }}</textarea>
                                </div>

                                <h4 class="card-title mt-4">Social Links</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Facebook</label><input type="text"
                                                class="form-control" name="facebook_url"
                                                value="{{ $setting->facebook_url }}"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Instagram</label><input type="text"
                                                class="form-control" name="instagram_url"
                                                value="{{ $setting->instagram_url }}"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Twitter</label><input type="text"
                                                class="form-control" name="twitter_url"
                                                value="{{ $setting->twitter_url }}"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hero Tab -->
                            <div class="tab-pane fade" id="hero" role="tabpanel">
                                <div class="form-group"><label>Hero Subheading</label><input type="text"
                                        class="form-control" name="hero_subheading"
                                        value="{{ $setting->hero_subheading }}"></div>
                                <div class="form-group"><label>Hero Title</label><input type="text"
                                        class="form-control" name="hero_title" value="{{ $setting->hero_title }}"></div>
                                <div class="form-group"><label>Hero Description</label>
                                    <textarea class="form-control" name="hero_description" rows="3">{{ $setting->hero_description }}</textarea>
                                </div>

                                <hr>
                                <h5 class="mb-3">Hero Slides</h5>
                                <div id="hero-slides-container">
                                    @if ($setting->hero_slides)
                                        @foreach ($setting->hero_slides as $index => $slide)
                                            <div class="repeater-item">
                                                <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                    onclick="this.parentElement.remove()">Remove</button>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Background Image</label>
                                                            <input type="file"
                                                                name="hero_slides_files[{{ $index }}][bg]"
                                                                class="form-control">
                                                            <input type="hidden"
                                                                name="hero_slides[{{ $index }}][bg]"
                                                                value="{{ $slide['bg'] }}">
                                                            <img src="{{ asset('storage/' . $slide['bg']) }}"
                                                                class="preview-img">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Product Image</label>
                                                            <input type="file"
                                                                name="hero_slides_files[{{ $index }}][prod]"
                                                                class="form-control">
                                                            <input type="hidden"
                                                                name="hero_slides[{{ $index }}][prod]"
                                                                value="{{ $slide['prod'] }}">
                                                            <img src="{{ asset('storage/' . $slide['prod']) }}"
                                                                class="preview-img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-info btn-sm" onclick="addHeroSlide()">+ Add
                                    Slide</button>
                            </div>

                            <!-- About Tab -->
                            <div class="tab-pane fade" id="about" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>About Label</label><input type="text"
                                                class="form-control" name="about_label"
                                                value="{{ $setting->about_label }}"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>About Title</label><input type="text"
                                                class="form-control" name="about_title"
                                                value="{{ $setting->about_title }}"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label>About Description 1</label>
                                    <textarea class="form-control" name="about_description_1" rows="3">{{ $setting->about_description_1 }}</textarea>
                                </div>
                                <div class="form-group"><label>About Description 2</label>
                                    <textarea class="form-control" name="about_description_2" rows="3">{{ $setting->about_description_2 }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>About Image</label>
                                            <input type="file" name="about_image" class="form-control">
                                            @if ($setting->about_image)
                                                <img src="{{ asset('storage/' . $setting->about_image) }}"
                                                    class="preview-img" style="max-height: 150px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Years Stat</label><input type="text"
                                                class="form-control" name="about_years"
                                                value="{{ $setting->about_years }}"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Countries Stat</label><input type="text"
                                                class="form-control" name="about_countries"
                                                value="{{ $setting->about_countries }}"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Tab -->
                            <div class="tab-pane fade" id="stats" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Stat 1 Val</label><input type="text"
                                                class="form-control" name="stat_1_val"
                                                value="{{ $setting->stat_1_val }}"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group"><label>Stat 1 Text</label><input type="text"
                                                class="form-control" name="stat_1_text"
                                                value="{{ $setting->stat_1_text }}"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Stat 2 Val</label><input type="text"
                                                class="form-control" name="stat_2_val"
                                                value="{{ $setting->stat_2_val }}"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group"><label>Stat 2 Text</label><input type="text"
                                                class="form-control" name="stat_2_text"
                                                value="{{ $setting->stat_2_text }}"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Stat 3 Val</label><input type="text"
                                                class="form-control" name="stat_3_val"
                                                value="{{ $setting->stat_3_val }}"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group"><label>Stat 3 Text</label><input type="text"
                                                class="form-control" name="stat_3_text"
                                                value="{{ $setting->stat_3_text }}"></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group"><label>Featured Products Title</label><input type="text"
                                        class="form-control" name="featured_products_title"
                                        value="{{ $setting->featured_products_title }}"></div>

                                <h5 class="mb-3">Featured Carousel Items</h5>
                                <div id="featured-products-container">
                                    @if ($setting->featured_products_json)
                                        @foreach ($setting->featured_products_json as $index => $item)
                                            <div class="repeater-item">
                                                <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                    onclick="this.parentElement.remove()">Remove</button>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>BG Image</label>
                                                            <input type="file"
                                                                name="feat_files[{{ $index }}][bg]"
                                                                class="form-control">
                                                            <input type="hidden" name="feat[{{ $index }}][bg]"
                                                                value="{{ $item['bg'] }}">
                                                            <img src="{{ asset('storage/' . $item['bg']) }}"
                                                                class="preview-img">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Logo Image</label>
                                                            <input type="file"
                                                                name="feat_files[{{ $index }}][logo]"
                                                                class="form-control">
                                                            <input type="hidden" name="feat[{{ $index }}][logo]"
                                                                value="{{ $item['logo'] }}">
                                                            <img src="{{ asset('storage/' . $item['logo']) }}"
                                                                class="preview-img">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Product Image</label>
                                                            <input type="file"
                                                                name="feat_files[{{ $index }}][prod]"
                                                                class="form-control">
                                                            <input type="hidden" name="feat[{{ $index }}][prod]"
                                                                value="{{ $item['prod'] }}">
                                                            <img src="{{ asset('storage/' . $item['prod']) }}"
                                                                class="preview-img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-info btn-sm" onclick="addFeaturedProduct()">+ Add
                                    Item</button>
                            </div>

                            <!-- Brands Tab -->
                            <div class="tab-pane fade" id="brands" role="tabpanel">
                                <h5 class="mb-3">Brand Categories Management</h5>
                                <div id="brands-container">
                                    @if ($setting->brands_data)
                                        @foreach ($setting->brands_data as $slug => $brand)
                                            <div class="repeater-item">
                                                <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                    onclick="this.parentElement.remove()">Remove</button>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label>Title</label><input type="text"
                                                                name="brands[{{ $loop->index }}][title]"
                                                                class="form-control" value="{{ $brand['title'] ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Main Image</label>
                                                            <input type="file"
                                                                name="brand_main_files[{{ $loop->index }}]"
                                                                class="form-control">
                                                            <input type="hidden"
                                                                name="brands[{{ $loop->index }}][main_img]"
                                                                value="{{ $brand['main_img'] ?? '' }}">
                                                            @if (isset($brand['main_img']))
                                                                <img src="{{ asset('storage/' . $brand['main_img']) }}"
                                                                    class="preview-img">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group"><label>Description</label>
                                                            <textarea name="brands[{{ $loop->index }}][desc]" class="form-control" rows="2">{{ $brand['desc'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Custom Link</label>
                                                            <input type="text"
                                                                name="brands[{{ $loop->index }}][link]"
                                                                class="form-control" value="{{ $brand['link'] ?? '' }}"
                                                                placeholder="/products or https://...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6>Logo Grid (Max 5)</h6>
                                                <div class="row">
                                                    @for ($l = 0; $l < 5; $l++)
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    name="brand_logos_files[{{ $loop->index }}][{{ $l }}]"
                                                                    class="form-control">
                                                                <input type="hidden"
                                                                    name="brands[{{ $loop->index }}][logos][{{ $l }}]"
                                                                    value="{{ $brand['logos'][$l] ?? '' }}">
                                                                @if (isset($brand['logos'][$l]) && $brand['logos'][$l])
                                                                    <img src="{{ asset('storage/' . $brand['logos'][$l]) }}"
                                                                        class="preview-img">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-info btn-sm" onclick="addBrand()">+ Add Brand
                                    Category</button>
                            </div>

                            <!-- Why Choose Us Tab -->
                            <div class="tab-pane fade" id="why" role="tabpanel">
                                <div class="form-group"><label>Section Title</label><input type="text"
                                        class="form-control" name="why_title" value="{{ $setting->why_title }}"></div>
                                <hr>
                                <h5>Features</h5>
                                <div id="why-features-container">
                                    @if ($setting->why_features)
                                        @foreach ($setting->why_features as $index => $feature)
                                            <div class="repeater-item">
                                                <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                    onclick="this.parentElement.remove()">Remove</button>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group"><label>Icon (FontAwesome)</label><input
                                                                type="text" name="why[{{ $index }}][icon]"
                                                                class="form-control"
                                                                value="{{ $feature['icon'] ?? '' }}"></div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group"><label>Title</label><input type="text"
                                                                name="why[{{ $index }}][title]"
                                                                class="form-control"
                                                                value="{{ $feature['title'] ?? '' }}"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label>Description</label>
                                                    <textarea name="why[{{ $index }}][desc]" class="form-control" rows="2">{{ $feature['desc'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-info btn-sm" onclick="addWhyFeature()">+ Add
                                    Feature</button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary me-2">Save All Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let heroIndex = {{ $setting->hero_slides ? count($setting->hero_slides) : 0 }};
        let featIndex = {{ $setting->featured_products_json ? count($setting->featured_products_json) : 0 }};
        let brandIndex = {{ $setting->brands_data ? count($setting->brands_data) : 0 }};
        let whyIndex = {{ $setting->why_features ? count($setting->why_features) : 0 }};

        function addHeroSlide() {
            let html = `
            <div class="repeater-item">
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Background Image</label>
                            <input type="file" name="hero_slides_files[${heroIndex}][bg]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="hero_slides_files[${heroIndex}][prod]" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>`;
            document.getElementById('hero-slides-container').insertAdjacentHTML('beforeend', html);
            heroIndex++;
        }

        function addFeaturedProduct() {
            let html = `
            <div class="repeater-item">
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><label>BG Image</label><input type="file" name="feat_files[${featIndex}][bg]" class="form-control" required></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label>Logo Image</label><input type="file" name="feat_files[${featIndex}][logo]" class="form-control" required></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label>Product Image</label><input type="file" name="feat_files[${featIndex}][prod]" class="form-control" required></div>
                    </div>
                </div>
            </div>`;
            document.getElementById('featured-products-container').insertAdjacentHTML('beforeend', html);
            featIndex++;
        }

        function addBrand() {
            let logosHtml = '';
            for (let l = 0; l < 5; l++) {
                logosHtml +=
                    `<div class="col-md-2"><div class="form-group"><input type="file" name="brand_logos_files[${brandIndex}][${l}]" class="form-control"></div></div>`;
            }
            let html = `
            <div class="repeater-item">
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="row">
                    <div class="col-md-6"><div class="form-group"><label>Title</label><input type="text" name="brands[${brandIndex}][title]" class="form-control" required></div></div>
                    <div class="col-md-6"><div class="form-group"><label>Main Image</label><input type="file" name="brand_main_files[${brandIndex}]" class="form-control" required></div></div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group"><label>Description</label><textarea name="brands[${brandIndex}][desc]" class="form-control" rows="2"></textarea></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label>Custom Link</label><input type="text" name="brands[${brandIndex}][link]" class="form-control" placeholder="/products"></div>
                    </div>
                </div>
                <h6>Logo Grid (Max 5)</h6>
                <div class="row">${logosHtml}</div>
            </div>`;
            document.getElementById('brands-container').insertAdjacentHTML('beforeend', html);
            brandIndex++;
        }

        function addWhyFeature() {
            let html = `
            <div class="repeater-item">
                <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="this.parentElement.remove()">Remove</button>
                <div class="row">
                    <div class="col-md-4"><div class="form-group"><label>Icon (FontAwesome)</label><input type="text" name="why[${whyIndex}][icon]" class="form-control" placeholder="fas fa-check"></div></div>
                    <div class="col-md-8"><div class="form-group"><label>Title</label><input type="text" name="why[${whyIndex}][title]" class="form-control"></div></div>
                </div>
                <div class="form-group"><label>Description</label><textarea name="why[${whyIndex}][desc]" class="form-control" rows="2"></textarea></div>
            </div>`;
            document.getElementById('why-features-container').insertAdjacentHTML('beforeend', html);
            whyIndex++;
        }
    </script>
@endsection
