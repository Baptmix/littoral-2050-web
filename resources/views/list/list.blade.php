@extends('layouts.app')
@section('header')
    @extends('layouts.header')
@stop
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Liste des villes
            </h1>
        </div>
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
    </header>
    <main>
        <div class="content flex flex-wrap flex-row mb-2 justify-center">
            @foreach($cities as $city)
                <a href="{{route("list_offices", ["city" => urlencode($city->city)])}}" class="m-4 block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$city->city}}</h5>
                </a>
            @endforeach
        </div>

    </main>
@stop
