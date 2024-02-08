<form class="formsearch">
    <span class="searchIcon"><img src="{{ asset('frontend/assets/imgs/theme/icons/search.png') }}" alt=""></span>
    @if ($active !== 'mobile')
    <div wire:ignore>
        <select class="select-category">
            <option value="0">All Categories</option>
            @if (str_contains(url()->current(), '/ar'))
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name_ar}}</option>
            @endforeach
            @else
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name_en}}</option>
            @endforeach
            @endif
        </select>
    </div>
    @endif

    <div class="dropdown">
        <input wire:model.debounce.300ms="queryProduct" class="form-control w-100 search-input"
            placeholder="{{__('frontend/header.Search for items...')}}" type="search">
        @if (!empty($queryProduct) && count($getProducts) > 0)
        <ul class="dropdown-menu w-100 d-block">
            @foreach ($getProducts as $item)
            <li><a class="dropdown-item" href="{{route('show.product', $item->slug)}}">@if ($langAr)
                    {{$item->name_ar}}
                    @else
                    {{$item->name_en}}
                    @endif</a></li>
            @endforeach
        </ul>
        @endif
    </div>
</form>
@push('added-scripts')
<script>
    $(function() {
        $('.select-category').select2({
            width: '100%'
        });
        $('.select-category').on('change', function (e) {
            let data = $('.select-category').val();
            @this.set('category', data);
        });
    });
</script>
@endpush
{{-- get tag serach results --}}
{{-- <div>
    @if (!empty($queryTag))
    <div class="list-group">
        @if (!empty($getTags))
        @foreach ($getTags as $tag)
        <a href="javascript:void(0)" wire:click="addTagToCol({{$tag->id}})"
            class="list-group-item list-group-item-action flex-column align-items-start">
            <h5 class="mb-1">{{$tag->name}}</h5>
        </a>
        @endforeach
        @endif
    </div>
    @endif
</div> --}}