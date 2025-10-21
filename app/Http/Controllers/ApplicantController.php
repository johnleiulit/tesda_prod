<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use Illuminate\Support\Facades\DB;


class ApplicantController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:applicant');
    // }

    public function dashboard()
    {
         $applications = Application::where('user_id', auth()->id())
        ->latest()
        ->get(['id','title_of_assessment_applied_for','surname','firstname','middlename','name_extension', 'status']);

        return view('applicant.dashboard', compact('applications'));
    }


    // Show the application form
    public function create()
    {
        return view('applicant.apply');
    }
    // Store the application
    public function store(StoreApplicationRequest $request)
    {
    DB::transaction(function () use ($request) {
        $application = Application::create(array_merge(
            $request->safe()->except(['work_experiences','trainings','licensure_exams','competency_assessments']),
            ['user_id' => $request->user()->id,
             'status' => Application::STATUS_PENDING,
            ],
        ));

        foreach ($request->input('work_experiences', []) as $exp) {
            $application->workExperiences()->create($exp);
        }
        foreach ($request->input('trainings', []) as $t) {
            $application->trainings()->create($t);
        }
        foreach ($request->input('licensure_exams', []) as $e) {
            $application->licensureExams()->create($e);
        }
        foreach ($request->input('competency_assessments', []) as $c) {
            $application->competencyAssessments()->create($c);
        }
    });

    return redirect()->route('applicant.dashboard')->with('success', 'Application submitted.');
    }

    public function show(Application $application)
    {
        abort_unless($application->user_id === auth()->id(), 403);

        $application->load(['workExperiences','trainings','licensureExams','competencyAssessments']);
        return view('applicant.application-show', compact('application'));
    }
}
