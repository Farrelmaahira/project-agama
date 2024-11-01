<div class=" w-full md:h-22 h-20 flex items-center p-4 md:px-28 px-6 text-primary justify-between fixed bg-white z-20" id="navbar">
    <div class="flex-wrap bg-transparent text-primary px-2 py-1 rounded-full">
        <a class="font-bold md:text-3xl text-lg" href="#">
             Itik.id
        </a>
    </div>
    <div class="hidden md:block">
        <ul class="flex md:text-[18px] gap-1 text-sm font-normal bg-tertiary px-2 py-3 rounded-full transition-all ease-in-out duration-300">
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
    </div>
</div>
<div class="md:h-22 h-20"></div>
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
