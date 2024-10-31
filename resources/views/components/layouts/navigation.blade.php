<div class=" w-full md:h-22 h-20 flex items-center p-4 md:px-28 px-6 text-primary justify-between">
    <div class="flex-wrap bg-transparent text-primary px-2 py-1 rounded-full">
        <a class="font-bold md:text-3xl text-lg" href="#">
             IslamPro
        </a>
    </div>
    <div class="hidden md:block">
        <ul class="flex md:text-[18px] gap-1 text-sm font-normal bg-tertiary px-2 py-3 rounded-full ease-in-out">
            <x-user-nav-link :active="request()->routeIs('surah')" :link="route('surah')">
                Baca Quran
            </x-user-nav-link>
            <x-user-nav-link :active="request()->routeIs('kajian')" :link="route('kajian')">
                Kajian
            </x-user-nav-link>
            <x-user-nav-link :active="request()->routeIs('sunnah')" :link="route('sunnah')">
                Sunnah
            </x-user-nav-link>
        </ul>
    </div>
</div>
