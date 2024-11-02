<x-layouts.app>
    <div class="md:px-28 px-6 md:py-6 grid md:grid-cols-3 grid-cols-1 gap-4">
        @forelse($data as $d)
            <a class="bg-secondary md:p-4 rounded-md col-span-1 md:gap-4 gap-2 grid md:grid-cols-2 grid-cols-1 hover:shadow-primary hover:shadow cursor-pointer delay-100">
                <div class="col-span-1">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="object-cover h-64 w-full rounded-md">
                </div>
                <div class="col-span-1 px-4 py-2 md:px-0 md:py-0 text-white ">
                    <h1 class="line-clamp-1 hover:line-clamp-2 cursor-pointer mb-1  font-bold">
                        {{$d->judul}}
                    </h1>
                    <h1 class="mb-1">
                        Tanggal: {{$d->tanggal}}
                    </h1>
                    <h1 class="mb-1">
                        Jam: {{$d->jam}}
                    </h1>
                    <div class="truncate line-clamp-4">
                        {!! htmlspecialchars_decode($d->description) !!}
                    </div>
                </div>
            </a>
        @empty
        @endforelse

    </div>
</x-layouts.app>
