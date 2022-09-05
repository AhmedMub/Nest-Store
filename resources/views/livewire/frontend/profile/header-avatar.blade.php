<a href="javascript:void(0);">
    <img class="svgInject rounded-circle" alt="Nest" src="@if ($user->getFirstMediaUrl('userAvatar'))
    {{$user->getFirstMediaUrl('userAvatar','thumb')}}
    @else
    {{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}}
    @endif" />
</a>
