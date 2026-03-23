@extends('admin.layouts.app')

@section('title', 'Welcome Sections Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Welcome Sections</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.welcome-sections.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Welcome Section
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
                                    <th>Description</th>
                                    <th>Button Text</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($welcomeSections as $welcomeSection)
                                <tr>
                                    <td>{{ $welcomeSection->id }}</td>
                                    <td>
                                        @if($welcomeSection->image)
                                            <img src="{{ asset('storage/' . $welcomeSection->image) }}" 
                                                 alt="Welcome Image" 
                                                 class="img-thumbnail" 
                                                 style="width: 60px; height: 40px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($welcomeSection->title, 30) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($welcomeSection->description, 40) }}</td>
                                    <td>{{ $welcomeSection->button_text }}</td>
                                    <td>{{ $welcomeSection->sort_order }}</td>
                                    <td>
                                        @if($welcomeSection->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.welcome-sections.show', $welcomeSection) }}" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.welcome-sections.edit', $welcomeSection) }}" 
                                               class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.welcome-sections.destroy', $welcomeSection) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this welcome section?')">
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
                                        <i class="fas fa-home fa-3x mb-3 d-block"></i>
                                        No welcome sections found. 
                                        <a href="{{ route('admin.welcome-sections.create') }}">Create your first welcome section</a>
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