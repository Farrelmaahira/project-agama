<div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg md:hidden block">
    <div class="flex justify-around py-2">
        <x-bottom-nav-link :active="request()->routeIs('admin.kajian')" :link="route('admin.kajian')">
            <x-icon.college/>
            <span class="text-xs">Kajian</span>
        </x-bottom-nav-link>
        <x-bottom-nav-link :active="request()->routeIs('admin.sunnah')" :link="route('admin.sunnah')">
            <x-icon.book/>
            <span class="text-xs">Sunnah</span>
        </x-bottom-nav-link>

    </div>
</div>
