@extends('layouts.admin')

@section('title', 'Contact Inquiries - Chocolet Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-email-outline"></i>
            </span> Contact Inquiries
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Inquiries</li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">All Inquiries</h4>
                        <span class="badge badge-warning text-white p-2">
                            {{ \App\Models\ContactInquiry::where('is_read', false)->count() }} Unread
                        </span>
                    </div>

                    @if ($inquiries->count() === 0)
                        <div class="text-center py-5">
                            <i class="mdi mdi-email-open-outline" style="font-size:3rem; color:#ccc;"></i>
                            <p class="text-muted mt-2">No contact inquiries yet.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inquiries as $inquiry)
                                        <tr style="{{ !$inquiry->is_read ? 'font-weight:600; background:#f8fff4;' : '' }}">
                                            <td>{{ $inquiry->id }}</td>
                                            <td>{{ $inquiry->full_name }}</td>
                                            <td>{{ $inquiry->email }}</td>
                                            <td>{{ $inquiry->phone ?? '—' }}</td>
                                            <td>{{ $inquiry->subject ? \Str::limit($inquiry->subject, 30) : '—' }}</td>
                                            <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                                            <td>
                                                @if ($inquiry->is_read)
                                                    <span class="badge badge-success">Read</span>
                                                @else
                                                    <span class="badge badge-warning text-white">Unread</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.contacts.show', $inquiry) }}"
                                                    class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="mdi mdi-eye"></i> View
                                                </a>
                                                <form action="{{ route('admin.contacts.destroy', $inquiry) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Delete this inquiry?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $inquiries->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
