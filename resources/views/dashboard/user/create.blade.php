@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('user.index') }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Tambah User
        </h4>
        <form action="{{ route('user.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Cluster*
                    </span>
                    <select name="cluster" id="cluster" class="form-input">
                        <option value="" selected disabled>Pilih Cluster</option>
                        @foreach ($cluster as $item)
                            <option value="{{ $item->cluster }}" {{ old('cluster') == $item->cluster }}>{{ $item->cluster }}
                            </option>
                        @endforeach
                    </select>
                    @error('cluster')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        ID Digipos*
                    </span>
                    <input type="number" name="id_digipos" class="form-input" placeholder="ID Digipos"
                        value="{{ old('id_digipos') }}" required />
                    @error('id_digipos')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nama*
                    </span>
                    <input type="text" name="name" class="form-input" placeholder="Nama" value="{{ old('name') }}"
                        required />
                    @error('name')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Telepon*
                    </span>
                    <input type="number" name="telp" class="form-input" placeholder="0812345xxxxx"
                        value="{{ old('telp') }}" required />
                    @error('telp')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Email*
                    </span>
                    <input type="email" name="email" class="form-input" placeholder="Email" value="{{ old('email') }}"
                        required />
                    @error('email')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Role*
                    </span>
                    <select name="role" id="role" class="form-input">
                        <option value="" selected disabled>Pilih Role</option>
                        @foreach ($role as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Username*
                    </span>
                    <input type="text" name="username" class=" form-input" placeholder="Username"
                        value="{{ old('username') }}" required />
                    @error('username')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Password*
                    </span>
                    <input type="text" name="password" class=" form-input" placeholder="Password"
                        value="{{ old('password') }}" required />
                    @error('password')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 mt-4 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">
                Submit
            </button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
