<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header justify-content-between">
        @isset($label)
            <h4>{{ $label }}</h4>
        @endisset
        @isset($button)
            {{ $button }}
        @endisset
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
