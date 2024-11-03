@props(['link', 'active'])
@php
    $classes = ($active ?? false)
                ? 'bg-primary text-tertiary transition-colors duration-300 delay-100 cursor-pointer px-2 py-1 rounded-full'
                : 'cursor-pointer px-2 py-1 rounded-full transition-colors duration-300';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }} href="{{$link??''}}">{{ $slot }}</a>
</li>
