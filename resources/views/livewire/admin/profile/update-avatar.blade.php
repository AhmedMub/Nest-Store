<div class="card">
    <div class="card-header fix-p">
        <div class="card-title">Edit Photo</div>
    </div>
    <div class="card-body">
        <div class="text-center chat-image mb-0">
            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                <a class="" href="javascript:void(0)">
                    <img alt="avatar" src=" {{$avatarPath}} " class="brround admin-avatar">
                </a>
            </div>
            <div class="main-chat-msg-name">
                <h5 class="mb-1 text-dark fw-semibold"> {{$name}} </h5>
                <p class="text-muted mt-0 mb-0 pt-0 fs-13">Web Designer</p>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button x-data="{show: {{$removeBtn}}}" x-show="show" class="btn btn-danger"
            wire:click='removeAvatar'>Remove</button>
        <form wire:submit.prevent='update' class="d-inline-block">
            @csrf
            <button class="btn btn-primary" type="submit">Save</button>
            <label class="custom-file-upload btn btn-primary">Select New Photo
                <input type="file" id="profilePhoto" wire:model='profile_photo_path' class="d-none">
            </label>
        </form>
        <x-defaults.input-error for="profile_photo_path" />
    </div>
</div>
