@extends('layouts.admin')

@section('title', 'Products - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Products </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('admin.products.create') }}" class="btn btn-gradient-primary btn-fw">Add Product</a>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Products</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Category </th>
                                    <th> Home Visible </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="py-1">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="image" />
                                            @else
                                                <img src="{{ asset('admin-assets/images/faces/face1.jpg') }}"
                                                    alt="image" />
                                            @endif
                                        </td>
                                        <td> {{ $product->name }} </td>
                                        <td> {{ $product->category->name }} </td>
                                        <td>
                                            @if ($product->is_visible_on_home)
                                                <label class="badge badge-success">Visible</label>
                                            @else
                                                <label class="badge badge-secondary">Hidden</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
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
