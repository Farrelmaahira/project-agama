<x-layouts.app>
    <div class="md:py-6 py-4 md:px-32 px-4 grid grid-cols-1 gap-4">
        @forelse($data as $d)
            <div class="bg-secondary rounded-lg shadow-gray-200 p-4 grid  grid-cols-4 gap-8">
                <div class="h-52 md:col-span-1 col-span-4">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="object-cover h-52 w-full rounded-md">
                </div>
                <div class="md:col-span-3  col-span-4 block">
                    <h1 class="font-bold text-xl text-white tracking-wider">
                        {{$d->judul}}
                    </h1>
                    <div class="my-4 text-white">
                        {!!htmlspecialchars_decode($d->description)!!}
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-layouts.app>
