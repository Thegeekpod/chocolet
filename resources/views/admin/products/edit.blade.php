@extends('layouts.admin')

@section('title', 'Edit Product - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Product </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tagline">Tagline</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline"
                                        value="{{ $product->tagline }}" placeholder="Tagline">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Weight Options</label>
                                    <input type="text" class="form-control" id="weight" name="weight"
                                        value="{{ $product->weight }}" placeholder="e.g. 100g / 250g">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="features">Features (comma separated)</label>
                                    <input type="text" class="form-control" id="features" name="features"
                                        value="{{ $product->features ? implode(', ', $product->features) : '' }}"
                                        placeholder="Premium, Dark, Organic">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="shelf_life">Shelf Life</label>
                                    <input type="text" class="form-control" id="shelf_life" name="shelf_life"
                                        value="{{ $product->shelf_life }}" placeholder="12 Months">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="storage">Storage</label>
                                    <input type="text" class="form-control" id="storage" name="storage"
                                        value="{{ $product->storage }}" placeholder="Cool & Dry Place">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ingredients">Ingredients</label>
                                    <input type="text" class="form-control" id="ingredients" name="ingredients"
                                        value="{{ $product->ingredients }}" placeholder="Cocoa Mass, Sugar">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Image upload</label>
                            <input type="file" name="image" class="file-upload-default" id="imageInput"
                                style="display:none">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                        onclick="document.getElementById('imageInput').click();">Upload</button>
                                </span>
                            </div>
                            @if ($product->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="current image"
                                        style="width: 100px; border-radius: 10px;">
                                    <p class="text-muted small">Current Image</p>
                                </div>
                            @endif
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_visible_on_home" value="1"
                                    {{ $product->is_visible_on_home ? 'checked' : '' }}> Visible on Home Page <i
                                    class="input-helper"></i></label>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('imageInput').onchange = function() {
            this.parentElement.querySelector('.file-upload-info').value = this.files[0].name;
        };
    </script>
@endsection
