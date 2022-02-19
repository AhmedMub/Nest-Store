@extends('admin.layouts.master')
@section('title','Profile')
@section('page-title', 'Edit Profile')
@section('content')
<div class="row">
    <div class="col-xl-4">
        <livewire:admin.profile.update-avatar :admin="$admin" />
        <livewire:admin.profile.update-password :admin="$admin" />
    </div>
    <div class="col-xl-8">
        <livewire:admin.profile.update-profile-information :admin="$admin" />
        <livewire:admin.profile.delete-admin-user :admin="$admin" />
    </div>
</div>


@endsection

@push('child-styles')
<style>
    @font-face {
        font-family: "dropify";
        src: url("{{asset('backend/assets/plugins/fileuploads/fonts/dropify.eot')}} ");
        src: url("{{asset('backend/assets/plugins/fileuploads/fonts/dropify.eot#iefix')}}") format("embedded-opentype"),
        url("{{asset('backend/assets/plugins/fileuploads/fonts/dropify.woff')}}") format("woff"),
        url("{{asset('backend/assets/plugins/fileuploads/fonts/dropify.ttf')}}") format("truetype"),
        url("{{asset('backend/assets/plugins/fileuploads/fonts/dropify.svg#dropify')}}") format("svg");
        font-weight: normal;
        font-style: normal;
    }
</style>
<link rel="stylesheet" href=" {{asset('backend/css/dropify.min.css')}} ">
@endpush

@push('child-scripts')
{{-- FILE UPLOADES JS --}}
<script src=" {{asset('backend/assets/plugins/fileuploads/js/dropify.min.js')}} "></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endpush
