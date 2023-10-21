@extends('layouts.app')
@section('content')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 ">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl ">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="sm:h-32 md:h-auto w-fit">
                    <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/telkomsel-login.webp') }}"
                        alt="Telkomsel Login" />
                </div>
                <form method="POST" action="{{ route('login') }}"
                    class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    @csrf
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700">
                            Login
                        </h1>
                        <label class="block text-sm">
                            <span class="text-gray-700">Username</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple  form-input"
                                name="username" type="text" placeholder="Username" />
                            @error('username')
                                <span class="text-red-600 italic text-sm">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700">Password</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple  form-input"
                                placeholder="Password" type="password" name="password" />
                            @error('password')
                                <span class="text-red-600 italic text-sm">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-premier border border-transparent rounded-lg active:bg-premier hover:bg-sekunder focus:outline-none focus:shadow-outline-purple">
                            Log in
                        </button>

                        <p class="mt-1">
                            <a class="text-sm font-medium text-gray-500 mt-2 transition-all hover:underline"
                                href="{{ route('register') }}">
                                Create account
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
