@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('qns.index') }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Buat Quiz
        </h4>
        <form action="{{ route('qns.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nama*
                    </span>
                    <input type="text" name="name" class="form-input" placeholder="Nama" required />
                    @error('name')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Durasi (Menit)*
                    </span>
                    <input type="number" name="duration" class="form-input" placeholder="Durasi" required />
                    @error('duration')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Tanggal Mulai
                    </span>
                    <input type="date" name="start_date" class="form-input" />
                    @error('start_date')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Tanggal Selesai
                    </span>
                    <input type="date" name="end_date" class="form-input" />
                    @error('end_date')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm col-span-full">
                    <span class="text-gray-700 ">
                        Deskripsi
                    </span>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-input"></textarea>
                    @error('description')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">
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
