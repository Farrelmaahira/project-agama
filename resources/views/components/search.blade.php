@props(['link' => '#'])
<div class="join">
    <form action="{{ $link }}" method="get" class="join">
        <input
            class="input border-2 border-primary focus:ring-0 focus:border-primary outline-none focus:outline-none join-item"
            placeholder="Cari sesuatu disini ..."
            name="search"
            autofocus
        />
        <button
            class="btn bg-primary hover:bg-tertiary font-normal text-white hover:text-primary join-item rounded-r-md border-l-0 border-2 border-primary focus:ring-0 focus:border-primary outline-none"
            type="submit"
        >
            <x-icon.search/>
        </button>
    </form>
</div>
