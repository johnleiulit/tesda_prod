<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'applicant';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'title_of_assessment_applied_for' => ['required','string','max:255'],
            'surname' => ['required','string','max:255'],
            'firstname' => ['required','string','max:255'],
            'middlename' => ['nullable','string','max:255'],
            'middleinitial' => ['nullable','string','max:5'],
            'name_extension' => ['nullable','string','max:32'],

            'region_code' => ['required','string'],
            'region_name' => ['required','string'],
            'province_code' => ['required','string'],
            'province_name' => ['required','string'],
            'city_code' => ['required','string'],
            'city_name' => ['required','string'],
            'barangay_code' => ['required','string'],
            'barangay_name' => ['required','string'],
            'district' => ['nullable','string','max:255'],
            'street_address' => ['nullable','string','max:255'],
            'zip_code' => ['nullable','string','max:10'],

            'mothers_name' => ['nullable','string','max:255'],
            'fathers_name' => ['nullable','string','max:255'],
            'sex' => ['nullable','in:male,female,prefer_not_to_say'],
            'civil_status' => ['nullable','string','max:100'],
            'mobile' => ['nullable','string','max:32'],
            'email' => ['nullable','email'],

            'highest_educational_attainment' => ['nullable','string','max:255'],
            'employment_status' => ['nullable','string','max:255'],

            'birthdate' => ['nullable','date'],
            'birthplace' => ['nullable','string','max:255'],
            'age' => ['nullable','integer','min:0','max:120'],

            // Arrays
            'work_experiences' => ['array'],
            'work_experiences.*.company_name' => ['required_with:work_experiences','string','max:255'],
            'work_experiences.*.position' => ['nullable','string','max:255'],
            'work_experiences.*.date_from' => ['nullable','date'],
            'work_experiences.*.date_to' => ['nullable','date','after_or_equal:work_experiences.*.date_from'],
            'work_experiences.*.monthly_salary' => ['nullable','numeric'],
            'work_experiences.*.appointment_status' => ['nullable','string','max:255'],
            'work_experiences.*.years_experience' => ['nullable','integer','min:0'],

            'trainings' => ['array'],
            'trainings.*.title' => ['required_with:trainings','string','max:255'],
            'trainings.*.venue' => ['nullable','string','max:255'],
            'trainings.*.date_from' => ['nullable','date'],
            'trainings.*.date_to' => ['nullable','date','after_or_equal:trainings.*.date_from'],
            'trainings.*.hours' => ['nullable','integer','min:0'],
            'trainings.*.conducted_by' => ['nullable','string','max:255'],

            'licensure_exams' => ['array'],
            'licensure_exams.*.title' => ['required_with:licensure_exams','string','max:255'],
            'licensure_exams.*.year_taken' => ['nullable','digits:4'],
            'licensure_exams.*.exam_venue' => ['nullable','string','max:255'],
            'licensure_exams.*.rating' => ['nullable','string','max:255'],
            'licensure_exams.*.remarks' => ['nullable','string','max:255'],
            'licensure_exams.*.expiry_date' => ['nullable','date'],

            'competency_assessments' => ['array'],
            'competency_assessments.*.title' => ['required_with:competency_assessments','string','max:255'],
            'competency_assessments.*.qualification_level' => ['nullable','string','max:255'],
            'competency_assessments.*.industry_sector' => ['nullable','string','max:255'],
            'competency_assessments.*.certificate_number' => ['nullable','string','max:255'],
            'competency_assessments.*.date_of_issuance' => ['nullable','date'],
            'competency_assessments.*.expiration_date' => ['nullable','date'],
        ];
    }
}
