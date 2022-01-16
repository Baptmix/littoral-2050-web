@extends('layouts.app')

@section('title', 'Authentification')

@section('content')
    <style>
        section.content.auth::after {
            background: url(http://127.0.0.1:8000/svg/footer_auth.svg);
            width: 100%;
            height: 40%;
            position: absolute;
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover;
            bottom: 0;
            content: "";
            z-index: -1;
        }
        .content.auth h2 {
            text-transform: uppercase;
            background: linear-gradient(to right, #6ce7df 0%, #4967e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <section class="content auth">
        <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <img class="mx-auto h-20 w-auto" src="{{ asset('svg/logo.svg') }}"
                         alt="Workflow">
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Littoral 2050
                    </h2>
                </div>
                <form class="mt-8 space-y-6" action="{{route("forgotten_password_post")}}" method="POST">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
{{--                    <input type="hidden" name="remember" value="true">--}}
                    <div class="shadow-sm -space-y-px">
                        <div>
                            <label for="email-address" class="sr-only">Adresse e-mail</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                   class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Adresse e-mail">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
{{--                            <input id="remember-me" name="remember-me" type="checkbox"--}}
{{--                                   class="h-4 w-4 text-indigo-600 focus:ring-blue-500 border-gray-300 rounded">--}}
{{--                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">--}}
{{--                                Se souvenir de moi--}}
{{--                            </label>--}}
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                Mot de passe oublié
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                            Connexion
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
