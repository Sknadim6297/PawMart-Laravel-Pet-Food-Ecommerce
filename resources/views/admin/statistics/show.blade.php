@extends('admin.layouts.app')

@section('title', 'View Statistic')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Statistic Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.statistics.edit', $statistic) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Statistics
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Statistic Information</h5>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-3">Title:</dt>
                                        <dd class="col-sm-9">{{ $statistic->title }}</dd>

                                        <dt class="col-sm-3">Number:</dt>
                                        <dd class="col-sm-9">{{ number_format($statistic->number) }}</dd>

                                        <dt class="col-sm-3">Suffix:</dt>
                                        <dd class="col-sm-9">
                                            <span class="badge badge-secondary">{{ $statistic->suffix }}</span>
                                        </dd>

                                        <dt class="col-sm-3">Display:</dt>
                                        <dd class="col-sm-9">
                                            <strong>{{ number_format($statistic->number) }}{{ $statistic->suffix }}</strong>
                                        </dd>

                                        <dt class="col-sm-3">Icon:</dt>
                                        <dd class="col-sm-9">
                                            @if($statistic->icon)
                                                <img src="{{ asset('storage/' . $statistic->icon) }}" alt="Icon" class="img-thumbnail" style="max-width: 100px;">
                                            @else
                                                <span class="text-muted">No icon uploaded</span>
                                            @endif
                                        </dd>

                                        <dt class="col-sm-3">Sort Order:</dt>
                                        <dd class="col-sm-9">{{ $statistic->sort_order }}</dd>

                                        <dt class="col-sm-3">Status:</dt>
                                        <dd class="col-sm-9">
                                            @if($statistic->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </dd>

                                        <dt class="col-sm-3">Created:</dt>
                                        <dd class="col-sm-9">{{ $statistic->created_at->format('M d, Y H:i') }}</dd>

                                        <dt class="col-sm-3">Updated:</dt>
                                        <dd class="col-sm-9">{{ $statistic->updated_at->format('M d, Y H:i') }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Preview</h5>
                                </div>
                                <div class="card-body text-center">
                                    <div class="count-text" style="padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
                                        @if($statistic->icon)
                                            <img alt="icon" src="{{ asset('storage/' . $statistic->icon) }}" style="max-width: 60px; margin-bottom: 15px;">
                                        @endif
                                        <div>
                                            <div class="d-flex justify-content-center">
                                                <h2 style="margin-bottom: 0; font-weight: bold;">{{ number_format($statistic->number) }}</h2>
                                                <span style="font-size: 1.2em; margin-left: 3px;">{{ $statistic->suffix }}</span>
                                            </div>
                                            <h3 style="margin-top: 10px; color: #666;">{{ $statistic->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body text-center">
                                    <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this statistic?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Delete Statistic
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
@endsection