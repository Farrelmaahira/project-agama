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
    <div class="flex h-screen gap-4">
        <!-- Sidebar -->
        <div class="md:w-1/6 h-screen md:block hidden shadow-gray-400 shadow-md">
            <h1 class="text-xl text-gray-800 text-center font-bold mt-12">
                Islam.pro
            </h1>
            <div class="my-14"></div>
           <x-admin-nav-link :active="true">
               <x-icon.college/>
               Kajian
           </x-admin-nav-link>
            <x-admin-nav-link >
               <x-icon.college/>
               Sunnah
           </x-admin-nav-link>
            <x-admin-nav-link >
               <x-icon.college/>
               Settings
           </x-admin-nav-link>
        </div>

        <!-- Content Area -->
        <div class="md:w-5/6 w-full h-screen overflow-y-scroll bg-base">
            {{ $slot }}
        </div>
    </div>
</main>

</body>
</html>
