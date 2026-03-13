@extends('layouts.admin')

@section('title', 'SEO Settings - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> SEO Settings </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('admin.seo.create') }}" class="btn btn-gradient-primary btn-fw">Add SEO Setting</a>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All SEO Settings</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Page URL </th>
                                    <th> Meta Title </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seos as $seo)
                                    <tr>
                                        <td> {{ $seo->page_url }} </td>
                                        <td> {{ $seo->meta_title }} </td>
                                        <td>
                                            <a href="{{ route('admin.seo.edit', $seo->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
