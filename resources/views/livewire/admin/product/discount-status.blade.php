<div>
    <label class="custom-switch form-switch" for=" {{$name.$product->id}} ">
        <input wire:model="discount_status" id=" {{$name.$product->id}} " type="checkbox" name="toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
    </label>
</div>
