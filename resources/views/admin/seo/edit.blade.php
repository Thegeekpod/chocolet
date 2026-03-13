@extends('layouts.admin')

@section('title', 'Edit SEO Setting - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit SEO Setting </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.seo.update', $seo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="page_url">Page URL</label>
                            <input type="text" class="form-control" id="page_url" name="page_url"
                                value="{{ $seo->page_url }}" required>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{ $seo->meta_title }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="4">{{ $seo->meta_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="other_scripts">Other Scripts / Tags</label>
                            <textarea class="form-control" id="other_scripts" name="other_scripts" rows="6">{{ $seo->other_scripts }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="{{ route('admin.seo.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
