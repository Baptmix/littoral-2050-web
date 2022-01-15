@extends('layouts.app')
@section('header')
    @extends('layouts.header')
@stop
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Édition électeur
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
                            <form action="{{ route('update_elector') }}" method="POST" class="mb-0">
                                <div class="">
                                    <div class="px-4 py-5 bg-white">
                                        <div class="grid grid-cols-9 gap-9">
                                            <div class="col-span-3">
                                                <label for="birth_name"
                                                       class="block text-sm font-medium text-gray-700">Nom de
                                                    naissance</label>
                                                <input type="text" name="birth_name" id="birth_name"
                                                       autocomplete="birth_name" value="{{$elector->birth_name}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="common_name"
                                                       class="block text-sm font-medium text-gray-700">Nom
                                                    d'usage</label>
                                                <input type="text" name="common_name" id="common_name"
                                                       autocomplete="common_name" value="{{$elector->common_name}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="first_name"
                                                       class="block text-sm font-medium text-gray-700">Prénom(s)</label>
                                                <input type="text" name="first_name" id="first_name"
                                                       autocomplete="first_name" value="{{$elector->first_name}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="birth_date"
                                                       class="required block text-sm font-medium text-gray-700">Date de naissance
                                                </label>
                                                <input type="text" name="birth_date" id="birth_date"
                                                       autocomplete="birth_date" value="{{$elector->birth_date}}" required
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="email_address"
                                                       class="block text-sm font-medium text-gray-700">Adresse
                                                    e-mail
                                                </label>
                                                <input type="email" name="email" id="email"
                                                       autocomplete="email" value="{{$elector->email}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="gender"
                                                       class="required block text-sm font-medium text-gray-700">Sexe</label>
                                                <select id="gender" name="gender" autocomplete="gender" required
                                                        class=" mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                    @if($elector->gender == "M")
                                                        <option value="M" selected>Masculin</option>
                                                    @else
                                                        <option value="M">Masculin</option>
                                                    @endif
                                                    @if($elector->gender == "F")
                                                        <option value="F" selected>Féminin</option>
                                                    @else
                                                        <option value="F">Féminin</option>
                                                    @endif
                                                    @if($elector->gender == null)
                                                        <option value="N" selected>Non défini</option>
                                                    @else
                                                        <option value="N">Non défini</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="phone"
                                                       class="block text-sm font-medium text-gray-700">Numéro de
                                                    téléphone</label>
                                                <input type="tel" name="phone" id="phone"
                                                       autocomplete="street-address" placeholder="0123456789" pattern="[0-9]{10}" value="{{$elector->phone}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="street_number"
                                                       class="required block text-sm font-medium text-gray-700">Numéro
                                                    de rue</label>
                                                <input type="text" name="street_number" id="street_number" required value="{{$elector->street_number}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="street_name"
                                                       class="required block text-sm font-medium text-gray-700">Nom
                                                    de rue</label>
                                                <input type="text" name="street_name" id="street_name" required value="{{$elector->street_name}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-4">
                                                <label for="additional_address_1"
                                                       class="block text-sm font-medium text-gray-700">Adresse
                                                    additionnelle 1</label>
                                                <input type="text" name="additional_address_1"
                                                       id="additional_address_1" value="{{$elector->additional_address_1}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-5">
                                                <label for="additional_address_2"
                                                       class="block text-sm font-medium text-gray-700">Adresse
                                                    additionnelle 2</label>
                                                <input type="text" name="additional_address_2"
                                                       id="additional_address_2" value="{{$elector->additional_address_2}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-2">
                                                <label for="place"
                                                       class="block text-sm font-medium text-gray-700">Lieu
                                                    dit</label>
                                                <input type="text" name="place" id="place"
                                                       autocomplete="place" value="{{$elector->place}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-3">
                                                <label for="city"
                                                       class="required block text-sm font-medium text-gray-700">Ville</label>
                                                <select id="city" name="city" autocomplete="city" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->city}}" @if($elector->city == $city->city) selected @endif>{{$city->city}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-2">
                                                <label for="postal_code"
                                                       class="block text-sm font-medium text-gray-700">Code
                                                    postal</label>
                                                <input type="text" name="postal_code" id="postal_code"
                                                       autocomplete="postal_code" value="{{$elector->postal_code}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-2">
                                                <label for="department"
                                                       class="required block text-sm font-medium text-gray-700">Numéro
                                                    département</label>
                                                <input type="number" name="department" id="department"
                                                       autocomplete="department" required value="{{$elector->department}}"
                                                       class="mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 rounded-md focus:border-blue-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="voting_office_district"
                                                       class="required block text-sm font-medium text-gray-700">Circonscription
                                                    du bureau de vote</label>
                                                <select id="voting_office_district" name="voting_office_district"
                                                        autocomplete="voting_office_district" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->voting_office_district}}" @if($elector->voting_office_district == $district->voting_office_district) selected @endif>{{$district->voting_office_district}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-3">
                                                <label for="voting_office_code"
                                                       class="required block text-sm font-medium text-gray-700">Numéro
                                                    du bureau de vote</label>
                                                <select id="voting_office_code" name="voting_office_code"
                                                        autocomplete="voting_office_code" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach($codes as $code)
                                                        <option value="{{$code->voting_office_code}}" @if($elector->voting_office_code == $code->voting_office_code) selected @endif>{{$code->voting_office_code}}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="country" id="country"
                                       autocomplete="country" value="FRANCE">
                                <input type="hidden" name="nationality_identifier" id="nationality_identifier"
                                       autocomplete="nationality_identifier" value="FR">
                                <input type="hidden" name="id" id="id"
                                       autocomplete="id" value="{{$elector->id}}">
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
