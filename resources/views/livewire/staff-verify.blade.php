<div class="modal fade" id="verify_staff_modal" tabindex="-1" aria-hidden="true" 
     data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title">Verify as Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Staff ID Verification Form -->
                <form wire:submit.prevent="verifyStaffId">
                    <label for="staff_id" class="form-label">Enter Staff ID</label>
                    <input type="text" class="form-control mb-3" id="staff_id" placeholder="e.g BUK/STAFF/000918" wire:model="staff_id" required />
                    <div class="form-text">Enter your Staff ID to verify your identity.</div>
                    <div class="form-text">An OTP will be sent to your registered email.</div>
                    <div class="form-text">If you don't receive the OTP, check your spam folder.</div>
                    <div class="form-text">If you still don't receive it, contact support.</div>
                    @error('staff_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror


                    <!-- Error Message -->
                    @if ($errorMessage1)
                        <div class="alert alert-danger mt-2">{{ $errorMessage1 }}</div>
                    @endif

                    <!-- Success Message -->
                    @if ($successMessage1)
                        <div class="alert alert-success mt-2">{{ $successMessage1 }}</div>
                    @endif

                    <!-- Loading Indicator -->
                    <div wire:loading wire:target="verifyStaffId" class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                    </div>

                    <!-- Verify Button -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                            <i class="ki-duotone ki-check-circle fs-4 text-white"></i> Verify
                        </button>
                    </div>
                </form>

                <!-- OTP Section (only visible if successMessage1 exists) -->
                @if ($successMessage1)
                    <form wire:submit.prevent="verifyOtp">
                        <label for="otp" class="form-label mt-3">Enter OTP</label>
                        <input type="text" class="form-control mb-3" id="otp" placeholder="Enter OTP sent to your email" wire:model="otp" required />

                        <div class="form-text">An OTP was sent to your registered email. Check your inbox.</div>

                        <!-- Verify OTP Button -->
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success px-4 py-2 fw-bold">
                                <i class="ki-duotone ki-check-circle fs-4 text-white"></i> Verify OTP
                            </button>
                            <button type="button" wire:click.prevent='resendOtp' wire:loading.attr="disabled" class="btn btn-success px-4 py-2 fw-bold">
    <span wire:loading.remove>
        <i class="ki-duotone ki-check-circle fs-4 text-white"></i> Resend OTP
    </span>
    <span wire:loading>
        <i class="spinner-border spinner-border-sm text-white"></i> Sending...
    </span>
</button>

                        </div>
                    </form>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
