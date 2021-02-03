@extends('layouts.app')

@section('content')

    {{--    --}}
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Registrierung') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Username') }}:
                            </label>

                            <input id="username" type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username')  border-red-500 @enderror"
                                   name="username" value="{{ old('username') }}" required autocomplete="username"
                                   autofocus>
                            <span class="text-sm text-gray-500">
                            Der Username kann nach der Registrierung nicht mehr geändert werden.
                        </span>
                            @error('username')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Vorname') }}:
                            </label>

                            <input id="firstName" type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('firstName')  border-red-500 @enderror"
                                   name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName"
                                   autofocus>

                            @error('firstName')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Nachname') }}:
                            </label>

                            <input id="lastName" type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('lastName')  border-red-500 @enderror"
                                   name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName"
                                   autofocus>

                            @error('lastName')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('E-Mail Addresse') }}:
                            </label>

                            <input id="email" type="email"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Passwort') }}:
                            </label>

                            <input id="password" type="password"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Passwort bestätigen') }}:
                            </label>

                            <input id="password-confirm" type="password"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                        @error('dataPrivacy')
                        <p class="text-red-500 text-xs italic ">
                            Bitte bestätige dieses Feld.
                        </p>
                        @enderror
                        <div class="flex flex-wrap mb-4">
                            <label class="block">
                                <input class="mr-2 leading-tight" type="checkbox" name="dataPrivacy">
                                <span class="text-sm">Ich bin mir bewusst und wurde darüber aufgeklärt, dass <span
                                        class="font-semibold">meine eingegebenen Daten nicht sicher bzw. geschützt sind</span> und ich eine imaginäre Identität annehmen kann.</span>
                            </label>
                        </div>
                        @error('tos')
                        <p class="text-red-500 text-xs italic ">
                            Bitte bestätige dieses Feld.
                        </p>
                        @enderror
                        <div class="flex flex-wrap mb-4">
                            <label class="block">
                                <input class="mr-2 leading-tight" type="checkbox" name="tos">
                                <span class="text-sm">Ich habe die <a href="{{ route('tos') }}" target="_blank"
                                                                      class="text-primary">Nutzungsbedingungen</a> und <a
                                        href="{{ route('privacy') }}" target="_blank" class="text-primary">Datenschutzbestimmungen</a> gelesen und bin damit einverstanden.
                                </span>
                            </label>
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Registrieren') }}

                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                {{ __('Account bereits vorhanden?') }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
