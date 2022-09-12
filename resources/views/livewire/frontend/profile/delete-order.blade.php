<div wire:ignore.self class="modal fade" id="cancelRequest" tabindex="-1" aria-labelledby="cancelRequestLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" wire:submit.prevent='confirm({{$order}})'>
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="cancelRequestLabel">cancel request
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <textarea wire:model.defer="reason" cols="30" rows="10"></textarea>
                    <x-defaults.input-error for="reason" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('added-scripts')
<script>
    window.addEventListener('hideModal', event=>{
            $('#cancelRequest').modal('hide');
        });
</script>
@endpush
