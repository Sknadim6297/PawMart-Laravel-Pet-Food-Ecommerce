@extends('admin.layouts.app')

@section('title', 'View Testimonial')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Testimonial Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Testimonials
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Testimonial Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Client Name</label>
                                        <p class="form-control-plaintext">{{ $testimonial->client_name }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Designation</label>
                                        <p class="form-control-plaintext">{{ $testimonial->designation ?: 'N/A' }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Message</label>
                                        <p class="form-control-plaintext">{{ $testimonial->message }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Rating</label>
                                        <p class="form-control-plaintext">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa-solid fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Client Image</label>
                                        <div>
                                            @if($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Client Image" class="img-fluid rounded-circle" style="max-width: 180px; max-height: 180px; object-fit: cover;">
                                            @else
                                                <p class="text-muted">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Settings & Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Sort Order</label>
                                        <p class="form-control-plaintext">{{ $testimonial->sort_order }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Active Status</label>
                                        <p class="form-control-plaintext">
                                            @if($testimonial->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Created At</label>
                                        <p class="form-control-plaintext">{{ $testimonial->created_at->format('M d, Y H:i') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Updated At</label>
                                        <p class="form-control-plaintext">{{ $testimonial->updated_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
