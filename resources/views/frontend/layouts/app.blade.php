<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/img/logokab.png') }}" class="w-3 h-auto">
@stack('style')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-ccTqjDiPdSx-N9Rzy6eN1h_Z1QmQCw&callback=initMap" async
        defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -7.956060,
                    lng: 111.432814
                },
                zoom: 20
            });
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div>

    </div>
    <div class="lg bg-gray-50 dark:bg-gray-900">     
        <livewire:navbar />
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    <div>
        @include('frontend.layouts.footer')
    </div>
</div>
    <script src="{{ asset('js/maps.js') }}"></script>
    
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    @stack('script')

</body>

</html>
