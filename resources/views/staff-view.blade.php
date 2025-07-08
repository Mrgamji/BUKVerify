@extends('layout')
@section('content')

<div class="card mb-5 shadow-sm border-0">
    <div class="card-body p-5 d-flex flex-wrap justify-content-between align-items-start">

        <!-- Left Section: Logo and Staff Info -->
        <div class="d-flex flex-wrap align-items-start gap-4">
            <!-- BUK Logo and Label -->
            <div class="text-center me-4">
                <img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="img-fluid" style="width: 60px;">
                <div class="fw-bold text-primary small mt-2 text-uppercase">BUK Verify</div>
            </div>

            <!-- Staff Info -->
            <div>
                <h3 class="fw-bold text-dark mb-2">
                    {{ $staff->first_name }} {{ $staff->last_name }}
                </h3>
                <div class="text-muted fs-6 mb-2 d-flex align-items-center">
                    <i class="ki-duotone ki-briefcase fs-5 me-2"></i>
                    <span>{{ $staff->position }}</span>
                </div>
                <div class="text-muted fs-6 mb-2 d-flex align-items-center">
                    <i class="ki-duotone ki-building fs-5 me-2"></i>
                    <span>{{ $staff->department }}</span>
                </div>
                <div class="mt-3">
                    <span class="badge bg-success fs-6 py-2 px-4 shadow-sm">
                        Staff ID: {{ $staff->staff_id }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Right Section: Tokens & Close -->
        <div class="d-flex flex-column align-items-end gap-3 mt-4 mt-md-0">

            <!-- Token Count and Add Button -->
            <div class="btn btn-sm bg-gray-400 d-flex align-items-center px-3 py-2 rounded mb-2">
                <span class="fw-semibold text-dark">Tokens: {{ $staff->tokens }}</span>
                <button class="btn btn-sm btn-primary btn-icon ms-2" data-bs-toggle="modal" data-bs-target="#creditsModal">
                    <i class="bi bi-plus fs-6"></i>
                </button>
            </div>

            <!-- Livewire Credits Modal -->
            <livewire:credits-modal />

            <!-- Logout Button -->
            <a href="/staff/logout" wire:navigate>
                <button class="btn btn-danger fw-bold px-4 py-2">
                    <i class="ki-duotone ki-x fs-4 me-1"></i> Close
                </button>
            </a>
        </div>
    </div>
</div>

<!-- Staff Table Component -->
<livewire:staff-table />
@endsection
