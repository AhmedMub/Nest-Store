<div class="d-flex justify-content-center">
    <div class="col-lg-4 col-md-6 mb-24">
        <div class="featured-card text-center">
            <img class="default-img rounded-circle" src="{{asset('frontend/assets/defaultImages/avatar-3.png')}}"
                alt="avatar" />
            <h4 class="text-capitalize">{{$user->getFullName()}}</h4>
            <p class="text-capitalize">{{$user->address}}</p>

            {{-- /uploud image --}}
            <div></div>
        </div>
    </div>
</div>
