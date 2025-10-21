@extends('layouts.admin')

@section('title', 'Admin Dashboard - TESDA')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row">
    <!-- Stats Cards -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Assessors
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $assessors->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-badge fs-2 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Applicants
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $applicants->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-people fs-2 text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            NC Programs
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            0
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-book fs-2 text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Applications
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            0
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-clock fs-2 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.assessors.create') }}" class="btn btn-primary btn-block w-100">
                            <i class="bi bi-person-plus me-2"></i>
                            Create Assessor
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-success btn-block w-100" disabled>
                            <i class="bi bi-book-plus me-2"></i>
                            Add NC Program
                        </button>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-info btn-block w-100" disabled>
                            <i class="bi bi-file-earmark-text me-2"></i>
                            Generate Report
                        </button>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-warning btn-block w-100" disabled>
                            <i class="bi bi-gear me-2"></i>
                            System Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <!-- Assessors Table -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Recent Assessors</h6>
                <a href="{{ route('admin.assessors.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus"></i> Add New
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assessors->take(5) as $assessor)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle text-primary me-2"></i>
                                            {{ $assessor->name }}
                                        </div>
                                    </td>
                                    <td>{{ $assessor->email }}</td>
                                    <td>{{ $assessor->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        No assessors found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applicants -->
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Applicants</h6>
            </div>
            <div class="card-body">
                @forelse($applicants->take(5) as $applicant)
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <i class="bi bi-person-circle text-success fs-4"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">{{ $applicant->name }}</h6>
                            <small class="text-muted">{{ $applicant->email }}</small>
                        </div>
                        <div class="flex-shrink-0">
                            <small class="text-muted">{{ $applicant->created_at->format('M d') }}</small>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-people fs-1 d-block mb-2"></i>
                        No applicants yet
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard specific styles */
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.text-xs {
    font-size: 0.7rem;
}

.font-weight-bold {
    font-weight: 700 !important;
}

.text-gray-800 {
    color: #5a5c69 !important;
}

.shadow {
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
}

.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
</style> --}}
@endsection