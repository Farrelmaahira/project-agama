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

</head>
<body class="font-poppins">

<main>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="md:w-1/6 h-screen md:block hidden shadow-gray-400 shadow-md">
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
