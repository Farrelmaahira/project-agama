<x-layouts.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 border-b-2">
            <h2 class="font-semibold text-xl text-primary leading-tight">
                {{ __('Tambah Kajian') }}
            </h2>
        </div>
    </x-slot>
    <div class="my-2 flex gap-4">
        <label class="form-control w-full max-w-xs ">
            <div class="label">
                <span class="label-text">Judul Kajian</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        </label>
        <label class="form-control w-full max-w-xs">
            <div class="label">
                <span class="label-text">Masukkan Thumbnail</span>
            </div>
            <input type="file" placeholder="Type here" class="file-input file-input-bordered w-full max-w-xs" />
        </label>

    </div>
</x-layouts.admin-layout>
