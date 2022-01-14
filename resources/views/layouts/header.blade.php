<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/vm.png') }}" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="{{ asset('img/vm.png') }}" alt="Workflow">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{route('dashboard')}}" class="@if(Request::path() === 'dashboard')bg-gray-900 text-white font-medium @else text-gray-300 hover:bg-gray-700 @endif px-3 py-2 rounded-md text-sm">Accueil</a>

                        <a href="{{route('list')}}" class="@if(Request::path() === 'list')bg-gray-900 text-white font-medium @else text-gray-300 hover:bg-gray-700 @endif px-3 py-2 rounded-md text-sm">Liste</a>

                        <a href="{{route('users')}}" class="@if(Request::path() === 'users')bg-gray-900 text-white font-medium @else text-gray-300 hover:bg-gray-700 @endif px-3 py-2 rounded-md text-sm">Utilisateurs</a>

                        <a href="{{route('map')}}" class="@if(Request::path() === 'map')bg-gray-900 text-white font-medium @else text-gray-300 hover:bg-gray-700 @endif px-3 py-2 rounded-md text-sm">Carte</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{route('dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Accueil</a>

            <a href="{{route('list')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Liste</a>

            <a href="{{route('users')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Utilisateurs</a>

            <a href="{{route('map')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Carte</a>
        </div>
    </div>
</nav>
