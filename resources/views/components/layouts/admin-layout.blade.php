<!doctype html>
<html data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muslim Pro</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/app.css')

</head>
<body>

{{--    body      --}}
<main>
    <div class="flex h-screen gap-4">
        <div class="w-1/6 h-screen shadow-md shadow-gray-400">

        </div>
        <div class="w-5/6 h-screen overflow-y-scroll">
            {{ $slot }}
        </div>
    </div>

</main>

</body>
</html>