<div>
    <label class="custom-switch form-switch" for=" {{$name.$country->id}} ">
        <input wire:model="status" id=" {{$name.$country->id}} " type="checkbox" name="toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
    </label>
</div>
