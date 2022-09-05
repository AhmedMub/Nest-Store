<div class="d-flex justify-content-center">
    <div class="col-lg-6 col-md-6 mb-24">
        <div class="featured-card text-center">
            <img class="default-img rounded-circle" src=" @if ($user->getFirstMediaUrl('userAvatar'))
            {{$user->getFirstMediaUrl('userAvatar')}}
            @else
            {{asset('frontend/assets/defaultImages/defAvatar.png')}}
            @endif" alt="avatar" />
            <h4 class="text-capitalize">{{$user->getFullName()}}</h4>
            <p class="text-capitalize font-lg text-heading">{{$user->address}}</p>

            <form wire:submit.prevent="updateAvatar" method="POST" class="mb-24">
                {{-- /uploud image --}}
                <div class="mb-24">
                    <x-admin.partials.spatie-image forError="avatar" wire:model='avatar' title="Upload Avatar" />
                </div>
                <button type='submit' class="btn btn-xs text-capitalize">update avatar</button>
            </form>
            <div class="d-block">
                <a wire:click="removeAvatar" href="javascript:void();"
                    class="btn btn-danger fix-color text-capitalize">remove avatar</a>
            </div>
        </div>
    </div>
</div>
