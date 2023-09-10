@props([
    'method' => 'POST',
])

@php
    $method = strtoupper($method);
    $_method = in_array($method, ['GET', 'POST'])
@endphp

<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">
    @if(!$_method)
        @method($method)
    @endif
    @csrf
    {{ $slot }}
</form>
