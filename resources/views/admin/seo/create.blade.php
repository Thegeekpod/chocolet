@extends('layouts.admin')

@section('title', 'Add SEO Setting - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Add SEO Setting </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.seo.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="page_url">Page URL (Full URL or relative path like /about)</label>
                            <input type="text" class="form-control" id="page_url" name="page_url"
                                placeholder="e.g. /about or https://example.com/products" required>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                placeholder="Meta Title">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="4"
                                placeholder="Meta Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="other_scripts">Other Scripts / Tags (e.g. Google Analytics, Pixel)</label>
                            <textarea class="form-control" id="other_scripts" name="other_scripts" rows="6"
                                placeholder="Paste scripts here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ route('admin.seo.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
