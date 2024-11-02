<x-layouts.app>
    <div class="md:py-6 py-4 md:px-32 px-4 grid grid-cols-1 gap-4">
        @forelse($data as $d)
            <a href="{{route('sunnah.show', ['id'=>$d->id])}}" class="bg-white  rounded-lg shadow-gray-400 shadow-md  p-4 grid  grid-cols-4 gap-8 hover:shadow-primary delay-100 hover:shadow cursor-pointer text-primary">
                <div class="h-52 md:col-span-1 col-span-4  card">
                    <img src="{{ asset('storage/' . $d->foto) }}" class="object-cover h-52 w-full rounded-md bg-bgimage">
                </div>
                <div class="md:col-span-3  col-span-4 block">
                    <h1 class="font-bold text-xl  tracking-wider mb-1">
                        {{$d->judul}}
                    </h1>
                    <div class="border-b-[1px] border-secondary"></div>
                    <div class="my-4">
                        {!!htmlspecialchars_decode($d->description)!!}
                    </div>
                </div>
            </a>
        @empty
        @endforelse
    </div>
</x-layouts.app>
