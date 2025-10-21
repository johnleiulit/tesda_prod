<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }
    public function indexAssessors()
    {
    $assessors = User::where('role', 'assessor')->get();
    return view('admin.assessor.index', compact('assessors'));
    }

    public function indexApplicants()
    {
        return redirect()->route('admin.applications.index');
    }

    public function dashboard()
    {
        $assessors = User::where('role', 'assessor')->get();
        $applicants = User::where('role', 'applicant')->get();

        return view('admin.dashboard', compact('assessors', 'applicants'));
    }

    public function createAssessor()
    {
        return view('admin.assessor.index');
    }

    public function storeAssessor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'assessor',
        ]);


        return redirect()->route('admin.assessors.index')->with('success', 'Assessor created successfully.');
    }

    // 
    public function listApplications(Request $request)
    {
    $status = $request->query('status');
    $apps = Application::query()
        ->with('user:id,name') // optional
        ->when($status, fn($q) => $q->where('status', $status))
        ->latest()
        ->paginate(15);

    return view('admin.applicant.index', compact('apps','status'));
    }

    public function showApplication(Application $application)
    {
        $application->load(['user','workExperiences','trainings','licensureExams','competencyAssessments']);
        return view('admin.applicant.view', compact('application'));
    }

    public function approveApplication(Application $application, Request $request)
    {
        if ($application->status !== Application::STATUS_PENDING) {
            return back()->with('warning', 'Only pending applications can be approved.');
    }

    DB::transaction(function () use ($application, $request) {
        $application->update([
            'status' => Application::STATUS_APPROVED,
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
            'review_remarks' => $request->input('remarks'),
        ]);
    });

    return redirect()->route('admin.applications.show', $application)->with('success', 'Application approved.');
    }

    public function rejectApplication(Application $application, Request $request)
    {
    if ($application->status !== Application::STATUS_PENDING) {
        return back()->with('warning', 'Only pending applications can be rejected.');
    }

    $request->validate(['remarks' => ['nullable','string','max:500']]);

    DB::transaction(function () use ($application, $request) {
        $application->update([
            'status' => Application::STATUS_REJECTED,
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
            'review_remarks' => $request->input('remarks'),
        ]);
    });

    return redirect()->route('admin.applications.show', $application)->with('success', 'Application rejected.');
    }

}
