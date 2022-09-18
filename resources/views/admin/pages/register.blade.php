@extends('admin.layouts.master')
@section('title','Register')
@section('page-title', 'Register Admin')
@section('content')
<livewire:admin.admins.register-new-admin />
@endsection
@push('child-styles')
<style>
    .passInvalid {
        border-color: #e23e3d !important;
    }
</style>
@endpush
@push('child-scripts')
<script src="{{asset('backend/js/show-password.min.js')}}"></script>
@endpush
