<div>
    <label class="custom-switch form-switch" for=" {{$name.$coupon->id}} ">
        <input wire:model="status" id=" {{$name.$coupon->id}} " type="checkbox" name="toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
    </label>
</div>
