<div wire:ignore.self class="modal fade" id="smallmodalDelete">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center p-4 pb-5">
                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
                <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24">
                        <path fill="#f07f8f"
                            d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z" />
                        <circle cx="12" cy="17" r="1" fill="#e62a45" />
                        <path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z" />
                    </svg></span>
                <h4 class="h4 mb-0 mt-3">Warning</h4>
                <p class="card-text">Are you sure you want to delete this shipping Area</p>
                <form class="d-inline" method="POST" wire:submit.prevent='delete'>
                    @csrf
                    <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25"
                        data-bs-dismiss="modal">Continue</button>
                </form>
                <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
            </div>
        </div>
    </div>
</div>
