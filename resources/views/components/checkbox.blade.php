@php($id = Str::uuid())

<input type="checkbox" name="remember" id="{{ $id }}" {{ $attributes->merge([
    'checked' => '1',
]) }}>
<label for="{{ $id }}">
    {{ $slot }}
</label>
