@extends('layouts.admin')

@section('title', 'Dashboard - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>

    {{-- Stat Cards --}}
    <div class="row">

        {{-- Total Categories --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle" />
                    <h4 class="font-weight-normal mb-3">
                        Total Categories
                        <i class="mdi mdi-format-list-bulleted mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalCategories }}</h2>
                    <a href="{{ route('admin.categories.index') }}" class="text-white text-decoration-none">
                        <h6 class="card-text">View all categories →</h6>
                    </a>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle" />
                    <h4 class="font-weight-normal mb-3">
                        Total Products
                        <i class="mdi mdi-shopping mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalProducts }}</h2>
                    <a href="{{ route('admin.products.index') }}" class="text-white text-decoration-none">
                        <h6 class="card-text">View all products →</h6>
                    </a>
                </div>
            </div>
        </div>

        {{-- Contact Inquiries --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle" />
                    <h4 class="font-weight-normal mb-3">
                        Contact Inquiries
                        <i class="mdi mdi-email-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalInquiries }}</h2>
                    <a href="{{ route('admin.contacts.index') }}" class="text-white text-decoration-none">
                        <h6 class="card-text">
                            @if ($unreadInquiries > 0)
                                {{ $unreadInquiries }} unread message{{ $unreadInquiries > 1 ? 's' : '' }} →
                            @else
                                No unread messages
                            @endif
                        </h6>
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Links --}}
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quick Actions</h4>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-gradient-info text-white">
                            <i class="mdi mdi-plus me-1"></i> Add Category
                        </a>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-gradient-danger text-white">
                            <i class="mdi mdi-plus me-1"></i> Add Product
                        </a>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-gradient-success text-white">
                            <i class="mdi mdi-email-outline me-1"></i> View Inquiries
                            @if ($unreadInquiries > 0)
                                <span class="badge badge-light text-dark ms-1">{{ $unreadInquiries }}</span>
                            @endif
                        </a>
                        <a href="{{ route('admin.settings.edit') }}" class="btn btn-sm btn-gradient-primary text-white">
                            <i class="mdi mdi-settings me-1"></i> Site Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
