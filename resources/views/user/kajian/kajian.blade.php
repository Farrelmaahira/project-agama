<x-layouts.app>
    <div class="md:px-32 px-6 md:py-6 grid md:grid-cols-3 grid-cols-1 gap-4">
        @forelse($data as $d)
            <div class="bg-secondary md:p-4 rounded-md col-span-1 md:gap-4 gap-2 grid md:grid-cols-2 grid-cols-1">
                <div class="col-span-1">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="object-cover h-64 w-full rounded-md">
                </div>
                <div class="col-span-1 px-4">
                    <h1 class="">
                        {{$d->judul}}
                    </h1>
                    <h1>
                        {{$d->tanggal}}
                    </h1>
                    <h1>
                        {{$d->jam}}
                    </h1>
                </div>
            </div>
        @empty
        @endforelse

    </div>
</x-layouts.app>
