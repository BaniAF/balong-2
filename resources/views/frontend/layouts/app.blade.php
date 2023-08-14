<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/img/logokab.png') }}" class="w-3 h-auto">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-ccTqjDiPdSx-N9Rzy6eN1h_Z1QmQCw&callback=initMap" async
        defer></script>
        
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -7.2575,
                    lng: 112.7521
                },
                zoom: 10
            });
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div>

    </div>
    <div class="lg bg-gray-50 dark:bg-gray-900">
        {{-- @include('frontend.layouts.navbar') --}}
        <livewire:navbar />

        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
          </div>
    </div>
    <div>
        @include('frontend.layouts.footer')
    </div>

    <script src="{{ asset('js/maps.js') }}"></script>
    @livewireScripts

</body>

</html>
