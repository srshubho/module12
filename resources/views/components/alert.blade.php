<div @class([
    'alert',
    'alert-success' => $type === 'success',
    'alert-danger' => $type === 'error',
    'alert-warning' => $type === 'warning',
    'alert-info' => $type === 'info',
    'alert-dismissible',
    'fade',
    'show',
]) role="alert">
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
