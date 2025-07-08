<div wire:ignore.self class="modal fade" id="creditsModal" tabindex="-1" aria-labelledby="creditsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded shadow-sm">
            <div class="modal-header">
                <h5 class="modal-title">Buy Tokens</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Enter number of tokens</label>
                    <input type="number" min="1" wire:model.live="creditAmount" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Price (₦)</label>
                    <input type="text" class="form-control" value="₦{{ number_format($totalPrice) }}" readonly>
                </div>
            </div>

            <div class="modal-footer">
                <button wire:click="purchaseCredits"
                        wire:loading.attr="disabled"
                        class="btn btn-success d-flex align-items-center">
                    <div wire:loading wire:target="purchaseCredits" class="spinner-border spinner-border-sm me-2" role="status"></div>
                    <span wire:loading.remove wire:target="purchaseCredits">Buy Now</span>
                    <span wire:loading wire:target="purchaseCredits">Processing...</span>
                </button>
            </div>
        </div>
    </div>
</div>
