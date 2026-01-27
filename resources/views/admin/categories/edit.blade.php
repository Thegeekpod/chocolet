@extends('layouts.admin')

@section('title', 'Edit Category - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Category </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Details</h4>
                    <form class="forms-sample" action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category->name }}" placeholder="Name" required>
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
                            @if ($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="current image"
                                        style="width: 100px; border-radius: 10px;">
                                    <p class="text-muted small">Current Image</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_visible_on_home" value="1"
                                    {{ $category->is_visible_on_home ? 'checked' : '' }}> Visible on Home Page <i
                                    class="input-helper"></i></label>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Cancel</a>
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
