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
            QNS : {{ ucwords($qns->name) }}
        </h4>
        <p class="text-gray-600">Durasi : {{ $qns->duration }} Menit
        <p class="text-gray-600">Tanggal Mulai : {{ $qns->start_date ? date('Y-m-d', strtotime($qns->start_date)) : '-' }}
        </p>
        <p class="text-gray-600">Tanggal Selesai : {{ $qns->end_date ? date('Y-m-d', strtotime($qns->end_date)) : '-' }}</p>
        <div class="flex flex-col mt-3 text-gray-600 ">
            <span class="underline">Deskripsi</span>
            {!! $qns->description !!}
        </div>
        <div class="flex flex-col w-full gap-4 py-3 overflow-hidden border-t shadow-xs">
            @foreach ($qns->question as $i_question => $question)
                <div class="w-full px-4 py-3 bg-white rounded-md shadow">
                    <div class="flex items-center w-full py-1 gap-x-2">
                        <span class="pr-2 text-sm font-semibold text-gray-600 border-r">
                            @switch($question->type)
                                @case('pilgan')
                                    {{ 'Pilihan Ganda' }}
                                @break
                            @endswitch
                        </span>
                        <span class="block text-sm text-gray-600">{{ $question->text }}</span>
                    </div>
                    <hr class="mb-2">
                    <div class="flex flex-col w-full gap-3">
                        @foreach ($question->option as $option)
                            <div
                                class="px-2 py-2 border rounded {{ $option->correct_option ? 'bg-green-800 text-white' : 'bg-gray-200' }}">
                                {{ $option->text }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
