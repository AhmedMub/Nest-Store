<div>
    <label class="custom-switch form-switch" for=" {{$name.$category->id}} ">
        <input wire:model="default_icon_status" id=" {{$name.$category->id}} " type="checkbox" name="toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
    </label>
</div>
