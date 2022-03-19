<div x-data="{ working: false }" x-cloak wire:key="{{ $value }}">
    <span>
        <button type="button" class="btn btn btn-danger rounded" data-toggle="modal" data-target="#modal-delete-{{ $value }}">
            @include('datatables::icons.trash')
        </button>
    </span>

    <div class="modal fade" id="modal-delete-{{ $value }}" tabindex="-1" aria-labelledby="modal-delete-label-{{ $value }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-label-{{ $value }}">{{ __('LivewireDatatableBs4::datatable.modal_delete_title', ['id' => $value]) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        {{ __('LivewireDatatableBs4::datatable.modal_delete_info') }}
                    </p>
                    <p class="d-flex justify-content-center">
                        <span x-show="working">@include('datatables::icons.loading') {{ __('LivewireDatatableBs4::datatable.deleting') }}</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button x-bind:disabled="working" type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('LivewireDatatableBs4::datatable.no') }}
                    </button>
                    <span x-on:click="working = !working">
                        <button wire:click="delete({{ $value }})" type="button" class="btn btn-danger" data-dismiss="modal">
                            {{ __('LivewireDatatableBs4::datatable.yes') }}
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
