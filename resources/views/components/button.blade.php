<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn btn-primary'
]) }}>
{{ $slot }}
</button>
