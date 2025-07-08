<div wire:ignore.self class="modal fade" id="simple_verification_modal" tabindex="-1" aria-labelledby="simple_verification_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="simple_verification_modalLabel">Simple Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="verifyMatriculationNumber">
                @csrf
                <div class="modal-body">
                    <label for="matriculation_number" class="form-label">Enter Student's Matriculation Number/Staff's ID Number</label>
                    <input type="text" class="form-control mb-3" id="matriculation_number" placeholder="e.g CST/20/COM/00539 or BUK/ST/001" name="matriculation_number" wire:model="matriculationNumber" required />
                    @error('matriculationNumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if(!empty($errorMessage))
                        <p class="text-danger mt-2">
                            {{$errorMessage}}
                        </p>
                    @endif
                    @if(!empty($message))
                        <p class="alert alert-info mt-2">
                            {{$message}}
                        </p>
                    @endif
                    @if(!empty($successMessage))
                        <p class="alert alert-success mt-2">
                            {{$successMessage}}
                        </p>
                    @endif
                    <p class="form-text text-muted">
                        Note: Simple verification will only display the name and status (active/inactive) of the individual, and whether they are a student or staff of BUK.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Verify</span>
                        <span wire:loading>Verifying...</span>
                    </button>
                </div>
            </form>
        </div>