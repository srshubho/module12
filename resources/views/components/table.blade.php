@props(['headers', 'data', 'actions'])
@php
    $actions = $actions ?? true;
@endphp
<div class="table-responsive">
    <table class="table align-middle mb-0">
        <thead class="table-light">
            <tr>

                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
                @if ($actions)
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            {{ $slot }}

        </tbody>

    </table>
    <!-- end table -->
</div>
