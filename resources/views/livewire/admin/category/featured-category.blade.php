<div>
    <label class="custom-switch form-switch" for=" {{$name.$category->id}} ">
        <input wire:model="featured_category" id=" {{$name.$category->id}} " type="checkbox" name="toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
    </label>
</div>
