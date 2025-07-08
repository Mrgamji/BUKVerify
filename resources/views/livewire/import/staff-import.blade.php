<div>
<form wire:submit.prevent="import" class="mb-4">
                <div class="mb-4">
                    <label for="file" class="form-label fw-semibold text-muted">Upload Excel or CSV File</label>
                    <div class="border rounded-3 p-4 text-center position-relative bg-light shadow-sm">
                        <i class="bi bi-cloud-arrow-up fs-1 text-primary mb-3"></i>
                        <p class="mb-2">Drag & drop your file here or click to select</p>
                        <input type="file" wire:model="file" id="file" class="form-control position-absolute top-0 start-0 w-100 h-100 opacity-0 cursor-pointer" style="z-index: 10;" />
                    </div>
                    @if($error)
                        <div class="alert alert-danger mt-2">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            {{ $error }}
                        </div>
                    @endif
                    @if($success    )
                        <div class="alert alert-success mt-2">
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $success }}
                        </div>
                    @endif
                    @if($file)
    <div class="mt-4 p-4 border rounded-lg bg-gray-50 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
        
            Uploaded File Information
        </h2>

        <ul class="space-y-2 text-sm text-gray-600">
            <span class="font-medium text-gray-800">Filename:</span> {{ $file->getClientOriginalName() }}
            <span class="font-medium text-gray-800">File Size:</span> {{ number_format($file->getSize() / 1024, 2) }} KB
            <span class="font-medium text-gray-800">File Type:</span> {{ $file->getClientMimeType() }}
           <span class="font-medium text-gray-800">Extension:</span> {{ $file->getClientOriginalExtension() }}
        </ul>
    </div>
@endif

                    @error('file') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div wire:loading wire:target="file" class="text-muted small">
                        Uploading file...
                    </div>
                    <button type="submit" class="btn btn-success px-4 rounded-pill" wire:loading.attr="disabled">
    <i class="bi bi-upload me-1" wire:loading.remove></i> 
    <span wire:loading> <i class="bi bi-hourglass-split fs-5"></i> Uploading... </span>
    <span wire:loading.remove> Import </span>
</button>
                </div>
            </form>
</div>
