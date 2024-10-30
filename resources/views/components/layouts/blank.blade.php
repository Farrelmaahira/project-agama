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
<body class="font-poppins">

{{--    body      --}}
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
    {{ $slot }}
</main>

</body>
</html>
