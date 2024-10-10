<x-layouts.app>
    <section id="hero">
        <x-welcome.hero />
    </section>
    {{-- ini merupakan section surah --}}
    <section id="surah">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:px-64 py-10 px-6">
            @forelse ($data as $key => $value)
                <x-surah-card :data="$value" />
            @empty
                kosong
            @endforelse
        </div>
    </section>
    <x-layouts.footer />
</x-layouts.app>
