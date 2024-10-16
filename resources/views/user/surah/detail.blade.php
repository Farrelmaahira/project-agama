<x-layouts.app>
    <style>
        /*.line{*/
        /*    line-height: 4rem;*/
        /*}*/
    </style>
    <div class="grid grid-cols-1 gap-12 md:px-32 py-14 px-2">
        @forelse ($data as $d)
            <div class=" px-3 pb-6 md:mx-48 col-span-1 border-b-2">
                <div class="flex gap-4 justify-end items-center">

                    <div class="text-xl text-end md:text-4xl font-normal max-w-[18rem] md:max-w-4xl  leading-[3rem] md:leading-loose inline-block">
                        {{$d['ar']}}  <span class="md:w-10 md:h-10 w-8 h-8 p-1 md:text-2xl text-lg md:border-2  border-2 border-gray-800 text-gray-800 rounded-full  text-center align-middle">
                        {{convertToArabicNumerals($d['nomor'])}}
                    </span>
                    </div>
                </div>
                <div class="mt-14">
                    <p class="text-sm md:text-lg font-semibold font-serif">{!! htmlspecialchars_decode($d['tr']) !!}</p>
                    <p class="text-sm md:text-xl">{!! $d['id'] !!}</p>
                </div>
            </div>

        @empty
            kosong
        @endforelse
    </div>
</x-layouts.app>
