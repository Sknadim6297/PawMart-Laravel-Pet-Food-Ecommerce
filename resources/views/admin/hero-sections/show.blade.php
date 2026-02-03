@extends('admin.layouts.app')

@section('title', 'Hero Section Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Hero Section Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Hero Sections
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Hero Section Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="150"><strong>Title:</strong></td>
                                            <td>{{ $heroSection->title }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Subtitle:</strong></td>
                                            <td>{{ $heroSection->subtitle }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Button Text:</strong></td>
                                            <td>{{ $heroSection->button_text }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Button Link:</strong></td>
                                            <td>
                                                @if($heroSection->button_link)
                                                    <a href="{{ $heroSection->button_link }}" target="_blank">
                                                        {{ $heroSection->button_link }}
                                                        <i class="fas fa-external-link-alt ms-1"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">No link set</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sort Order:</strong></td>
                                            <td>{{ $heroSection->sort_order }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if($heroSection->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created:</strong></td>
                                            <td>{{ $heroSection->created_at->format('F d, Y \a\t h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $heroSection->updated_at->format('F d, Y \a\t h:i A') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @if($heroSection->image)
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Hero Image</h5>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/' . $heroSection->image) }}" 
                                         alt="{{ $heroSection->title }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 300px; object-fit: cover;">
                                </div>
                            </div>
                            @endif

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Edit Hero Section
                                        </a>
                                        <form action="{{ route('admin.hero-sections.destroy', $heroSection) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this hero section?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">
                                                <i class="fas fa-trash"></i> Delete Hero Section
                                            </button>
                                        </form>
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