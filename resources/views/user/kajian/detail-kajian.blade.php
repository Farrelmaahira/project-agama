<x-layouts.app>
    <div class="md:px-28 md:my-6 px-6 py-2 grid grid-cols-5 gap-4">
        <div class="md:col-span-2 col-span-5">
            <img src="{{ $data->foto!= null?asset('storage/' . $data->foto):asset('images/no-image.jpg') }}" class="object-cover w-full rounded-md">
        </div>
        <div class="md:col-span-3 col-span-5">
            <h1 class="col-span-1 text-primary font-bold text-2xl">
                {{$data->judul}}
            </h1>
            <div class="border-b-[2px] border-primary my-4"></div>
            <div>
                <div class="flex gap-2 mb-4">
                    <x-icon.caldendar/> {{formatingDate($data->tanggal)}}
                </div>
                <div class="flex gap-2 mb-4">
                    <x-icon.clock/> {{$data->jam}}
                </div>
                <p>
                    Deskripsi:
                </p>
                <div class="border-b-[1px] border-primary my-2"></div>
                {!! htmlspecialchars_decode($data->description) !!}
            </div>
        </div>
    </div>
</x-layouts.app>
