@props(['data'])
<a href={{ route('surah.show', ['id' => $data['nomor'], 'slug' => $data['slug']]) }}>
    <div class="border-2 border-primary rounded-md flex gap-2 h-20 w-full p-2 items-center hover:bg-primary hover:text-white ">
        <div class="md:flex-1 flex-auto flex gap-4 items-center">
            <div class="w-8 h-8 grid items-center border-2 rounded-full text-white bg-primary hover:bg-inherit hover:text-inherit text-center align-middle">
                {{convertToArabicNumerals($data['nomor'])}}
            </div>
            <div class="text-left">
                <h1 class="font-bold">
                    {{$data['nama']}}
                </h1>
                <p>
                    {{$data['arti']}}
                  </p>
            </div>
        </div>
        <div class="flex-wrap ">
            <h1 class="font-bold">
                {{$data['asma']}}
            </h1>
            <p>
                {{$data['ayat']}} Ayat
            </p>
        </div>
    </div>
</a>
