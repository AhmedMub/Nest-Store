{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo88">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">Edit Product Tags</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body card-body py-2">
                {{-- @if ($productTags->isEmpty())
                <div class="card text-info bg-info-transparent">
                    <div class="card-body">
                        <h4 class="card-title">There is no such tags</h4>
                    </div>
                </div>
                @else --}}
                <div class="card mb-2">
                    <div class="card-header">
                        <div class="card-title">Product Saved Tags</div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div class="tags">
                                @if (!empty($savedTags))
                                @foreach ($savedTags as $tag)
                                <span class="tag">
                                    {{$tag->name}}
                                    <a href="javascript:void(0)" wire:click="detachTag({{$tag->id}})"
                                        class="tag-addon"><i class="fe fe-x"></i></a>
                                </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <form autocomplete="off" method="POST" wire:submit.prevent='update'>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-bg">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Exists Tags </h3>
                                </div>
                                <div class="card-body">
                                    <div class="panel-group1" id="accordion1">
                                        <div class="mb-2">
                                            @if (!empty($addedTags))
                                            @foreach ($addedTags as $tag)
                                            <span class="tag tag-purple">
                                                {{$tag->name}}
                                                <a href="javascript:void(0)" wire:click="removeFromCol({{$tag->id}})"
                                                    class="tag-addon fix-tag-hover"><i class="fe fe-x"></i></a>
                                            </span>
                                            @endforeach
                                            @endif
                                        </div>
                                        <input wire:model.debounce.300ms="queryTag" class="form-control w-100"
                                            placeholder="Search for Below Tags..." type="search">

                                        {{-- get tag serach results --}}
                                        <div>
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
                                        </div>
                                        <div class="bg-white example mt-2">
                                            <div class="tags">
                                                @foreach ($tags as $tag)
                                                <span class="tag">{{$tag->name}}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="javascript:void(0)" class="btn btn-light text-capitalize"
                            data-bs-dismiss="modal">close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')
<script>

</script>
@endpush
