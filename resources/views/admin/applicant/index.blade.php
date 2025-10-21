@extends('layouts.admin')

@section('title', 'Admin Dashboard - TESDA')
@section('page-title', 'Applicants Management')

@section('content')
<div class="container">
    <h1 class="mb-3">Applications @if($status) — {{ ucfirst($status) }} @endif</h1>

    <div class="mb-2">
        <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-outline-secondary">All</a>
        <a href="{{ route('admin.applications.index', ['status'=>'pending']) }}" class="btn btn-sm btn-outline-secondary">Pending</a>
        <a href="{{ route('admin.applications.index', ['status'=>'approved']) }}" class="btn btn-sm btn-outline-secondary">Approved</a>
        <a href="{{ route('admin.applications.index', ['status'=>'rejected']) }}" class="btn btn-sm btn-outline-secondary">Rejected</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Title of Assessment</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th style="width:180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($apps as $app)
                        <tr>
                            <td>{{ $app->user?->name ?? '—' }}</td>
                            <td>{{ $app->title_of_assessment_applied_for }}</td>
                            <td>
                                @php $map=['pending'=>'secondary','approved'=>'success','rejected'=>'danger']; @endphp
                                <span class="badge bg-{{ $map[$app->status] ?? 'secondary' }}">{{ ucfirst($app->status) }}</span>
                            </td>
                            <td>{{ $app->created_at?->toDayDateTimeString() }}</td>
                            <td>
                                <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-sm btn-outline-primary">View</a>
                                @if($app->status === \App\Models\Application::STATUS_PENDING)
                                    <form method="POST" action="{{ route('admin.applications.approve', $app) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Approve this application?')">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.applications.reject', $app) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Reject this application?')">Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center p-4">No applications found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $apps->withQueryString()->links() }}</div>
    </div>
</div>
@endsection