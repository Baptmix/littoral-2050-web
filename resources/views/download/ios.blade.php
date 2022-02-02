@extends('layouts.app')

@section('title', 'Authentification')

@section('content')
    <section class="content auth">
        <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen">
            <div class="max-w-md w-full space-y-8">
                <a href="itms-services://?action=download-manifest&url=https://littoral-app.fr/app/manifest.plist"
                   class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple"
                   class="svg-inline--fa fa-apple fa-w-12 h-5 w-5 text-blue-500 group-hover:text-blue-400" role="img" xmlns="http://www.w3.org/2000/svg"
                   viewBox="0 0 384 512"><path fill="currentColor"
                                               d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
          </span>
                    Télécharger
                </a>
            </div>
        </div>
    </section>
@stop
