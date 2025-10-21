<!-- resources/views/applicant/apply.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Application Form</h3>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('applicant.apply.store') }}">
                    @csrf

                    {{-- ASSESSMENT --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Assessment</h5>
                        {{-- <input type="text" class="form-control" name="title_of_assessment_applied_for"
                            placeholder="Title of Assessment" required> --}}
                        <select name="title_of_assessment_applied_for" class="form-select" reuired>
                            <option value="">Select Title of Assessment</option>
                            <option value="BOOKKEEPING NC III">BOOKKEEPING NC III</option>
                            <option value="EVENTS MANAGEMENT SERVICES NC III">EVENTS MANAGEMENT SERVICES NC III</option>
                            <option value="TOURISM PROMOTION SERVICES NC II">TOURISM PROMOTION SERVICES NC II</option>
                            <option value="PHARMACY SERVICES NC III">PHARMACY SERVICES NC III</option>
                            <option value="VISUAL GRAPHIC DESIGN NC III">VISUAL GRAPHIC DESIGN NC III</option>
                        </select>
                    </div>

                    {{-- PERSONAL INFORMATION --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Personal Information</h5>
                        <div class="row g-3">
                            <div class="col-md-3"><input type="text" class="form-control" name="surname"
                                    placeholder="Surname" required></div>
                            <div class="col-md-3"><input type="text" class="form-control" name="firstname"
                                    placeholder="First name" required></div>
                            <div class="col-md-3"><input type="text" class="form-control" name="middlename"
                                    placeholder="Middle name"></div>
                            <div class="col-md-3"><input type="text" class="form-control" name="middleinitial"
                                    placeholder="Middle initial"></div>
                            <div class="col-md-3"><input type="text" class="form-control" name="name_extension"
                                    placeholder="Name extension (Jr., Sr., etc.)"></div>
                        </div>
                    </div>

                    {{-- ADDRESS --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Address</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Region</label>
                                <select id="region" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Province</label>
                                <select id="province" class="form-select" disabled></select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">City/Municipality</label>
                                <select id="city" class="form-select" disabled></select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Barangay</label>
                                <select id="barangay" class="form-select" disabled></select>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-md-4"><input type="text" class="form-control" name="district"
                                    placeholder="District"></div>
                            <div class="col-md-4"><input type="text" class="form-control" name="street_address"
                                    placeholder="Number, Street, Purok"></div>
                            <div class="col-md-4"><input type="text" class="form-control" name="zip_code"
                                    placeholder="Zip Code"></div>
                        </div>

                        <!-- Hidden inputs -->
                        <input type="hidden" name="region_code" id="region_code">
                        <input type="hidden" name="region_name" id="region_name">
                        <input type="hidden" name="province_code" id="province_code">
                        <input type="hidden" name="province_name" id="province_name">
                        <input type="hidden" name="city_code" id="city_code">
                        <input type="hidden" name="city_name" id="city_name">
                        <input type="hidden" name="barangay_code" id="barangay_code">
                        <input type="hidden" name="barangay_name" id="barangay_name">
                    </div>

                    {{-- PARENTS --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Parents</h5>
                        <div class="row g-3">
                            <div class="col-md-6"><input type="text" class="form-control" name="mothers_name"
                                    placeholder="Mother's Name"></div>
                            <div class="col-md-6"><input type="text" class="form-control" name="fathers_name"
                                    placeholder="Father's Name"></div>
                        </div>
                    </div>

                    {{-- CONTACT & STATUS --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Contact & Status</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select name="sex" class="form-select">
                                    <option value="">Sex</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer_not_to_say">Prefer not to say</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                {{-- <input type="text" class="form-control" name="civil_status"
                                    placeholder="Civil Status"> --}}
                                <select name="civil_status" class="form-select">
                                    <option value="">Civil Status</option>
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="WIDOW/ER">WIDOW/ER</option>
                                    <option value="SEPARATED">SEPARATED</option>
                                </select>
                            </div>
                            <div class="col-md-3"><input type="text" class="form-control" name="mobile"
                                    placeholder="Mobile"></div>
                            <div class="col-md-3"><input type="email" class="form-control" name="email"
                                    placeholder="E-mail"></div>
                        </div>
                    </div>

                    {{-- EDUCATION & EMPLOYMENT --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Education & Employment</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                {{-- <input type="text" class="form-control"
                                    name="highest_educational_attainment" placeholder="Highest Educational Attainment"> --}}
                                <select name="highest_educational_attainment" class="form-select">
                                    <option value="">Highest Educational Attainment</option>
                                    <option value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
                                    <option value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE</option>
                                    <option value="TVET GRADUATE">TVET GRADUATE</option>
                                    <option value="COLLEGE LEVEL">COLLEGE LEVEL</option>
                                    <option value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
                                    <option value="MASTER'S DEGREE">MASTER'S DEGREE</option>
                                    <option value="DOCTORAL DEGREE">DOCTORAL DEGREE</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                {{-- <input type="text" class="form-control" name="employment_status"
                                    placeholder="Employment Status"> --}}
                                <select name="employment_status" class="form-select">
                                    <option value="">Employment Status</option>
                                    <option value="JOB ORDER">JOB ORDER</option>
                                    <option value="PROBATIONARY">PROBATIONARY</option>
                                    <option value="PERMANENT">PERMANENT</option>
                                    <option value="SELF-EMPLOYED">SELF-EMPLOYED</option>
                                    <option value="OFW">OFW</option>
                                    <option value="NONE">NONE</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- BIRTH --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Birth Information</h5>
                        <div class="row g-3">
                            <div class="col-md-4"><input type="date" class="form-control" name="birthdate"></div>
                            <div class="col-md-4"><input type="text" class="form-control" name="birthplace"
                                    placeholder="Birthplace"></div>
                            <div class="col-md-4"><input type="number" class="form-control" name="age"
                                    placeholder="Age" min="0" max="120"></div>
                        </div>
                    </div>

                    {{-- DYNAMIC SECTIONS --}}
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Work Experience</h5>
                        <div id="work-experiences" class="mb-2"></div>
                        <button type="button" id="add-work" class="btn btn-outline-primary btn-sm">+ Add Work
                            Experience</button>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Other Trainings / Seminars</h5>
                        <div id="trainings" class="mb-2"></div>
                        <button type="button" id="add-training" class="btn btn-outline-primary btn-sm">+ Add
                            Training</button>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Licensure Examinations</h5>
                        <div id="licensure-exams" class="mb-2"></div>
                        <button type="button" id="add-licensure" class="btn btn-outline-primary btn-sm">+ Add Licensure
                            Exam</button>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Competency Assessments</h5>
                        <div id="competency-assessments" class="mb-2"></div>
                        <button type="button" id="add-competency" class="btn btn-outline-primary btn-sm">+ Add
                            Competency Assessment</button>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // PSGC API base (community mirror): change if you prefer another source
        const PSGC_BASE = 'https://psgc.gitlab.io/api';

        const regionSelect = document.getElementById('region');
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const barangaySelect = document.getElementById('barangay');

        const regionCode = document.getElementById('region_code');
        const regionName = document.getElementById('region_name');
        const provinceCode = document.getElementById('province_code');
        const provinceName = document.getElementById('province_name');
        const cityCode = document.getElementById('city_code');
        const cityName = document.getElementById('city_name');
        const barangayCode = document.getElementById('barangay_code');
        const barangayName = document.getElementById('barangay_name');

        function setOptions(select, items, labelKey = 'name', valueKey = 'code') {
            select.innerHTML = '<option value="">Select...</option>';
            for (const item of items) {
                const opt = document.createElement('option');
                opt.value = item[valueKey];
                opt.textContent = item[labelKey];
                opt.dataset.name = item[labelKey];
                select.appendChild(opt);
            }
            select.disabled = false;
        }

        async function loadRegions() {
            const res = await fetch(`${PSGC_BASE}/regions/`);
            const data = await res.json();
            setOptions(regionSelect, data, 'regionName', 'code');
        }

        async function loadProvinces(regionCodeVal) {
            provinceSelect.disabled = true;
            citySelect.disabled = true;
            barangaySelect.disabled = true;
            provinceSelect.innerHTML = '';
            citySelect.innerHTML = '';
            barangaySelect.innerHTML = '';
            const res = await fetch(`${PSGC_BASE}/regions/${regionCodeVal}/provinces/`);
            const data = await res.json();
            setOptions(provinceSelect, data, 'name', 'code');
        }

        async function loadCities(provinceCodeVal) {
            citySelect.disabled = true;
            barangaySelect.disabled = true;
            citySelect.innerHTML = '';
            barangaySelect.innerHTML = '';
            const res = await fetch(`${PSGC_BASE}/provinces/${provinceCodeVal}/cities-municipalities/`);
            const data = await res.json();
            setOptions(citySelect, data, 'name', 'code');
        }

        async function loadBarangays(cityCodeVal) {
            barangaySelect.disabled = true;
            barangaySelect.innerHTML = '';
            const res = await fetch(`${PSGC_BASE}/cities-municipalities/${cityCodeVal}/barangays/`);
            const data = await res.json();
            setOptions(barangaySelect, data, 'name', 'code');
        }

        // bind events
        regionSelect.addEventListener('change', e => {
            const opt = regionSelect.selectedOptions[0];
            regionCode.value = opt?.value || '';
            regionName.value = opt?.dataset.name || '';
            if (opt?.value) loadProvinces(opt.value);
        });

        provinceSelect.addEventListener('change', e => {
            const opt = provinceSelect.selectedOptions[0];
            provinceCode.value = opt?.value || '';
            provinceName.value = opt?.dataset.name || '';
            if (opt?.value) loadCities(opt.value);
        });

        citySelect.addEventListener('change', e => {
            const opt = citySelect.selectedOptions[0];
            cityCode.value = opt?.value || '';
            cityName.value = opt?.dataset.name || '';
            if (opt?.value) loadBarangays(opt.value);
        });

        barangaySelect.addEventListener('change', e => {
            const opt = barangaySelect.selectedOptions[0];
            barangayCode.value = opt?.value || '';
            barangayName.value = opt?.dataset.name || '';
        });

        // init
        loadRegions();

        function addWorkExperienceRow() {
            const wrap = document.getElementById('work-experiences');
            const idx = wrap.children.length;
            const div = document.createElement('div');
            div.innerHTML = `
        <input type="text" name="work_experiences[${idx}][company_name]" placeholder="Name of company" required>
        <input type="text" name="work_experiences[${idx}][position]" placeholder="Position">
        <input type="date" name="work_experiences[${idx}][date_from]" placeholder="From">
        <input type="date" name="work_experiences[${idx}][date_to]" placeholder="To">
        <input type="number" step="0.01" name="work_experiences[${idx}][monthly_salary]" placeholder="Monthly salary">
        <input type="text" name="work_experiences[${idx}][appointment_status]" placeholder="Status of appointment">
        <input type="number" name="work_experiences[${idx}][years_experience]" placeholder="No. of yrs. working exp">
        <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
            wrap.appendChild(div);
        }
        document.getElementById('add-work').addEventListener('click', addWorkExperienceRow);

        function addTrainingRow() {
            const wrap = document.getElementById('trainings');
            const idx = wrap.children.length;
            const div = document.createElement('div');
            div.innerHTML = `
        <input type="text" name="trainings[${idx}][title]" placeholder="Title" required>
        <input type="text" name="trainings[${idx}][venue]" placeholder="Venue">
        <input type="date" name="trainings[${idx}][date_from]" placeholder="From">
        <input type="date" name="trainings[${idx}][date_to]" placeholder="To">
        <input type="number" name="trainings[${idx}][hours]" placeholder="No. of Hours">
        <input type="text" name="trainings[${idx}][conducted_by]" placeholder="Conducted by">
        <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
            wrap.appendChild(div);
        }
        document.getElementById('add-training').addEventListener('click', addTrainingRow);

        function addLicensureRow() {
            const wrap = document.getElementById('licensure-exams');
            const idx = wrap.children.length;
            const div = document.createElement('div');
            div.innerHTML = `
        <input type="text" name="licensure_exams[${idx}][title]" placeholder="Title" required>
        <input type="number" name="licensure_exams[${idx}][year_taken]" placeholder="Year taken">
        <input type="text" name="licensure_exams[${idx}][exam_venue]" placeholder="Examination venue">
        <input type="text" name="licensure_exams[${idx}][rating]" placeholder="Rating">
        <input type="text" name="licensure_exams[${idx}][remarks]" placeholder="Remarks">
        <input type="date" name="licensure_exams[${idx}][expiry_date]" placeholder="Expiry date">
        <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
            wrap.appendChild(div);
        }
        document.getElementById('add-licensure').addEventListener('click', addLicensureRow);

        function addCompetencyRow() {
            const wrap = document.getElementById('competency-assessments');
            const idx = wrap.children.length;
            const div = document.createElement('div');
            div.innerHTML = `
        <input type="text" name="competency_assessments[${idx}][title]" placeholder="Title" required>
        <input type="text" name="competency_assessments[${idx}][qualification_level]" placeholder="Qualification level">
        <input type="text" name="competency_assessments[${idx}][industry_sector]" placeholder="Industry sector">
        <input type="text" name="competency_assessments[${idx}][certificate_number]" placeholder="Certificate number">
        <input type="date" name="competency_assessments[${idx}][date_of_issuance]" placeholder="Date of issuance">
        <input type="date" name="competency_assessments[${idx}][expiration_date]" placeholder="Expiration date">
        <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
            wrap.appendChild(div);
        }
        document.getElementById('add-competency').addEventListener('click', addCompetencyRow);
    </script>
@endpush
