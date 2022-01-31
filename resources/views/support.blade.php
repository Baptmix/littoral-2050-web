@extends('layouts.app')

@section('title', 'Support')

@section('content')
    <style>
        section.content.auth::after {
            background: url({{ asset("/svg/footer_auth.svg") }});
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
                        Support
                    </h2>
                </div>
                <form class="mt-8 space-y-6" action="{{route("support_post")}}" method="POST">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    {{--                    <input type="hidden" name="remember" value="true">--}}
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email-address" class="sr-only">Votre adresse e-mail</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   placeholder="Adresse e-mail">
                        </div>
                        <div>
                            <label for="message" class="sr-only">Message</label>
                            <textarea id="message" name="message"
                                      required
                                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                      placeholder="Votre message"></textarea>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
          </span>
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
