<div class="alert alert-primary rounded-0 small py-2" role="alert">
    {{ $slot }}
</div>
{{ session()->forget('alert') }}
