@extends('layouts.admin')

@section('title', 'Inquiry from ' . $contact->full_name . ' - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-email-open-outline"></i>
            </span> Inquiry Detail
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Contact Inquiries</a></li>
                <li class="breadcrumb-item active" aria-current="page">#{{ $contact->id }}</li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h4 class="card-title mb-1">{{ $contact->full_name }}</h4>
                            <p class="text-muted mb-0" style="font-size:0.85rem;">
                                Received {{ $contact->created_at->format('d M Y \a\t h:i A') }}
                            </p>
                        </div>
                        <span class="badge {{ $contact->is_read ? 'badge-success' : 'badge-warning text-white' }} p-2">
                            {{ $contact->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <p class="text-muted mb-1"
                                style="font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Email</p>
                            <p class="mb-0"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="text-muted mb-1"
                                style="font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Phone</p>
                            <p class="mb-0">
                                @if ($contact->phone)
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <p class="text-muted mb-1"
                                style="font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Subject</p>
                            <p class="mb-0">{{ $contact->subject ?? '—' }}</p>
                        </div>
                    </div>

                    <hr style="border-color:#eee;">

                    <div class="mt-3">
                        <p class="text-muted mb-2" style="font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">
                            Message</p>
                        <div
                            style="background:#f9f9f9; border-radius:10px; padding:20px 24px; font-size:1rem; line-height:1.8; color:#333;">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 flex-wrap">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-sm btn-gradient-success text-white">
                            <i class="mdi mdi-reply"></i> Reply via Email
                        </a>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="mdi mdi-arrow-left"></i> Back to List
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Info sidebar --}}
        <div class="col-lg-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sender Info</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-3">
                            <span class="text-muted d-block" style="font-size:0.8rem;">Full Name</span>
                            <strong>{{ $contact->full_name }}</strong>
                        </li>
                        <li class="mb-3">
                            <span class="text-muted d-block" style="font-size:0.8rem;">Email</span>
                            <strong>{{ $contact->email }}</strong>
                        </li>
                        @if ($contact->phone)
                            <li class="mb-3">
                                <span class="text-muted d-block" style="font-size:0.8rem;">Phone</span>
                                <strong>{{ $contact->phone }}</strong>
                            </li>
                        @endif
                        <li class="mb-3">
                            <span class="text-muted d-block" style="font-size:0.8rem;">Submitted On</span>
                            <strong>{{ $contact->created_at->format('d M Y, h:i A') }}</strong>
                        </li>
                        <li>
                            <span class="text-muted d-block" style="font-size:0.8rem;">Status</span>
                            <span class="badge {{ $contact->is_read ? 'badge-success' : 'badge-warning text-white' }}">
                                {{ $contact->is_read ? '✓ Read' : '● Unread' }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
