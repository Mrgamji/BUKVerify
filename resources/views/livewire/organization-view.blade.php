<div>
    <!--begin::Search-->
<div id="kt_header_search" class="header-search d-flex align-items-center w-100 gap-3 p-4" data-kt-search-keypress="true">
    <form class="w-100 position-relative d-flex gap-2 align-items-center" autocomplete="off">
        <!--begin::Icon-->
        <i class="ki-duotone ki-magnifier fs-2 search-icon position-absolute top-50 translate-middle-y ms-4">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        <!--end::Icon-->

        <!--begin::Input-->
        <input 
            type="text" 
            wire:model.live='search' 
            class="search-input form-control ps-13 fs-7 h-40px" 
            name="search" 
            placeholder="Quick Search" 
            data-kt-search-element="input" />
        <!--end::Input-->

        <!--begin::Button-->
        <button 
            type="button" 
            wire:click="searchStudent" 
            wire:loading.attr="disabled"
            class="btn btn-primary px-4 h-40px d-flex align-items-center">
            <span wire:loading.remove>Search</span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm text-white"></span>
            </span>
        </button>
        <!--end::Button-->
    </form>
</div>
<!--end::Search-->

    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                    <span class="card-label fw-bold fs-3 mb-1">Institutional Student Records</span>
                    @if ($hasSearched)
    <span class="text-muted mt-1 fw-semibold fs-7">
        {{ count($students) }} student(s) found
    </span>
@else
    <span class="text-muted mt-1 fw-semibold fs-7">
        Please enter a query to view results
    </span>
@endif
                </h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="bg-light fw-bold">
                            <tr>
                                <th>#</th>
                                <th>Basic Info</th>
                                <th>Academic Details</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>JAMB & Docs</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($hasSearched)
                            @forelse($students as $key => $student)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="{{ $student->picture ? asset($student->picture) : asset('mechatronics/dist/assets/media/avatars/gamjipic.jpg') }}" class="rounded-circle" alt="Avatar" />
                                            </div>
                                            <div>
                                                <span class="fw-bold d-block fs-6">{{ $student->first_name }} {{ $student->last_name }}</span>
                                                <span class="text-muted d-block">{{ $student->gender }}, DOB: {{ $student->date_of_birth }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-light-success mb-1">Matric: {{ $student->matriculation_number }}</span><br>
                                        <span class="text-muted d-block">Department: {{ $student->department }}</span>
                                        <span class="text-muted d-block">Faculty: {{ $student->faculty }}</span>
                                        <span class="text-muted d-block">Level: {{ $student->level }}</span>
                                        <span class="text-muted d-block">CGPA: {{ $student->cgpa }}</span>
                                        <span class="text-muted d-block">Admission Year: {{ $student->admission_year }}</span>
                                        <span class="text-muted d-block">Expected Graduation: {{ $student->expected_year_of_graduation }}</span>
                                        <span class="text-muted d-block">HOD: {{ $student->hod_name }}</span>
                                    </td>

                                    <td>
                                        <i class="ki-duotone ki-envelope fs-5"></i> {{ $student->email }}<br>
                                        <i class="ki-duotone ki-phone fs-5"></i> {{ $student->phone }}
                                    </td>

                                    <td>
                                        {{ $student->address }}<br>
                                        {{ $student->city }}, {{ $student->state }}<br>
                                        {{ $student->country }}
                                    </td>

                                    <td>
                                        <span class="d-block">JAMB Reg No: {{ $student->jamb_registration_number }}</span>
                                        <span class="d-block">Score: {{ $student->jamb_score }}</span>
                                        <span class="text-muted d-block">WAEC Cert: {{ $student->waec_certificate ?? 'N/A' }}</span>
                                        <span class="text-muted d-block">Birth Cert: {{ $student->birth_certificate ?? 'N/A' }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted fw-bold py-4">
                                        No students found.
                                    </td>
                                </tr>
                            @endforelse
                            @else
    <tr>
        <td colspan="6" class="text-center text-muted fw-bold py-4">
            Search to view students
        </td>
    </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
</div>
