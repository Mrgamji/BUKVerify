<div class="modal fade" id="verify_institution_modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded">
        <div class="modal-header">
    <h5 class="modal-title">Verify as Institution/Organization</h5>
</div>


    @if ($step === 2)
    <div class="alert alert-info d-flex flex-column gap-3 rounded shadow-sm py-3 px-4 mb-4 mx-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill text-warning me-2 fs-5"></i>
            <span class="fw-semibold text-uppercase">Please ensure you have the followings ready:</span>
        </div>
        <ul class="list-unstyled">
            @if ($institution_mode === 'new')
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Verification Document (CAC/NUC/SUBEB etc) - jpg/pdf</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Application Letter (Duly signed and stamped on a letter-head) - jpg/pdf</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Valid Work Email</li>
            @elseif ($institution_mode === 'existing')
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Organization Access Code sent to your mail</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Access to your Registered Work Email</li>
            @endif
        </ul>
        </div>
    @endif


            <div class="modal-body">

                {{-- STEP 1: Select Institution Mode --}}
                @if ($step === 1)
                    <div class="mb-3">
                        <label class="form-label">Are you a new or existing institution?</label>
                        <select class="form-select" wire:model.defer="institution_mode">
                            <option value="">Select an option</option>
                            <option value="new">New Institution/Organization</option>
                            <option value="existing">Existing Institution/Organization</option>
                        </select>
                        @error('institution_mode') <span class="text-danger mx-2">{{ $message }}</span> @enderror
                    </div>

                    <div class="text-end">
                        <button wire:click="next" class="btn btn-primary">Next</button>
                    </div>
                @endif

                {{-- STEP 2: New Institution Form --}}
                @if ($step === 2 && $institution_mode === 'new')
                
                    <div>
                        <label class="form-label">Organization Name</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="organization_name">
                        @error('organization_name') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror

                        <label class="form-label">Work Email</label>
                        <input type="email" class="form-control mb-2" wire:model.defer="email" placeholder="e.g support@organization.com">
                        @error('email') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror

                        <label class="form-label">Registration Number</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="cac_number">
                        @error('cac_number') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror

                        <label class="form-label"> Address</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="address" placeholder="e.g. 123 Main St, City, State, Country">
                        @error('address') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror

                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="phone" placeholder="e.g. 08012345678">
                        @error('phone') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror


                        <label class="form-label">Upload Certificate</label>
                        <input type="file" class="form-control mb-2" wire:model="cac_certificate">
                        @error('cac_certificate') <span class="text-danger mx-2 mb-2">{{ $message }}</span><br><br> @enderror

                        <label class="form-label">Upload Application Letter</label>
                        <input type="file" class="form-control mb-3" wire:model="application_letter">
                        @error('application_letter') <span class="text-danger mx-2 mb=2">{{ $message }}</span><br><br> @enderror
                        <div class="mt-4">
    {{-- Feedback Messages --}}
    @if($successMessage)
        <div class="alert alert-success d-flex align-items-center gap-2 rounded shadow-sm mb-3">
            <i class="bi bi-check-circle-fill fs-5 text-success"></i>
            <span class="fw-semibold">{{ $successMessage }}</span>
        </div>
    @endif

    @if($errorMessage)
        <div class="alert alert-danger d-flex align-items-center gap-2 rounded shadow-sm mb-3">
            <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
            <span class="fw-semibold">{{ $errorMessage }}</span>
        </div>
    @endif

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-between align-items-center">
        <!-- Back Button -->
        <button wire:click="back" class="btn btn-outline-secondary px-4 py-2 rounded-pill d-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> Back
        </button>
        @if (!$successMessage)
        <!-- Submit Button with Spinner -->
        <button wire:click="submitNewInstitution" wire:loading.attr="disabled"
            class="btn btn-primary px-4 py-2 rounded-pill d-inline-flex align-items-center fw-semibold">
            <div wire:loading wire:target="submitNewInstitution" class="spinner-border spinner-border-sm me-2" role="status"></div>
            <span>
            
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                <span wire:loading.remove wire:target="submitNewInstitution">Submit Registration</span>
                <span wire:loading wire:target="submitNewInstitution">Submitting...</span>
            </span>
        </button>
        @endif
    </div>
</div>



                    </div>
                @endif

                {{-- STEP 2: Existing Institution Form --}}
                @if ($step === 2 && $institution_mode === 'existing')
                    <div>
                        <label class="form-label">Enter Organization/Institution Access Code</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="organization_access_code">
                        @error('organization_access_code') <span class="text-danger">{{ $message }}</span> @enderror

                        <div class="text-center mb-3">
                            @if($successMessage)
                                <div class="alert alert-success d-flex align-items-center gap-2 rounded shadow-sm mb-3">
                                    <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                                    <span class="fw-semibold">{{ $successMessage }}</span><br><br>
                                </div>
                                @endif
                            @if($errorMessage)
                                <div class="alert alert-danger d-flex align-items-center gap-2 rounded shadow-sm mb-3">
                                    <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
                                    <span class="fw-semibold">{{ $errorMessage }}</span><br>
                                </div>
                            @endif
                            @if(isset($message))
                                <div class="alert alert-info d-flex align-items-center gap-2 rounded shadow-sm mb-3">
                                    <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
                                    <span class="fw-semibold">{{ $message }}</span><br>
                                </div>
                            @endif

                                    @if(!$showotp)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Back Button -->
                                        <button wire:click="back" class="btn btn-outline-secondary px-4 py-2 rounded-pill d-inline-flex align-items-center">
                                            <i class="bi bi-arrow-left me-2"></i> Back
                                        </button>
                                        <!-- Verify Button with Spinner -->
                                        <button wire:click="verifyExistingInstitution" wire:loading.attr="disabled"
                                                class="btn btn-primary px-4 py-2 rounded-pill d-inline-flex align-items-center fw-semibold">
                                            <div wire:loading wire:target="verifyExistingInstitution"
                                                 class="spinner-border spinner-border-sm me-2" role="status"></div>
                                            <span>
                                                <span wire:loading.remove wire:target="verifyExistingInstitution">Verify</span>
                                                <span wire:loading wire:target="verifyExistingInstitution">Verifying...</span>
                                            </span>
                                        </button>
                                    </div>
                                    @endif
                                    
    @if($showotp)
    <button wire:click="resendsendOtp"
            wire:loading.attr="disabled"
            class="btn btn-warning px-4 py-2 rounded-pill d-inline-flex align-items-center fw-semibold">
        <div wire:loading wire:target="verifyExistingInstitution"
             class="spinner-border spinner-border-sm me-2" role="status"></div>
        <span>
            <span wire:loading.remove wire:target="resendsendOtp">Resend Send OTP</span>
            <span wire:loading wire:target="resendsendOtp">Sending...</span>
        </span>
    </button>
    @endif
</div>

@if($showotp)
                        <label class="form-label">Enter OTP</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="otp">
                        @error('otp') <span class="text-danger">{{ $message }}</span> @enderror

                        <div class="text-center mt-4">
                        <button wire:click="back" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
        <i class="bi bi-arrow-left me-1"></i> Back
    </button>
    <button wire:click="verifyOtpAndProceed"
            wire:loading.attr="disabled"
            class="btn btn-success px-4 py-2 rounded-pill d-inline-flex align-items-center fw-semibold">
        <div wire:loading wire:target="verifyOtpAndProceed"
             class="spinner-border spinner-border-sm me-2" role="status"></div>
        <span>
            <span wire:loading.remove wire:target="verifyOtpAndProceed">Verify & Proceed</span>
            <span wire:loading wire:target="verifyOtpAndProceed">Processing...</span>
        </span>
    </button>

</div>
@endif

                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="modal-footer">
               <a href='/' wire:navigate> <button type="button" class="btn btn-light" >Close</button></a>
            </div>
        </div>
    </div>
</div>
