@extends('layouts.app')
@section('header')
    @extends('layouts.header')
@stop
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Ajout utilisateur
            </h1>
        </div>
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
    </header>
    <main>
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="mt-10 shadow rounded-md sm:overflow-hidden">
                        <div>
                            <form action="{{ route('add_user') }}" method="POST" class="mb-0">
                                <div class="">
                                    <div class="px-4 py-5 bg-white">
                                        <div class="grid grid-cols-10 gap-10">
                                            <div class="col-span-10">
                                                <label for="email"
                                                       class="required block text-sm font-medium text-gray-700">E-mail</label>
                                                <input type="email" name="email" id="email"
                                                       autocomplete="email"
                                                       placeholder="E-mail" required
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10">
                                            </div>
                                            <div class="col-span-10">
                                                <label for="username"
                                                       class="required block text-sm font-medium text-gray-700">Nom
                                                    d'utilisateur</label>
                                                <input type="text" name="name" placeholder="Nom d'utilisateur" id="name"
                                                       autocomplete="name" required
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10">
                                            </div>
                                            <div class="col-span-5">
                                                <label for="password"
                                                       class="required block text-sm font-medium text-gray-700">Mot de
                                                    passe</label>
                                                <input type="password" name="password" id="password"
                                                       autocomplete="email" value=""
                                                       placeholder="Mot de passe" required
                                                       minlength="6" class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10">
                                                <p class="text-gray-600 text-xs italic">Le mot de passe doit faire plus de 6 caractères.</p>
                                            </div>
                                            <div class="col-span-5">
                                                <label for="email"
                                                       class="required block text-sm font-medium text-gray-700">Confirmation du
                                                    mot de passe</label>
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation"
                                                       autocomplete="password_confirmation" placeholder="Mot de passe" value="" required
                                                       minlength="6" class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Sauvegarder
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </main>
    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
@stop
