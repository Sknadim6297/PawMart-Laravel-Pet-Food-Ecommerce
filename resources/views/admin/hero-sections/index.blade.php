@extends('admin.layouts.app')

@section('title', 'Hero Sections Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Hero Sections</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Hero Section
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Button Text</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($heroSections as $heroSection)
                                <tr>
                                    <td>{{ $heroSection->id }}</td>
                                    <td>
                                        @if($heroSection->image)
                                            <img src="{{ asset('storage/' . $heroSection->image) }}" 
                                                 alt="Hero Image" 
                                                 class="img-thumbnail" 
                                                 style="width: 60px; height: 40px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($heroSection->title, 30) }}</td>
                                    <td>{{ Str::limit($heroSection->subtitle, 40) }}</td>
                                    <td>{{ $heroSection->button_text }}</td>
                                    <td>{{ $heroSection->sort_order }}</td>
                                    <td>
                                        @if($heroSection->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.hero-sections.show', $heroSection) }}" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" 
                                               class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.hero-sections.destroy', $heroSection) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this hero section?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-image fa-3x mb-3 d-block"></i>
                                        No hero sections found. 
                                        <a href="{{ route('admin.hero-sections.create') }}">Create your first hero section</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection