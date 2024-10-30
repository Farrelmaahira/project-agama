<x-layouts.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-primary leading-tight">
                {{ __('Kajian') }}
            </h2>
            <div class="join hidden md:block">
                <input class="input input-bordered join-item" placeholder="query" />
                <button class="btn join-item rounded-r-md">search</button>
            </div>
        </div>
    </x-slot>
    <div class="text-sm">
        <div class="mx-22 my-12">
                <div class="flex justify-end my-2">
                    <a class="btn bg-primary font-normal text-white hover:bg-tertiary hover:text-primary" href="{{route('admin.kajian.add')}}">
                        tambah
                    </a>
                </div>
                <div class="w-full flex gap-1  text-center py-2 border-2 border-gray-200 bg-white rounded-md">
                    <div class="md:w-1/6 md:block hidden">
                        Image
                    </div>
                    <div class="md:w-1/6 w-1/5 ">
                        Judul
                    </div>
                    <div class="md:w-1/6 w-1/5">
                        Tanggal
                    </div>
                    <div class="md:w-1/6 w-1/5">
                        Jam
                    </div>
                    <div class="md:w-1/6 w-1/5">
                        Deskripsi
                    </div>
                    <div class="md:w-1/6 w-1/5">
                        Action
                    </div>
                </div>
                <!-- foreach row -->
                @forelse($data as $d)
                    <div class="w-full flex gap-1 mt-2 bg-white  text-center py-2 border-2 border-gray-200 rounded-md items-center">
                        <div class="w-1/6 md:flex hidden justify-center">
                            <img src="{{ asset('storage/' . $d->foto) }}" class="w-32 h-20 object-cover rounded-md">
                        </div>
                        <div class="md:w-1/6 w-1/5 truncate">
                            {{$d->judul}}
                        </div>
                        <div class="md:w-1/6 w-1/5">
                            {{$d->tanggal}}
                        </div>
                        <div class="md:w-1/6 w-1/5">
                            {{$d->jam}}
                        </div>
                        <div class="md:w-1/6 w-1/5 truncate">
                            {{$d->description}}
                        </div>
                        <div class="md:w-1/6 w-1/5 justify-center grid items-center">
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class=" m-1"><x-icon.menu/></div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-44 p-2 shadow">
                                    <li><a>Item 1</a></li>
                                    <li><a>Item 2</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="w-full flex gap-1 mt-2 bg-white  text-center py-2 border-2 border-gray-200 rounded-md justify-center items-center">
                        KOSONG
                </div>
                @endforelse
        </div>
    </div>
</x-layouts.admin-layout>
