<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\WorkExperience;
use App\Models\Training;
use App\Models\LicensureExam;
use App\Models\CompetencyAssessment;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_of_assessment_applied_for',
        'surname',
        'firstname',
        'middlename',
        'middleinitial',
        'name_extension',
        'region_code',
        'region_name',
        'province_code',
        'province_name',
        'city_code',
        'city_name',
        'barangay_code',
        'barangay_name',
        'district',
        'street_address',
        'zip_code',
        'mothers_name',
        'fathers_name',
        'sex',
        'civil_status',
        'mobile',
        'email',
        'highest_educational_attainment',
        'employment_status',
        'birthdate',
        'birthplace',
        'age',
        'status',
        'reviewed_by',
        'reviewed_at',
        'review_remarks'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    public function licensureExams(): HasMany
    {
        return $this->hasMany(LicensureExam::class);
    }

    public function competencyAssessments(): HasMany
    {
        return $this->hasMany(CompetencyAssessment::class);
    }

    // public function dashboard()
    // {
    // $application = Application::with([
    //     'workExperiences',
    //     'trainings',
    //     'licensureExams',
    //     'competencyAssessments',
    // ])->where('user_id', auth()->id())
    //   ->latest()
    //   ->first();

    // return view('applicant.dashboard', compact('application'));
    // }

   // 🔖 Status constants
    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];
}
