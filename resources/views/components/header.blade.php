<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        {{ $title ?? '' }}
    </h1>
    @isset($actions)
        <div>
            {{ $actions }}
        </div>
    @endisset
</div>
