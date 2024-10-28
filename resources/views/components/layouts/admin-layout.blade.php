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
    @vite('resources/css/app.css')

</head>
<body  class="font-poppins">

{{--    body      --}}
<main>
    <div class="flex h-screen gap-4">
        <div class="md:w-1/6 h-screen md:block hidden p-4">
            <div class="my-6">
                <h1 class="text-xl text-gray-800 text-center font-bold">
                    Islam.pro
                </h1>
                <div class="mt">

                </div>
            </div>
        </div>
        <div class="md:w-5/6 w-full h-[100dvh] overflow-y-scroll bg-base">
            {{ $slot }}
        </div>
    </div>

</main>

</body>
</html>
