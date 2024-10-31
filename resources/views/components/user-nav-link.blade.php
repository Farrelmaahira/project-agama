@props(['link', 'active'])
@php
    $classes = ($active ?? false)
                ? 'bg-primary text-white cursor-pointer px-2 py-1 rounded-full'
                : 'cursor-pointer px-2 py-1 rounded-full ';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }} href="{{$link??''}}">{{ $slot }}</a>
</li>
