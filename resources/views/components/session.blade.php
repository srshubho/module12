@if (session($type))
    <x-alert type="{{ $type }}">
        {{ session($type) }}
    </x-alert>
@endif
