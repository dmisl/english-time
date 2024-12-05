@props(['required' => false])


<label {{ $attributes->class([
    'mb-1', 'ms-1', ($required ? 'required' : ''), 'fs-5'
]) }}>
    {{ $slot }}
</label>
