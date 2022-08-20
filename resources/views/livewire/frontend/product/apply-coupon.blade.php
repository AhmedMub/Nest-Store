<div>
    {{-- / element will be removed if discount coupon applied --}}
    @if ($disabled)
    <form method="POST" class="apply-coupon" wire:submit.prevent="checkCoupon">
        <input type="text" wire:model.defer="coupon" placeholder="Enter Coupon Code...">
        <button class="btn btn-md">
            {{__('frontend/checkout.Apply Coupon')}}</button>
    </form>
    <x-defaults.input-error for="coupon" />
    @endif
</div>
