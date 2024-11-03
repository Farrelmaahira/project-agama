<?php
//    if(request()->routeIs(''))
//?><!---->

<div class=" w-full md:h-22 h-20 flex items-center p-4 md:px-28 text-primary justify-between fixed bg-white z-20 " id="navbar">
    <div class="flex-wrap flex items-center justify-start bg-transparent text-primary px-2 py-1 rounded-full">
        @if(request()->routeIs('sunnah.show') || request()->routeIs('kajian.show'))
            <a class="btn btn-circle btn-ghost text-primary md:hidden cursor-pointer"  href="{{url()->previous()}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
        @endif
        <div class="flex gap-2 justify-start items-center">
            <img src="/images/itik_icon.png" class="w-6 h-6 object-cover">
            <a class="font-bold md:text-3xl text-2xl" href="{{route('surah')}}">
                Itik.id
            </a>
        </div>

    </div>
    <div class="flex gap-2" >
        <ul class="md:flex hidden md:text-[18px] gap-1 text-sm font-normal bg-tertiary px-2 py-3 rounded-full transition-all ease-in-out duration-300">
            <x-user-nav-link :active="request()->routeIs('surah')" :link="route('surah')">
                Al-Qur'an
            </x-user-nav-link>
            <x-user-nav-link :active="request()->routeIs('sunnah')" :link="route('sunnah')">
                Sunnah
            </x-user-nav-link>
            <x-user-nav-link :active="request()->routeIs('kajian')" :link="route('kajian')">
                Kajian
            </x-user-nav-link>
        </ul>
        @if(request()->routeIs('sunnah') || request()->routeIs('kajian'))
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-circle bg-tertiary hover:bg-primary text-primary hover:text-tertiary"><x-icon.search/></div>
                <ul tabindex="0" class="dropdown-content  bg-base-100 rounded-box z-[1] my-4 max-w-2xl p-2 shadow">
                    @if(request()->routeIs('sunnah'))
                        <li>
                            <x-search :link="route('sunnah')" autofocus/>
                        </li>
                    @elseif(request()->routeIs('kajian'))
                        <li>
                            <x-search :link="route('kajian')" autofocus/>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
</div>

{{--<script>--}}
{{--    window.addEventListener("scroll", function() {--}}
{{--        const navbar = document.getElementById("navbar");--}}
{{--        if (window.scrollY > 50) {--}}
{{--            navbar.classList.add("bg-primary", "fixed"); // Ganti warna dan padding sesuai keinginan--}}
{{--            navbar.classList.remove("bg-transparent");--}}
{{--        } else {--}}
{{--            navbar.classList.add("bg-transparent");--}}
{{--            navbar.classList.remove("bg-primary", "fixed");--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
