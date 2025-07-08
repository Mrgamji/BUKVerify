@extends('layout')
@section('content')
								<!--begin::Hero card-->
								<div class="card mb-12">
									<!--begin::Hero body-->
									<div class="card-body flex-column p-5 mt-5">
										<!--begin::Hero content-->
										<div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
												<!--begin::Title-->
										
												<!--end::Title-->
                                                <!--begin::Text-->
                                                <div class="bg-light-primary p-2 rounded shadow-sm mb-12 p-lg-5 mt-lg-12">
                                                <h1 class="text-primary fw-bolder fs-4 fs-lg-1 mb-4">Welcome to BUK-Verify!</h2>
                                                    <h2 class="text-primary fw-bold fs-4 fs-lg-3 mb-4">What is BUK-Verify?</h2>
                                                    <p class="text-gray-700 fw-semibold fs-6 fs-lg-5 mb-4">
                                                        BUK-Verify is a trusted student and staff verification platform designed to provide seamless identity validation for Bayero University Kano. Whether you are a student needing a verification page in place of an ID card or an external entity seeking to confirm enrollment or staff status, BUK-Verify ensures accurate and secure authentication.
                                                    </p>
                                                    <p class="text-gray-700 fw-semibold fs-6 fs-lg-5">
                                                        With advanced search capabilities and QR-code-enabled verification, we make it easy to verify academic and professional records with confidence.
                                                    </p>
                                                </div>
                                                <!--end::Text-->
												
											</div>
											<!--end::Wrapper-->
											<!--begin::Wrapper-->
											<div class="flex-equal d-flex justify-content-center align-items-end ms-5">
												<!--begin::Illustration-->
												<a href={{route('external.student')}}><img src="dist/assets/media/logos/buk.png" alt="" class="mw-100 mh-125px mh-lg-275px mb-lg-n12" /></a>
												<!--end::Illustration-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Hero content-->
                                        <!--begin::Hero nav-->
<div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5 mt-lg-12 mb-5">
    <!--begin::Nav-->
    <ul class="nav flex-wrap border-transparent fw-bold">
        <!--begin::Nav item-->
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#overviewSection" role="button" aria-expanded="false" aria-controls="overviewSection">Overview</a>
        </li>
        <!--end::Nav item-->
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#studentsSection" role="button" aria-expanded="false" aria-controls="studentsSection">Students</a>
        </li>
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#staffSection" role="button" aria-expanded="false" aria-controls="staffSection">Staff</a>
        </li>
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#organizationsSection" role="button" aria-expanded="false" aria-controls="organizationsSection">Organizations</a>
        </li>
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#faqsSection" role="button" aria-expanded="false" aria-controls="faqsSection">FAQs</a>
        </li>
        <li class="nav-item my-1">
            <a class="btn btn-color-gray-600 btn-active-secondary btn-active-color-primary fw-bolder fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase" data-bs-toggle="collapse" href="#contactSection" role="button" aria-expanded="false" aria-controls="contactSection">Contact Us</a>
        </li>
    </ul>
    <div class="text-center mt-4">
        <button class="btn btn-primary px-4 py-2 fw-bold" id="simpleVerifyBtn" data-bs-toggle="modal" data-bs-target="#simple_verification_modal">
            <i class="ki-duotone ki-check-square fs-4 text-white"></i>
            Simple Verification
        </button>
    </div>
    <!--end::Nav-->
</div>

<!--begin::Sections-->
<div class="accordion mt-5" id="sectionsAccordion">
<div class="accordion-item">
    <div id="overviewSection" class="collapse show" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Overview</h3>
            <p class="text-gray-700">
                <strong>BUK-Verify</strong> is a cutting-edge verification platform designed to authenticate the identities of students and staff at Bayero University Kano. 
                It provides a reliable way to validate enrollment status, employment details, and institutional affiliation through a seamless digital process.
            </p>
            <p class="text-gray-700">
                With <strong>BUK-Verify</strong>, students can generate a verification page as an alternative to an ID card, while employers, institutions, and other authorized entities can conduct secure searches to confirm academic and staff credentials. 
                Our system also features a <strong>QR code-enabled verification</strong>, ensuring instant validation of records.
            </p>
            <ul class="list-unstyled text-gray-700">
                <li>✅ Quick and secure student identity verification</li>
                <li>✅ Advanced search options for external entities</li>
                <li>✅ QR code validation for instant authentication</li>
                <li>✅ Reliable staff verification through work email authentication</li>
            </ul>
            <p class="text-gray-700 mb-0">
                Whether you're a student, employer, or academic institution, <strong>BUK-Verify</strong> ensures a transparent and trustworthy verification process tailored to your needs.
            </p>
        </div>
    </div>
</div>


<div class="accordion-item">
    <div id="studentsSection" class="collapse" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Student Verification</h3>
            <p class="text-gray-700">
                BUK-Verify allows students to securely access their academic details and generate a verification page. 
                To verify your identity, follow these simple steps:
            </p>
            <ol class="text-gray-700">
                <li><strong>Enter your Matriculation Number:</strong> This is your unique student identifier.</li>
                <li><strong>Select Your Department:</strong> Choose your academic department from the list.</li>
                <li><strong>Receive an OTP:</strong> A one-time password (OTP) will be sent to your registered phone number.</li>
                <li><strong>Verify & Access Your Information:</strong> Enter the OTP to view your details and process a verification page.</li>
            </ol>
            <p class="text-gray-700">
                The verification page will include your basic student details along with a QR code for instant authentication.
            </p>
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 py-2 fw-bold" id="verifyStudentBtn" data-bs-toggle="modal" data-bs-target="#verify_student_modal">
                    Verify as Student
                </button>
            </div>
        </div>
    </div>
</div>

<div class="accordion-item">
    <div id="staffSection" class="collapse" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Staff Verification</h3>
            <p class="text-gray-700">
                BUK-Verify provides authorized university staff with secure access to student verification details, including their profile image and academic information. 
                To verify as a staff member, follow these steps:
            </p>
            <ol class="text-gray-700">
                <li><strong>Enter Your Staff ID:</strong> Provide your official university-issued staff identification number.</li>
                <li><strong>Receive OTP via Email:</strong> A one-time password (OTP) will be sent to your registered school-provided email address.</li>
                <li><strong>Access Student Details:</strong> After entering the OTP, you will be able to view additional student details, including their profile picture and academic records.</li>
            </ol>
            <p class="text-gray-700">
                This verification ensures that only authorized personnel can access sensitive student information.
            </p>
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 py-2 fw-bold" id="verifyStaffBtn" data-bs-toggle="modal" data-bs-target="#verify_staff_modal">
                    Verify as Staff
                </button>
            </div>
        </div>
    </div>
</div>

<div class="accordion-item">
    <div id="organizationsSection" class="collapse" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Organization Verification</h3>
            <p class="text-gray-700">
                BUK-Verify allows institutions, scholarship bodies, and organizations to securely verify the academic or staff status of Bayero University Kano (BUK) members before granting scholarships, seminar slots, or other opportunities.
            </p>
            <p class="text-gray-700">
                To ensure the integrity of the verification process, organizations must verify their identity using an official <strong>work email address</strong> (e.g., @company.com, @organization.org). 
                Personal email addresses (e.g., Gmail, Yahoo, Outlook) will not be accepted for verification.
            </p>
            <ol class="text-gray-700">
                <li><strong>Enter Your Official Work Email:</strong> Provide your organization-issued email address.</li>
                <li><strong>Receive OTP via Email:</strong> A one-time password (OTP) will be sent to your registered work email.</li>
                <li><strong>Access Student/Staff Verification:</strong> After entering the OTP, you will be able to confirm the status of students or staff.</li>
            </ol>
            <p class="text-gray-700">
                This process ensures that only legitimate institutions can access verification details, maintaining data security and authenticity.
            </p>
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 py-2 fw-bold" id="verifyOrganizationBtn" data-bs-toggle="modal" data-bs-target="#verify_institution_modal">
                    Verify as Organization
                </button>
            </div>
        </div>
    </div>
</div>

<div class="accordion-item">
    <div id="faqsSection" class="collapse" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Frequently Asked Questions (FAQs)</h3>

            <div class="accordion" id="faqAccordion">
                <!-- Question 1 -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button fw-bold text-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                            What is BUK-Verify?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-gray-700">
                            BUK-Verify is a secure verification platform that allows students, staff, and external organizations to confirm academic and employment status at Bayero University Kano.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button collapsed fw-bold text-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                            How can students verify their identity?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-gray-700">
                            Students need to enter their matriculation number, select their department, and verify using an OTP sent to their registered phone number. Once verified, they can access their details and generate a verification page.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button collapsed fw-bold text-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                            How do staff members access student information?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-gray-700">
                            Staff members must enter their staff ID and verify using an OTP sent to their official school email. Upon verification, they can view detailed student records, including profile images.
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="faqHeading4">
                        <button class="accordion-button collapsed fw-bold text-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                            Can external organizations verify students and staff?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-gray-700">
                            Yes, organizations such as scholarship bodies and institutions can verify students or staff. However, they must use an official work email address (not personal emails) and confirm their identity through an OTP before accessing the verification system.
                        </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="faqHeading5">
                        <button class="accordion-button collapsed fw-bold text-gray-800" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                            Is BUK-Verify secure?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-gray-700">
                            Yes, BUK-Verify uses encrypted authentication methods, OTP verification, and access control mechanisms to ensure that only authorized individuals can retrieve student and staff information.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="accordion-item">
    <div id="contactSection" class="collapse" data-bs-parent="#sectionsAccordion">
        <div class="card card-body shadow-sm border-0">
            <h3 class="fw-bold text-primary mb-3">Contact Us</h3>
            <p class="text-gray-700">
                Have any questions or need assistance? Get in touch with us using the details below, and our support team will be happy to assist you.
            </p>

            <div class="row">
                <!-- Contact Information -->
                <div class="col-md-6">
                    <h5 class="fw-bold text-gray-800">Our Office</h5>
                    <p class="text-gray-700">
                        Bayero University Kano (BUK)<br>
                        Faculty of Computing, Main Campus<br>
                        Kano, Nigeria
                    </p>

                    <h5 class="fw-bold text-gray-800 mt-3">Email Support</h5>
                    <p class="text-gray-700">
                        <i class="ki-duotone ki-mail fs-4 text-primary"></i>
                        <a href="mailto:support@bukverify.com" class="text-primary fw-bold">bukverify@buk.edu.ng</a>
                    </p>

                    <h5 class="fw-bold text-gray-800 mt-3">Phone Support</h5>
                    <p class="text-gray-700">
                        <i class="ki-duotone ki-call fs-4 text-primary"></i>
                        +234 901 234 5678
                    </p>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6">
                    <h5 class="fw-bold text-gray-800">Send Us a Message</h5>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Your Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">Send Message</button>
                    </form>
                </div>
            </div>
            <p class="text-gray-700 mt-4">
                We value your feedback and inquiries. Please allow us 24-48 hours to respond to your message.
        </div>
    </div>
</div>

<!--end::Sections-->
<!--begin::Modals for Verification-->


<livewire:staff-verify/>
<livewire:student-verify/>
<!-- Institution/Organization Verification Modal -->
<livewire:institution-verify />
<!--end::Institution/Organization Verification Modal-->
<livewire:simple-verification />


<!--end::Modals for Verification-->

							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
                    @endsection
					
                    
                  