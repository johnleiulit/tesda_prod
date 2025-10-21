{{-- resources/views/applicant/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Applicant Dashboard</h1>
            <a href="{{ route('applicant.apply.create') }}" class="btn btn-primary">Apply</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($applications->isEmpty())
            <div class="alert alert-info">You have no submitted applications yet.</div>
        @else
            <div class="card">
                <div class="card-header">My Applications</div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Title of Assessment</th>
                                <th>Full Name</th>
                                <th>Status</th>
                                <th style="width:120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $app)
                                <tr>
                                    <td>{{ $app->title_of_assessment_applied_for }}</td>
                                    <td>
                                        {{ $app->surname }},
                                        {{ $app->firstname }}
                                        @if ($app->middlename)
                                            {{ $app->middlename }}
                                        @endif
                                        @if ($app->name_extension)
                                            {{ $app->name_extension }}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $map = [
                                                'pending' => 'secondary',
                                                'approved' => 'success',
                                                'rejected' => 'danger',
                                            ];
                                            $badge = $map[$app->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ ucfirst($app->status) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('applicant.applications.show', $app->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
