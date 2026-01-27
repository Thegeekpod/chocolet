@extends('layouts.admin')

@section('title', 'Categories - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Categories </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient-primary btn-fw">Add Category</a>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Categories</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Slug </th>
                                    <th> Home Visible </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="py-1">
                                            @if ($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}" alt="image" />
                                            @else
                                                <img src="{{ asset('admin-assets/images/faces/face1.jpg') }}"
                                                    alt="image" />
                                            @endif
                                        </td>
                                        <td> {{ $category->name }} </td>
                                        <td> {{ $category->slug }} </td>
                                        <td>
                                            @if ($category->is_visible_on_home)
                                                <label class="badge badge-success">Visible</label>
                                            @else
                                                <label class="badge badge-secondary">Hidden</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST" style="display:inline-block;">
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
