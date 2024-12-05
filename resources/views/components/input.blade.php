@props([
    'name' => '',
    'value' => old($name),
    'placeholder' => ''
])

@if($errors->has($name))
    <div class="small text-danger">
        {{ $errors->first($name) }}
    </div>
@endif
<input name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" {{ $attributes->class([
    'form-control', 'text-start',
    ])->merge([
    'type' => 'text',
]) }}>
