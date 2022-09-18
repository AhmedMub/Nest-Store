@extends('admin.layouts.master')
@section('title','Admins List')
@section('page-title', 'Admins List')
@section('content')
<livewire:admin.admins.show-admins-list />

<livewire:admin.admins.edit-admin />
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
