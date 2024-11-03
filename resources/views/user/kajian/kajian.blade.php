<x-layouts.app>
    <div class="md:px-28 px-6 md:py-6 grid md:grid-cols-2 grid-cols-1 gap-4">
        @forelse($data as $d)
            <a href="{{route('kajian.show', ['id'=>$d->id])}}" class="bg-white shadow-md shadow-gray-400 text-primary md:p-4 rounded-md col-span-1 md:gap-4 gap-2 grid md:grid-cols-2 grid-cols-1 hover:shadow-primary hover:shadow cursor-pointer delay-100">
                <div class="col-span-1">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="object-cover h-56 w-full rounded-md">
                </div>
                <div class="col-span-1 px-4 py-2 md:px-0 md:py-0 ">
                    <h1 class="line-clamp-1 hover:line-clamp-2 cursor-pointer mb-1  font-bold">
                        {{$d->judul}}
                    </h1>
                    <div class="border-b-[2px] border-primary my-2"></div>
                    <h1 class="mb-2 flex gap-1 text-sm">
                        <x-icon.caldendar/> {{formatingDate($d->tanggal)}}
                    </h1>
                    <h1 class="mb-2 flex gap-1 text-sm">
                        <x-icon.clock/> {{$d->jam}}
                    </h1>
                    <div class="truncate md:line-clamp-4 line-clamp-2 text-sm">
                        {!! htmlspecialchars_decode($d->description) !!}
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-1 md:col-span-2">
                <x-blank-page/>
            </div>

        @endforelse
        <div  class="md:col-span-2 col-span-1">
            {{$data->links()}}
        </div>
    </div>

</x-layouts.app>
