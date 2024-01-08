@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('qns.result_detail', $response->qns->id) }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            QNS : {{ ucwords($response->qns->name) }}
        </h4>
        <div class="flex flex-col w-full gap-4 py-3 overflow-hidden border-t shadow-xs">
            @foreach ($response->qns->question as $i_question => $question)
                <form class="w-full px-4 py-3 bg-white rounded-md shadow"
                    action="{{ route('qns_response.update', $response->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center w-full py-1 gap-x-2">
                        <span class="pr-2 text-sm font-semibold text-gray-600 border-r">
                            @switch($question->type)
                                @case('pilgan')
                                    {{ 'Pilihan Ganda' }}
                                @break

                                @case('isian')
                                    {{ 'Isian' }}
                                @break

                                @case('pilgan_isian')
                                    {{ 'Pilihan Ganda & Isian' }}
                                @break

                                @case('kotak_centang')
                                    {{ 'Kotak Centang' }}
                                @break

                                @default
                            @endswitch
                        </span>
                        <span class="block text-sm text-gray-600">{{ $question->text }}</span>
                    </div>
                    <hr class="mb-2">
                    <div class="flex flex-col w-full gap-3">
                        @foreach ($question->option as $option)
                            <div class="px-2 py-2 border rounded bg-kuartener">
                                @if ($option->text)
                                    {{ $option->text }}
                                @else
                                    <span class="text-sm italic text-gray-600">Diisi oleh responden</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
