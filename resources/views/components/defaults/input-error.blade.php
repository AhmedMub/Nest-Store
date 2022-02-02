@props(['for'])

@error($for)
<span {{ $attributes->merge(['class' => 'invalid-feedback invalid-feedback-fix']) }} role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
