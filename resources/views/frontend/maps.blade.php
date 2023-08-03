@extends('layouts.app')

@section('content')
    <div id="map" style="height: 400px;"></div>
@endsection

@push('scripts')
    <!-- Load the Google Maps API with your API key -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-ccTqjDiPdSx-N9Rzy6eN1h_Z1QmQCw&libraries=places&callback=initMap"
        async defer></script>

    <!-- Load your map.js file after the Google Maps API -->
    <script src="{{ asset('js/map.js') }}" defer></script>
@endpush
