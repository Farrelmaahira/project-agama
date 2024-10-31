<!doctype html>
<html data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muslim Pro</title>

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
    @if(session('success') || session('error') || session('info'))
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
                    <div class="alert-info alert">
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
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="md:w-1/6 h-screen md:block hidden shadow-gray-400 shadow-md relative">
            <h1 class="text-2xl text-gray-800 text-center font-bold mt-6">
                IslamPro
            </h1>
            <div class="my-14"></div>
           <x-admin-nav-link :active="request()->routeIs('admin.kajian')" :link="route('admin.kajian')">
               <x-icon.college/>
               Kajian
           </x-admin-nav-link>
            <x-admin-nav-link :active="request()->routeIs('admin.sunnah')" :link="route('admin.sunnah')">
               <x-icon.college/>
               Sunnah
           </x-admin-nav-link>
            <x-admin-nav-link >
               <x-icon.college/>
               Settings
           </x-admin-nav-link>
            <div class="absolute  bottom-0 px-6 w-full mb-4">
                <a class="border-2 py-2 px-4 border-gray-200 rounded-md flex gap-6 justify-start hover:border-primary hover:bg-primary hover:text-white cursor-pointer delay-100" href="{{route('admin.logout')}}">
                    <x-icon.signout/>
                    Sign Out
                </a>
            </div>

        </div>

        <!-- Content Area -->
        <div class="md:w-5/6 w-full h-screen overflow-y-scroll bg-base md:px-4 px-2">
            @if (isset($header))
                <header class="bg-base">
                    <div class="max-w-12xl mx-auto md:py-3 py-2 ">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{ $slot }}
        </div>
    </div>
</main>

</body>
</html>
