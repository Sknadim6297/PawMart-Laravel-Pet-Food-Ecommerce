@extends('admin.layouts.app')

@section('title', 'Statistics')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Statistics Management</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Statistic
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Number</th>
                                <th>Suffix</th>
                                <th>Sort Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($statistics as $statistic)
                            <tr>
                                <td>{{ $statistic->id }}</td>
                                <td>
                                    @if($statistic->icon)
                                        <img src="{{ asset('storage/' . $statistic->icon) }}" alt="Icon" class="img-thumbnail" style="max-width: 40px; max-height: 40px;">
                                    @else
                                        <span class="text-muted">No icon</span>
                                    @endif
                                </td>
                                <td>{{ $statistic->title }}</td>
                                <td>{{ number_format($statistic->number) }}</td>
                                <td><span class="badge badge-secondary">{{ $statistic->suffix }}</span></td>
                                <td>{{ $statistic->sort_order }}</td>
                                <td>
                                    @if($statistic->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.statistics.show', $statistic) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.statistics.edit', $statistic) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this statistic?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-chart-bar fa-3x mb-3 d-block"></i>
                                    No statistics found. 
                                    <a href="{{ route('admin.statistics.create') }}">Create your first statistic</a>
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
@endsection