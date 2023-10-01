@extends('layouts.app')
@section('content')
    <div class="flex flex-col min-h-screen">
        <div class="relative w-full px-2 pb-10 bg-gradient-to-tr from-sekunder to-premier h-fit">
            <div class="flex items-center justify-end py-2 bg-transparent h-fit">
                <span
                    class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">DigiSquad</span>
                <a href="{{ URL::to('/profile') }}"
                    class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i
                        class="fa-solid fa-user text-premier"></i></a>
            </div>
            <div class="grid grid-cols-3 my-2 border-4 border-white rounded-md">
                <div class="col-span-2 p-2 mx-2 ">
                    <span class="block text-2xl font-bold text-white">Selamat Datang,</span>
                    <span class="text-xl font-semibold text-white">{{ ucwords(Auth::user()->name) }}</span>
                </div>
            </div>
        </div>
        <div class="z-20 flex flex-col w-full h-full px-6 py-10 -mt-6 bg-gray-100 rounded-t-3xl grow">
            <div class="flex flex-col gap-y-8 gap-x-2">
                <div class="flex items-center justify-center w-full">
                    <button id="btn-quiz-modal"
                        class="flex items-center justify-center w-11/12 gap-4 px-3 py-4 transition-all border rounded-md shadow-xl h-fit border-kuartener text-sekunder bg-tersier hover:shadow-none hover:no-underline hover:bg-tersier">
                        <i class="text-2xl fa-solid fa-pen-clip"></i>
                        <span class="text-xl font-semibold uppercase">Quiz</span>
                    </button>
                </div>
                <div class="flex items-center justify-center w-full">
                    <button id="btn-survey-modal"
                        class="flex items-center justify-center w-11/12 gap-4 px-3 py-4 transition-all border rounded-md shadow-xl h-fit border-kuartener text-sekunder bg-tersier hover:shadow-none hover:no-underline hover:bg-tersier">
                        <i class="text-2xl fa-solid fa-square-poll-vertical"></i>
                        <span class="text-xl font-semibold uppercase">Survey</span>
                    </button>
                </div>
            </div>
            <span class="inline-block w-full my-auto text-2xl font-bold text-center font-batik text-sekunder">
                MENU
            </span>
        </div>
    </div>

    <div class="absolute inset-0 z-50 flex flex-col items-center justify-center w-full h-full gap-4 px-6 bg-black/70"
        id="modal-quiz" style="display: none">
        <div class="w-full px-4 py-4 bg-white rounded-md">
            <span class="inline-block w-full text-xl font-bold text-center text-premier">Daftar Quiz</span>
            <div class="flex flex-col w-full mt-6">
                @foreach ($quiz as $data)
                    <a href="{{ route('qns.answer', $data->id) }}"
                        class="flex items-center px-1 py-2 transition-all border-b-2 rounded-t gap-x-2 border-sekunder hover:bg-gray-300">
                        <i class="text-lg w-fit fa-solid fa-caret-right text-premier"></i>
                        <span
                            class="inline-block text-base font-semibold text-gray-500 truncate border-r border-gray-600 grow">
                            {{ $data->name }}
                        </span>
                        <span class="inline-block text-base font-semibold text-right text-gray-500 w-fit whitespace-nowrap">
                            {{ $data->duration }} Menit
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
        <button id="btn-close-quiz"
            class="px-4 py-3 font-bold text-white bg-gray-500 rounded-md hover:bg-gray-700">TUTUP</button>
    </div>

    <div class="absolute inset-0 z-50 flex flex-col items-center justify-center w-full h-full gap-4 px-6 bg-black/70"
        id="modal-survey" style="display: none">
        <div class="w-full px-4 py-4 bg-white rounded-md">
            <span class="inline-block w-full text-xl font-bold text-center text-premier">Daftar Survey</span>
            <div class="flex flex-col w-full mt-6">
                @foreach ($survey as $data)
                    <a href="{{ route('qns.answer', $data->id) }}"
                        class="flex items-center px-1 py-2 transition-all border-b-2 rounded-t gap-x-2 border-sekunder hover:bg-gray-300">
                        <i class="text-lg w-fit fa-solid fa-caret-right text-premier"></i>
                        <span
                            class="inline-block text-base font-semibold text-gray-500 truncate border-r border-gray-600 grow">
                            {{ $data->name }}
                        </span>
                        <span class="inline-block text-base font-semibold text-right text-gray-500 w-fit whitespace-nowrap">
                            {{ date('Y-m-d', strtotime($data->start_date ?? $data->created_at)) }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
        <button id="btn-close-survey"
            class="px-4 py-3 font-bold text-white bg-gray-500 rounded-md hover:bg-gray-700">TUTUP</button>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#btn-survey-modal").click(function() {
                $("#modal-survey").show();
            });

            $("#btn-close-survey").click(function() {
                $("#modal-survey").hide();
            });

            $("#btn-quiz-modal").click(function() {
                $("#modal-quiz").show();
            });

            $("#btn-close-quiz").click(function() {
                $("#modal-quiz").hide();
            });
        });
    </script>
@endsection
