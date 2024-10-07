@props(['data'])
<a href="{{route('surah.show', ['id'=>$data['number']])}}">
    <div class="border-2 border-gray-800 rounded-md flex gap-2 h-20 w-full p-2 items-center hover:bg-gray-800 hover:text-white ">
        <div class="md:flex-1 flex-auto flex gap-4 items-center">
            <div class="w-8 h-8 border-2 rounded-full text-white bg-gray-800 hover:bg-inherit hover:text-inherit text-center align-middle">
                {{convertToArabicNumerals($data['number'])}}
            </div>
            <div class="text-left">
                <h1 class="font-bold">
                    {{$data['name']['transliteration']['id']}}
                </h1>
                <p>
                    {{$data['name']['translation']['id']}}
                </p>
            </div>
        </div>
        <div class="flex-wrap ">
            <h1 class="font-bold">
                {{$data['name']['short']}}
            </h1>
            <p>
                {{$data['numberOfVerses']}} Ayat
            </p>
        </div>
    </div>
</a>
