@extends('layout')
@section('content')

<div class="card mb-5 shadow-sm border-0">
    <div class="card-body p-5 d-flex justify-content-between align-items-start flex-wrap">
        
        <!-- Staff Info Section -->
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">

<!-- BUK Logo and Label -->
<div class="text-center">
    <img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="img-fluid" style="width: 60px; height: auto;">
    <div class="fw-bold text-primary small mt-1 text-uppercase">BUK Verify</div>
</div>

<!-- Staff Info and Access Code -->
<div>
    <h2 class="fw-semibold text-primary mb-1">{{ $organization->name }}</h2>
    <p class="text-muted fs-6 mb-2">{{ $organization->email }}</p>

    <div class="alert alert-success d-flex align-items-center gap-2 shadow-sm py-2 px-3">
        <i class="ki-duotone ki-briefcase fs-5 text-dark"></i>
        <span class="fw-semibold text-dark">
            Access Code: <span class="text-uppercase">{{ $organization->organization_access_code }}</span>
            <small class="d-block text-muted fst-italic">Confidential</small>
        </span>
    </div>
</div>

</div>
        </div>

        <!-- Close Button -->
        <div class="mt-3 mt-md-0">
           <a href='/organization/logout' wire:navigate> <button  class="btn btn-danger fw-bold px-4 py-2">
                <i class="ki-duotone ki-x fs-4 me-1"></i> Close
            </button></a>
        </div>

    </div>
</div>

<livewire:organization-view />
@endsection