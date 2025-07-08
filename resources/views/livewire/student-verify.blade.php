<div class="modal fade" id="verify_student_modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded">
        <div class="modal-header">
    <h5 class="modal-title">Verify as Student</h5>
</div>
            <div class="modal-body">

                {{-- STEP 1: Select Institution Mode --}}
                @if ($step === 1)
                    <div class="mb-3">
                        <label class="form-label">Are you sure you are a verifying for yourself? (No Proxy Allowed)</label>
                        <select class="form-select" wire:model.defer="institution_mode">
                            <option value="">Select an option</option>
                            <option value="existing">Yes</option>
                            
                        </select>
                        @error('institution_mode') <span class="text-danger mx-2">{{ $message }}</span> @enderror
                    </div>

                    <div class="text-end">
                        <button wire:click="next" class="btn btn-primary">Next</button>
                    </div>
                @endif


                {{-- STEP 2: Existing Institution Form --}}
                @if ($step === 2 && $institution_mode === 'existing')
                    <div>
                        <label class="form-label">Enter Matriculation Number</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="matric_number">
                        @error('matric_number') <span class="text-danger">{{ $message }}</span> @enderror

                        <label class="form-label">Enter JAMB Number</label>
                        <input type="text" class="form-control mb-2" wire:model.defer="jamb_number">
                        @error('jamb_number') <span class="text-danger">{{ $message }}</span> @enderror


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
