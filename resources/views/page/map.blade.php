@extends('layouts.app')

@section('title', 'Authentification')
@section('header')
    @extends('layouts.header')
@stop
@section('content')
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>

    <!-- Load the `mapbox-gl-geocoder` plugin. -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
    <style>
        .content {
            position: relative;
            width: 100%;
            height: 100%;
        }
        #map {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Carte
            </h1>
        </div>
    </header>
    <main>
        <div class="content flex flex-wrap flex-row mb-2 justify-center">
            <div id="map"></div>
        </div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYmFwdG1peCIsImEiOiJja3k5d3d5MzUwYXRnMm9sNzF6eDE2cWRnIn0.nOG1aFsL61FWs14DuHEWSA';
            const map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [2.37, 51.03], // starting position [lng, lat]
                zoom: 12 // starting zoom
            });
            map.addControl(new mapboxgl.NavigationControl());

            // Search bar
            const geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                marker: {
                    color: 'orange'
                },
                mapboxgl: mapboxgl
            });

            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true
            }), 'top-left');

            map.addControl(geocoder);
        </script>

    </main>
@stop
