<x-layouts.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 border-b-2">
            <h2 class="font-semibold text-xl text-primary leading-tight">
                {{ __('Edit Data Kajian') }}
            </h2>
        </div>
    </x-slot>
    <form class="my-2 grid md:grid-cols-2 grid-cols-1 gap-4" method="POST" action="{{route('admin.kajian.update', ['id'=>$data->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label class="form-control w-full max-w-2xl md:col-span-1 col-span-2">
            <div class="label">
                <span class="label-text">Judul Kajian</span>
            </div>
            <input type="text" placeholder="Type here" name="judul" value="{{$data->judul}}" class="input input-bordered w-full max-w-2xl" />
        </label>
        <label class="form-control w-full max-w-2xl md:col-span-1 col-span-2">
            <div class="label">
                <span class="label-text">Masukkan Thumbnail</span>
            </div>
            <input type="file" placeholder="Type here" name="foto" class="file-input file-input-bordered w-full max-w-2xl" />
        </label>
        <label class="form-control w-full max-w-2xl md:col-span-1 col-span-2">
            <div class="label">
                <span class="label-text">Tanggal Kajian</span>
            </div>
            <input type="date" placeholder="Type here" value="{{$data->tanggal}}" name="tanggal" class="input input-bordered w-full max-w-2xl" />
        </label>
        <label class="form-control w-full max-w-2xl md:col-span-1 col-span-2">
            <div class="label">
                <span class="label-text">Waktu Kajian</span>
            </div>
            <input type="time" placeholder="Type here" name="jam" value="{{ \Carbon\Carbon::parse($data->jam)->format('H:i') }}"  class="file-input px-4 file-input-bordered w-full max-w-2xl" />
        </label>
        <label class="form-control w-full col-span-2">
            <div class="label">
                <span class="label-text">Kajian Description</span>
            </div>
            <textarea id="description" name="description">
                {!! htmlspecialchars_decode($data->description) !!}
            </textarea>
        </label>
        <div class="col-span-2 items-end">
            <button class="btn btn-primary max-w-24 " type="submit">
                Submit
            </button>
        </div>
    </form>

</x-layouts.admin-layout>
