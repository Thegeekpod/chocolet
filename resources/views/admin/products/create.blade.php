@extends('layouts.admin')

@section('title', 'Add Product - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Add Product </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

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
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="Name"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                        name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tagline">Tagline</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline"
                                        placeholder="Tagline">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                placeholder="Product Short Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Long Description</label>
                            <textarea class="form-control" id="long_description" name="long_description" rows="10"
                                placeholder="Detailed Product Description"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="features">Features (comma separated)</label>
                                    <input type="text" class="form-control" id="features" name="features"
                                        placeholder="Premium, Dark, Organic">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Main Image upload <span class="text-muted small">(500×600 px, transparent
                                    PNG)</span></label>
                            <input type="file" name="image"
                                class="file-upload-default @error('image') is-invalid @enderror" id="imageInput"
                                style="display:none">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control file-upload-info @error('image') is-invalid @enderror" disabled
                                    placeholder="Upload Main Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                        onclick="document.getElementById('imageInput').click();">Upload</button>
                                </span>
                            </div>
                            @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Product Gallery <span class="text-muted small">(Multiple images)</span></label>
                            <input type="file" name="gallery[]"
                                class="file-upload-default @error('gallery.*') is-invalid @enderror" id="galleryInput"
                                style="display:none" multiple>
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control file-upload-info @error('gallery.*') is-invalid @enderror" disabled
                                    placeholder="Upload Gallery Images">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                        onclick="document.getElementById('galleryInput').click();">Upload</button>
                                </span>
                            </div>
                            @error('gallery.*')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_visible_on_home"
                                    value="1"> Visible on Home Page <i class="input-helper"></i></label>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#long_description'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById('imageInput').onchange = function() {
            this.parentElement.querySelector('.file-upload-info').value = this.files[0].name;
        };

        document.getElementById('galleryInput').onchange = function() {
            let files = this.files;
            let fileNames = [];
            for (let i = 0; i < files.length; i++) {
                fileNames.push(files[i].name);
            }
            this.parentElement.querySelector('.file-upload-info').value = fileNames.join(', ');
        };
    </script>
@endsection
