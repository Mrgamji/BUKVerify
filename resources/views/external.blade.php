@extends('layout')

@section('content')
<div class="text-center">
    <a href='/'><img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="img-fluid" style="width: 60px; height: auto;"></a>
    <div class="fw-bold text-primary small mt-2 text-uppercase">BUK Verify</div>
</div>
<livewire:external-student/>
@endsection