<div>
    <div class="lds-hourglass custom-style"></div>
    <div class="customBG"></div>
</div>

@push('child-styles')
<style>
    .make-relative {
        position: relative
    }

    .custom-style {
        position: absolute !important;
        top: 50%;
        left: 50%;
        margin: -25px 0 0 -25px !important;
        z-index: 12;
    }

    .customBG {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
        top: 0;
        left: 0;
        z-index: 11;
    }
</style>
@endpush
