@props(['title', 'url' => null, 'badge' => null])

<article {{ $attributes->merge(['class' => 'card']) }}>
    <h3>
        @if($url)
            <a href="{{ $url }}">{{ $title }}</a>
        @else
            {{ $title }}
        @endif
    </h3>

    @if ($badge)
        <x-badge>{{ $badge }}</x-badge>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</article>