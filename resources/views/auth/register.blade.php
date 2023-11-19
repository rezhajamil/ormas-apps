@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center min-h-screen p-6 bg-gray-50 ">
        <img aria-hidden="true" class="object-cover w-96" src="{{ asset('img/logo-ormas.png') }}" alt="ORMAS APPS Login" />
        <div class="w-full mx-auto overflow-hidden bg-white rounded-lg shadow-xl ">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <form method="POST" action="{{ route('register') }}" class="grid w-full p-4 grcol sm:p-6">
                    @csrf
                    <h1 class="mb-4 text-xl font-semibold text-gray-700">
                        Register Akun Dashboard ORMAS
                    </h1>
                    <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Cluster</span>
                            <select name="cluster" id="cluster"
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input">
                                <option value="" selected disabled>Pilih Cluster</option>
                                @foreach ($cluster as $item)
                                    <option value="{{ $item->cluster }}"
                                        {{ old('cluster') == $item->cluster ? 'selected' : '' }}>
                                        {{ $item->cluster }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cluster')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">ID DIGIPOS</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                name="id_digipos" value="{{ old('id_digipos') }}" type="number" placeholder="ID DIGIPOS" />
                            @error('id_digipos')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Nama Lengkap</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                name="name" type="text" value="{{ old('name') }}" placeholder="Nama Lengkap" />
                            @error('name')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Telepon</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                name="telp" type="number" value="{{ old('telp') }}" placeholder="0812345xxxxx" />
                            @error('telp')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Email</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                name="email" type="email" value="{{ old('email') }}" placeholder="Email" />
                            @error('email')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Username</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                name="username" type="text" value="{{ old('username') }}" placeholder="Username" />
                            @error('username')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Password</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="Password" type="password" name="password" />
                            @error('password')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700">Konfirmasi Password</span>
                            <input
                                class="block w-full mt-1 text-sm focus:border-premier focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="Konfirmasi Password" type="password" name="password_confirmation" />
                            @error('password_confirmation')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <button
                            class="block w-1/2 px-4 py-2 mx-auto mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg col-span-full bg-premier active:bg-premier hover:bg-sekunder focus:outline-none focus:shadow-outline-purple">
                            Register
                        </button>

                        <p class="mt-1 text-center col-span-full">
                            <a class="mt-2 text-sm font-medium text-gray-500 underline transition-all hover:underline"
                                href="{{ route('login') }}">
                                Sudah Punya Akun? Login Ke Akun Anda
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
