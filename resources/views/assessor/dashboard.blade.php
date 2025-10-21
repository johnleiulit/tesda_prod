@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Assessor Dashboard</h2>
            <p>Welcome, {{ Auth::user()->name }}!</p>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Assessments</h5>
                            <h3>0</h3>
                            <p class="text-muted">Applications waiting for your review</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Completed Assessments</h5>
                            <h3>0</h3>
                            <p class="text-muted">Total assessments completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">This Month</h5>
                            <h3>0</h3>
                            <p class="text-muted">Assessments this month</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Recent Activities</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">No recent activities to display.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection