@extends('admin.layouts.app')

@section('title', 'Edit Statistic')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Statistic</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Statistics
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.statistics.update', $statistic) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Statistic Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title *</label>
                                            <input type="text" 
                                                   class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" 
                                                   name="title" 
                                                   value="{{ old('title', $statistic->title) }}" 
                                                   required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="number" class="form-label">Number *</label>
                                                    <input type="number" 
                                                           class="form-control @error('number') is-invalid @enderror" 
                                                           id="number" 
                                                           name="number" 
                                                           value="{{ old('number', $statistic->number) }}" 
                                                           min="0"
                                                           required>
                                                    @error('number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="suffix" class="form-label">Suffix</label>
                                                    <input type="text" 
                                                           class="form-control @error('suffix') is-invalid @enderror" 
                                                           id="suffix" 
                                                           name="suffix" 
                                                           value="{{ old('suffix', $statistic->suffix) }}" 
                                                           maxlength="10"
                                                           placeholder="e.g., +, %, k, M">
                                                    @error('suffix')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="icon" class="form-label">Icon Image</label>
                                            @if($statistic->icon)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $statistic->icon) }}" alt="Current Icon" class="img-thumbnail" style="max-width: 100px;">
                                                    <p class="text-muted small">Current Icon</p>
                                                </div>
                                            @endif
                                            <input type="file" 
                                                   class="form-control @error('icon') is-invalid @enderror" 
                                                   id="icon" 
                                                   name="icon" 
                                                   accept="image/*">
                                            @error('icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Upload JPG, PNG, GIF, SVG (Max: 2MB). Leave empty to keep current icon.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="sort_order" class="form-label">Sort Order</label>
                                            <input type="number" 
                                                   class="form-control @error('sort_order') is-invalid @enderror" 
                                                   id="sort_order" 
                                                   name="sort_order" 
                                                   value="{{ old('sort_order', $statistic->sort_order) }}" 
                                                   min="0">
                                            @error('sort_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Lower numbers appear first</div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       {{ old('is_active', $statistic->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Active Status
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update Statistic
                                        </button>
                                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection