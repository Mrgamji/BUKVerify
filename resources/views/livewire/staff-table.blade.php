<div>


    	<!--begin::Aside search-->
        <div class="aside-search py-5">

							<!--begin::Search-->
							<div id="kt_header_search" class="header-search d-flex align-items-center w-100" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="false" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
								<!--begin::Form-->
								<form class="w-100 position-relative" autocomplete="off">
									<!--begin::Hidden input(Added to disable form autocomplete)-->
									<input type="hidden" />
									<!--end::Hidden input-->
									<!--begin::Icon-->
									<i class="ki-duotone ki-magnifier fs-2 search-icon position-absolute top-50 translate-middle-y ms-4">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
									<!--end::Icon-->
									<!--begin::Input-->
									<input type="text" wire:model.live='search' class="search-input form-control ps-13 fs-7 h-40px" name="search" value="" placeholder="Quick Search" data-kt-search-element="input" />
									<!--end::Input-->
									<!--begin::Spinner-->
									<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
										<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
									</span>
									<!--end::Spinner-->
									<!--begin::Reset-->
								</form>
								<!--end::Form-->
								
							</div>
							<!--end::Search-->
						</div>
						<!--end::Aside search-->


                        <!--begin::Col-->
									<div class="col-xl-12">
										<!--begin::Tables Widget 5-->
								
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <span class="card-label fw-bold fs-3 mb-1">Record(s) Found</span>
            <span class="text-muted mt-1 fw-semibold fs-7">{{ count($students) }} Students found</span>
        </h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <!--begin::Table head-->
                <thead class="bg-light fw-bold">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Student</th>
                        <th>Email & Phone</th>
                        <th>Matric No</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $key => $student)
                        <tr>
                            <!-- Index -->
                            <td class="text-center">{{ $key + 1 }}</td>

                            <!-- Student Info -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                        <img src="{{ asset('mechatronics/dist/assets/media/avatars/gamjipic.jpg') }}" 
                                            class="rounded-circle" alt="Avatar" />
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark fw-bold text-hover-primary d-block fs-6">
                                            {{ $student->first_name }} {{ $student->last_name }}
                                        </a>
                                        <span class="text-muted fw-semibold d-block">Level: {{ $student->level }}</span>
                                        <span class="text-muted fw-semibold d-block">{{ $student->department }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Email & Phone -->
                            <td class="text-muted fw-semibold">
                                <i class="ki-duotone ki-envelope fs-5"></i> {{ $student->email }} <br>
                                <i class="ki-duotone ki-phone fs-5"></i> {{ $student->phone }}
                            </td>

                            <!-- Matric Number -->
                            <td>
                                <span class="badge badge-light-success fs-5 px-3 py-2">
                                    {{ $student->matriculation_number }}
                                </span>
                            </td>

                            <!-- Verification Button -->
                            <td class="text-center">
                            <button wire:click="generateVerificationPage({{ $student->id }})" wire:loading.attr="disabled" class="btn btn-sm btn-primary px-4 py-2 fw-bold">
    <span wire:loading.remove>Generate Verification Page</span>
    <span wire:loading>Generating...</span>
    <i class="ki-duotone ki-arrow-right fs-4 ms-2"></i>
</button>

                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted fw-bold py-4">
                                No students found.
                            </td>
                        </tr>
                    @endif
                </tbody>
                <!--end::Table body-->
            </table>
        </div>
    </div>
    <!--end::Body-->
</div>
</div>
										</div>
										<!--end::Tables Widget 5-->
									</div>
									<!--end::Col-->
</div>
