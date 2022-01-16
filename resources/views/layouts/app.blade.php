<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Littoral 2050 - Administration</title>
    <link rel="icon" type="image/png" href="{{ asset('img/vm.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>
<body>
<header>
    @yield('header')
</header>
<style>
    .flash {
        position: absolute;
        right: 1%;
        top: 10px;
    }
</style>
@if(\Illuminate\Support\Facades\Session::has('success'))
    <!-- component -->
    <!-- This is an example component -->
    <div class="flash flex">
        <div class="m-auto">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                <div class="flex flex-row">
                    <div class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" color="#44C997" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-2 mr-6">
                        <span class="font-semibold">Information</span>
                        <span class="block text-gray-500">{{\Illuminate\Support\Facades\Session::get('success')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('fail'))
    <!-- component -->
    <!-- This is an example component -->
    <div class="flash flex">
        <div class="m-auto">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                <div class="flex flex-row">
                    <div class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" color="#c94444" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-2 mr-6">
                        <span class="font-semibold">Avertissement</span>
                        <span class="block text-gray-500">{{\Illuminate\Support\Facades\Session::get('fail')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@yield('content')
</body>
<footer>
    @yield('footer')
</footer>
</html>
