@extends('layouts.admin')

@section('title', 'Gallery Management - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Gallery </h3>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload New Image</h4>
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title (Optional)</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Image Title">
                        </div>
                        <div class="form-group">
                            <label>Image Upload</label>
                            <input type="file" name="image" class="file-upload-default" id="galleryImageInput"
                                style="display:none" required>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                        onclick="document.getElementById('galleryImageInput').click();">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Gallery Images</h4>
                    <div class="row">
                        @forelse($images as $image)
                            <div class="col-md-4 mb-4">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded"
                                        style="height: 150px; width: 100%; object-fit: cover;">
                                    <div class="mt-2 text-center">
                                        <p class="small text-muted mb-1">{{ $image->title ?? 'Untitled' }}</p>
                                        <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger px-3"
                                                onclick="return confirm('Delete this image?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-muted">No images found in gallery.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('galleryImageInput').onchange = function() {
            this.parentElement.querySelector('.file-upload-info').value = this.files[0].name;
        };
    </script>
@endsection
