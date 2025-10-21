@extends('layouts.admin')

@section('title', 'Manage Assessors - TESDA Admin')
@section('page-title', 'Assessors Management')

@section('content')
    <div class="row">
        <!-- Assessors Table -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="card shadow mb-4 w-75">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Assessors</h6>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createAssessorModal">
                        <i class="bi bi-plus"></i> Add New
                    </button>
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
        @include('admin.components.create-assessor-modal')
@endsection

