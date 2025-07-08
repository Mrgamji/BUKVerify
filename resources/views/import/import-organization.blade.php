@extends('layout')
@section('content')
<div class="container mt-5 text-center py-2">
   
<div class="mb-5 shadow-sm border-0 d-flex justify-content-center align-items-center">
    <!-- Back Button -->
    <button class="btn btn-primary btn-lg position-absolute start-0 ms-3" onclick="history.back()">
        <i class="bi bi-arrow-left-circle fs-3"></i> <!-- Back Arrow Icon -->
    </button>

    <!-- Logo and Text -->
    <img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="img-fluid" style="width: 60px; height: auto;">
    <div class="fw-bold text-primary small mt-2 text-uppercase ms-3">BUK Verify</div>
</div>



    <div class="card shadow rounded-4 border-0">
        <div class="card-body py-5 px-4">
            <h2 class="mb-4 fw-bold text-primary">📁 Import Organizations Data</h2>

            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger d-flex align-items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ session('error') }}
                </div>
            @endif

          <livewire:import.import-organization />
        </div>
    </div>
</div>


    @endsection