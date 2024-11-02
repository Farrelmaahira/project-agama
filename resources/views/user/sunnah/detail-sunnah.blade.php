<x-layouts.app>
    <div class="md:px-28 md:my-14 grid grid-cols-5 gap-4">
        <div class="col-span-2">
            <img src="{{ asset('storage/' . $data->foto) }}" class="object-cover h-96 w-full rounded-md">
        </div>
        <div class="col-span-3">
            <h1 class="col-span-1 text-primary font-bold text-2xl">
                 {{$data->judul}}
            </h1>
            <div class="border-b-[1px] border-primary my-4"></div>d
            <div>
                {!! htmlspecialchars_decode($data->description) !!}
            </div>
        </div>
    </div>
</x-layouts.app>
