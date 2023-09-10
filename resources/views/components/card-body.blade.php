<div {{ $attributes->class([
    'card-body'
]) }}>
    {{ $slot }}
    @if(isset($right))
            <div>
                {{ $right }}
            </div>
    @endif
</div>
