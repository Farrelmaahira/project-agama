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
                    <div class="md:w-1/5 md:block hidden">
                        Image
                    </div>
                    <div class="md:w-1/5 w-1/4 ">
                        Judul
                    </div>
                    <div class="md:w-1/5 w-1/4">
                        Tanggal
                    </div>
                    <div class="md:w-1/5 w-1/4">
                        Jam
                    </div>
                    <div class="md:w-1/5 w-1/4">
                        Action
                    </div>
                </div>
                <!-- foreach row -->
                @forelse($data as $d)
                    <div class="w-full flex gap-1 mt-2 bg-white  text-center py-2 border-2 border-gray-200 rounded-md items-center cursor-pointer">
                        <div class="w-1/5 md:flex hidden justify-center">
                            <img src="{{ asset('storage/' . $d->foto) }}" class="w-32 h-20 object-cover rounded-md">
                        </div>
                        <div class="md:w-1/5 w-1/4 truncate">
                            {{$d->judul}}
                        </div>
                        <div class="md:w-1/5 w-1/4">
                            {{$d->tanggal}}
                        </div>
                        <div class="md:w-1/5 w-1/4">
                            {{$d->jam}}
                        </div>
                        <div class="md:w-1/5 w-1/4 justify-center flex items-center">
                            <div class="dropdown dropdown-end ">
                                <div tabindex="0" role="button" class=" m-1"><x-icon.menu/></div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-md z-[1] w-44 p-2 shadow">
                                    <li><a href="{{route('admin.kajian.edit', ['id'=> $d->id])}}">edit data</a></li>
                                    <li><button class="bg-transparent text-start border-none" onclick="hapus_kajian.showModal()">hapus data</button></li>
                                </ul>
{{--                                delete alert modals--}}
                                <dialog id="hapus_kajian" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="text-lg font-bold">Alert!</h3>
                                        <p class="py-4">Apakah anda yakin akan menghapus kajian ini?</p>
                                        <div class="modal-action">
                                            <a class="btn bg-primary text-white hover:text-primary hover:bg-tertiary" href="{{route('admin.kajian.destroy', ['id'=>$d->id])}}">
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </dialog>
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
