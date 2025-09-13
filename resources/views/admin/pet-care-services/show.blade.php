@extends('admin.layouts.app')

@section('title', 'View Pet Care Service')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pet Care Service Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pet-care-services.edit', $petCareService) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.pet-care-services.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">Name:</th>
                                    <td>{{ $petCareService->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug:</th>
                                    <td><code>{{ $petCareService->slug }}</code></td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $petCareService->description }}</td>
                                </tr>
                                <tr>
                                    <th>Link:</th>
                                    <td>
                                        @if($petCareService->link)
                                            <a href="{{ $petCareService->service_link }}" target="_blank" class="text-primary">
                                                {{ $petCareService->link }}
                                            </a>
                                        @else
                                            <span class="text-muted">No link set</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sort Order:</th>
                                    <td>{{ $petCareService->sort_order }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <span class="badge {{ $petCareService->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $petCareService->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created:</th>
                                    <td>{{ $petCareService->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated:</th>
                                    <td>{{ $petCareService->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <h5>Service Icon</h5>
                                @if($petCareService->icon)
                                    <img src="{{ asset($petCareService->icon) }}" alt="{{ $petCareService->name }}" 
                                         class="img-fluid rounded border" style="max-width: 200px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 200px; height: 200px; margin: 0 auto;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
