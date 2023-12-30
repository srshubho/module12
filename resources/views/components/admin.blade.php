@if (auth()->user()->is_admin)
    <div>
        {{ $slot }}
    </div>
@endif
