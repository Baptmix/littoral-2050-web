@extends('layouts.app')

@section('title', 'Authentification')
@section('header')
    @extends('layouts.header')
@stop
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Liste des électeurs du Bureau {{ $code }} de {{ $city }}
            </h1>
        </div>
    </header>
    <main>
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="p-4 border-b border-gray-200 shadow">
                        <!-- <table> -->
                        <table id="dataTable" class="p-4">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="p-8 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Nom
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Prénom
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Ville
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Adresse
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    E-mail
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Téléphone
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Bureau de vote
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($electors as $elector)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        @if($elector->common_name == null)
                                            {{$elector->birth_name}}
                                        @elseif($elector->common_name == $elector->birth_name)
                                        {{$elector->common_name}}
                                        @else
                                            {{$elector->birth_name}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->first_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->city }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->street_number . " " . $elector->street_name . " " . $elector->postal_code}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->phone }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $elector->voting_office_code }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 flex flex-wrap flex-row justify-center">
                                        <button onclick="window.location.href = '{{route("edit_elector", ["id" => $elector->id])}}';" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full m-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full m-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                    },
                    "order": [[ 1, "asc" ]]
                });

            });
        </script>
    </main>
@stop
