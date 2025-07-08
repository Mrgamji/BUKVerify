@extends('layout')

@section('content')
<div class="text-center">
    <a href='/'><img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="img-fluid" style="width: 60px; height: auto;"></a>
    <div class="fw-bold text-primary small mt-2 text-uppercase">BUK Verify</div>
	<hr class="mb-4"/>
</div>
<!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
									<!--begin::Col-->
									<div class="col-xl-8">
										<!--begin::Table widget 8-->
										<div class="card h-xl-100">
											<!--begin::Header-->
											<div class="card-header position-relative py-0 border-bottom-2">
												<!--begin::Nav-->
												<ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-3">
													<!--begin::Nav item-->
													<li class="nav-item p-0 ms-0 me-8">
														<!--begin::Nav link-->
														<a class="nav-link btn btn-color-muted px-0 show active" data-bs-toggle="tab" href="#kt_table_widget_7_tab_content_1">
															<!--begin::Title-->
															<span class="nav-text fw-semibold fs-4 mb-3">Basic Info</span>
															<!--end::Title-->
															<!--begin::Bullet-->
															<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
															<!--end::Bullet-->
														</a>
														<!--end::Nav link-->
													</li>
													<!--end::Nav item-->
													<!--begin::Nav item-->
													<li class="nav-item p-0 ms-0 me-8">
														<!--begin::Nav link-->
														<a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab" href="#kt_table_widget_7_tab_content_2">
															<!--begin::Title-->
															<span class="nav-text fw-semibold fs-4 mb-3">School Details</span>
															<!--end::Title-->
															<!--begin::Bullet-->
															<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
															<!--end::Bullet-->
														</a>
														<!--end::Nav link-->
													</li>
													<!--end::Nav item-->
													<!--begin::Nav item-->
													<li class="nav-item p-0 ms-0 me-8">
														<!--begin::Nav link-->
														<a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab" href="#kt_table_widget_7_tab_content_3">
															<!--begin::Title-->
															<span class="nav-text fw-semibold fs-4 mb-3">Address Details</span>
															<!--end::Title-->
															<!--begin::Bullet-->
															<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
															<!--end::Bullet-->
														</a>
														<!--end::Nav link-->
													</li>
													<!--end::Nav item-->
													<!--begin::Nav item-->
													<li class="nav-item p-0 ms-0 me-8">
														<!--begin::Nav link-->
														<a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab" href="#kt_table_widget_7_tab_content_4">
															<!--begin::Title-->
															<span class="nav-text fw-semibold fs-4 mb-3">QR Code</span>
															<!--end::Title-->
															<!--begin::Bullet-->
															<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
															<!--end::Bullet-->
														</a>
														<!--end::Nav link-->
													</li>
													<!--end::Nav item-->
												
												</ul>
												<!--end::Nav-->
												<!--begin::Toolbar-->
                                                <div class="card-toolbar">
                                                    <!--begin::Fixed Date-->
													<div class="d-flex align-items-center gap-4">
    {{-- Date Display --}}
    <div class="btn btn-sm btn-light d-flex align-items-center px-4">
        <div class="text-gray-600 fw-bold">{{ \Carbon\Carbon::now()->format('F j, Y') }}</div>
        <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
            <span class="path6"></span>
        </i>
    </div>

    {{-- Credits Display --}}
    <div class="btn btn-sm bg-gray-400 d-flex align-items-center px-3 py-2 rounded">
	<span class="fw-semibold text-dark">Tokens: {{ $student->freetokens + $student->paidtokens }}</span>
        <button class="btn btn-sm btn-primary btn-icon ms-2" data-bs-toggle="modal" data-bs-target="#creditsModal">
            <i class="bi bi-plus fs-6"></i>
        </button>
    </div>
</div>
<livewire:credits-modal>

                                                    <!--end::Fixed Date-->
                                                </div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Tab Content (ishlamayabdi)-->
												<div class="tab-content mb-2">
													<!--begin::Tap pane-->
													<div class="tab-pane fade show active" id="kt_table_widget_7_tab_content_1">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle">
																<!--begin::Table head-->
                                                                <thead>
                                                                    <tr>
                                                                    <th class="min-w-150px p-0 fs-4 fw-bold">Field</th>
                                                                    <th class="min-w-200px p-0 fs-4 fw-bold">Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">First Name</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->first_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Last Name</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->last_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Date of Birth</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->date_of_birth }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Email</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Phone</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->phone }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Gender</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->gender }}</td>
                                                                    </tr>
                                                                </tbody>
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table container-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_table_widget_7_tab_content_2">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle">
																<!--begin::Table head-->
                                                                <thead>
                                                                    <tr>
                                                                    <th class="min-w-150px p-0 fs-4 fw-bold">Field</th>
                                                                    <th class="min-w-200px p-0 fs-4 fw-bold">Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Faculty</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->faculty }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Department</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->department }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Current Level</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->level }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Current CGPA</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->cgpa }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Expected Year of Graduation</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->expected_year_of_graduation }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">HOD Name</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->hod_name }}</td>
                                                                    </tr>
                                                                </tbody>
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table container-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_table_widget_7_tab_content_3">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle">
																<!--begin::Table head-->
                                                                <thead>
                                                                    <th class="min-w-150px p-0 fs-4 fw-bold">Field</th>
                                                                    <th class="min-w-200px p-0 fs-4 fw-bold">Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Country</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->country }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">State</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->state }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">City</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->city }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Address</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->address }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Email</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fs-6 fw-bold text-gray-800">Phone</td>
                                                                        <td class="fs-6 fw-bold text-gray-400">{{ $student->phone }}</td>
                                                                    </tr>
                                                                </tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table container-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_table_widget_7_tab_content_4">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle">
																<!--begin::Table head-->
                                                                <div class="d-flex justify-content-center align-items-center">
																	<img src="{{ asset($student->verification_qr) }}" alt="Student QR Code" class="img-fluid" style="max-width: 200px;">
																	<div class="text-center mt-3">
																		<p class="text-muted">QR Code expires at: {{ \Carbon\Carbon::parse($student->qr_expired_at)->format('F j, Y g:i A') }}</p>
																	</div>
                                                                </div>
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table container-->
													</div>
													<!--end::Tap pane-->
												</div>
												<!--end::Tab Content-->
												
												<!--end::Action-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end::Table widget 8-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::Engage widget 5-->
										<div class="card bg-primary h-xl-100">
											<!--begin::Body-->
											<div class="card-body d-flex flex-column pt-13 pb-14">
												<!--begin::Heading-->
												<div class="m-0">
													<!--begin::Title-->
													<h1 class="fw-semibold text-white text-center lh-lg mb-9">{{$student->first_name}}
													<span class="fw-bolder">{{$student->first_last}}</span></h1>
													<!--end::Title-->
                                                    <!--begin::Picture Frame-->
                                                    <div class="d-flex justify-content-center align-items-center h-200px mh-200px my-5 mb-lg-12 border border-2 border-white bg-white rounded">
                                                        <img src="dist/assets/media/logos/buk.png" alt="Illustration" class="img-fluid rounded">
                                                    </div>
                                                    <!--end::Picture Frame-->
												</div>
												<!--end::Heading-->


									<!--begin::Links-->
                                    <div class="text-center">
    <!--begin::Button-->
 

	<a href="{{ route('student.download.pdf', $student->id) }}" 
   id="generatePdfBtn" 
   class="btn btn-primary d-flex align-items-center gap-2"
   onclick="showSpinnerBeforeDownload()">
    <span id="pdfBtnText">Generate PDF</span>
    <div id="pdfSpinner" class="spinner-border spinner-border-sm text-light d-none" role="status"></div>
</a>
<style>
#generatePdfBtn {
    background: #28a745; /* Green background */
    border: none; /* No border */
    padding: 12px 24px; /* Custom padding */
    border-radius: 30px; /* Rounded corners */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition */
}

#generatePdfBtn:hover {
    background: #218838; /* Darker green on hover */
    transform: scale(1.05); /* Slight scaling effect */
}

#generatePdfBtn:disabled {
    background-color: #ddd; /* Disable color */
    cursor: not-allowed; /* Not clickable when disabled */
}
</style>
</div>

<!-- Add this just before the closing </body> or in a script block -->
<script>
function showSpinnerBeforeDownload() {
    const btn = document.getElementById('generatePdfBtn');
    const spinner = document.getElementById('pdfSpinner');
    const text = document.getElementById('pdfBtnText');

    // Show the spinner and change button text
    spinner.classList.remove('d-none');
    text.innerText = 'Generating...';
    
    // Optional: Revert button after a delay (in case needed)
    setTimeout(() => {
        spinner.classList.add('d-none');
        text.innerText = 'Generate PDF';
    }, 4000);
}
</script>


                                                    <!--end::Button-->	<!--end::Link-->
													<!--begin::Link-->
													<a class="btn btn-sm bg-white btn-color-white bg-opacity-20 mt-4" href="/student/logout" wire:navigate>Logout</a>
													<!--end::Link-->


													<div>
												</div>
												<!--end::Links-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Engage widget 5-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->


@endsection