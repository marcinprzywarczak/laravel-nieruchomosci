@props(['type' => 'danger'])

<div class="toast align-items-center bg-{{ $type }} border-0
    @if ($type !== 'warning')
    text-white
    @endif
" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            {{ $slot }}
        </div>
        <button type="button" class="btn-close
            @if($type !== 'warning')
                btn-close-white
            @endif
            me-2 m-auto
        " data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>