@props([
    'name' => '',
    'value' => old($name),
])

@if($errors->has($name))
    <div class="small text-danger">
        {{ $errors->first($name) }}
    </div>
@endif
<input name="{{ $name }}" value="{{ $value }}" {{ $attributes->class([
    'form-control', 'text-center',
    ])->merge([
    'type' => 'text',
]) }}>
