@extends('admin.layouts.app')

@section('title', 'View Welcome Section')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Welcome Section Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.welcome-sections.edit', $welcomeSection) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.welcome-sections.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Welcome Sections
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Welcome Section Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <p class="form-control-plaintext">{{ $welcomeSection->title }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <p class="form-control-plaintext">{{ $welcomeSection->description }}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Button Text</label>
                                                <p class="form-control-plaintext">{{ $welcomeSection->button_text ?: 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Button Link</label>
                                                <p class="form-control-plaintext">
                                                    @if($welcomeSection->button_link)
                                                        <a href="{{ $welcomeSection->button_link }}" target="_blank" class="text-decoration-none">
                                                            {{ $welcomeSection->button_link }} <i class="fas fa-external-link-alt ms-1"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Welcome Image</label>
                                        <div>
                                            @if($welcomeSection->image)
                                                <img src="{{ asset('storage/' . $welcomeSection->image) }}" 
                                                     alt="Welcome Image" 
                                                     class="img-fluid rounded" 
                                                     style="max-width: 300px; max-height: 200px; object-fit: cover;">
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
                                        <p class="form-control-plaintext">{{ $welcomeSection->sort_order }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Active Status</label>
                                        <p class="form-control-plaintext">
                                            @if($welcomeSection->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Created At</label>
                                        <p class="form-control-plaintext">{{ $welcomeSection->created_at->format('M d, Y H:i') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Updated At</label>
                                        <p class="form-control-plaintext">{{ $welcomeSection->updated_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body text-center">
                                    <a href="{{ route('admin.welcome-sections.edit', $welcomeSection) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit Welcome Section
                                    </a>
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