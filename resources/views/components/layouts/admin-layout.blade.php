<!doctype html>
<html data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itik.Id</title>
    <link rel="icon" href="/images/itik_icon.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet"
    />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-head.tinymce-config/>

</head>
<body class="font-poppins">

<main>
    <div class="absolute z-50 ">
        @if(session('success') || session('error') || session('info') || $errors->any())
            <div class="py-6">
                <div class="max-w-12xl toast toast-end toast-top mx-auto sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="alert-success alert">
                            {{session('success')}}
                        </div>
                    @elseif (session('info'))
                        <div class="alert-info alert">
                            {{session('info')}}
                        </div>
                    @elseif (session('error'))
                        <div class="alert-error alert">
                            {{session('error')}}
                        </div>
                    @endif
                    @if(count($errors->all()) > 0)
                        <div class="alert alert-error">
                            <ul>
                                @foreach ($errors->all() as $e)
                                    <li>
                                        {{$e}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="md:w-1/6 h-screen md:block hidden shadow-gray-400 shadow-md relative">
            <div class="flex gap-2 items-center justify-center mt-6">
                <img src="/images/itik_icon.png" class="w-6 h-6 object-cover">
                <h1 class="text-2xl text-gray-800 text-center font-bold">
                    Itik.id
                </h1>
            </div>

            <div class="my-14"></div>
           <x-admin-nav-link :active="request()->routeIs('admin.kajian')" :link="route('admin.kajian')">
               <x-icon.college/>
               Kajian
           </x-admin-nav-link>
            <x-admin-nav-link :active="request()->routeIs('admin.sunnah')" :link="route('admin.sunnah')">
               <x-icon.book/>
               Sunnah
           </x-admin-nav-link>
            <div class="absolute  bottom-0 px-6 w-full mb-4">
                <button onclick="logout_desktop.showModal()" class="border-2 py-2 px-2 w-full border-gray-200 max-w-xl rounded-md flex gap-6 justify-start hover:border-primary hover:bg-primary hover:text-white cursor-pointer delay-100" >
                    <x-icon.signout/>
                    Sign Out
                </button>
                <dialog id="logout_desktop" class="modal">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <h3 class="text-lg font-bold">Alert!</h3>
                        <p class="py-4">Apakah anda yakin ingin logout?</p>
                        <div class="modal-action">
                            <a class="btn bg-primary text-white hover:text-primary hover:bg-tertiary" href="{{route('admin.logout')}}">
                                logout
                            </a>
                        </div>
                    </div>
                </dialog>
            </div>

        </div>

        <!-- Content Area -->
        <div class="md:w-5/6 w-full h-screen overflow-y-scroll bg-base md:px-4 px-2">
            @if (isset($header))
                <header class="bg-base w-full">
                    <div class="max-w-12xl mx-auto md:py-3 py-2 ">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{ $slot }}
                <div class="h-28"></div>
                <x-layouts.admin-bottom-nav/>
        </div>
    </div>
</main>

</body>
</html>
