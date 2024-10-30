@props(["link", "active"])

@php
    $classes = ($active ?? false)
                ? 'bg-tertiary py-4 px-4 rounded-lg justify-start font-semibold mx-4 flex-auto flex gap-6 transition-all duration-300 ease-in-out'
                : 'bg-transparent text-grey-400 py-4 px-4 rounded-lg justify-start font-semibold mx-4 flex-auto flex gap-6 ';
    $borderClasses = ($active ?? false)
                ? 'px-[1px] py-4 bg-primary transition-all duration-600 ease-in-out'
                : 'px-[1px] py-4 bg-transparent ';
@endphp

<div class="flex my-6">
    {{-- Side border --}}
    <div {{ $attributes->merge(['class' => $borderClasses]) }}></div>
    <a {{ $attributes->merge(['class' => $classes]) }} href="{{ $link ?? '' }}">
        {{ $slot }}
    </a>
</div>
