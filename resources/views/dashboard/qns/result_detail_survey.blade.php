@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <div class="flex gap-4">
            <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
                href="{{ route('qns.result', $qns->id) }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-arrow-left"></i>
                    <span class="">Kembali</span>
                </div>
            </a>

        </div>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Hasil Detail {{ ucwords($qns->name) }}
        </h4>
        <div class="mb-6 overflow-hidden border rounded-md shadow-xs w-fit">
            <div class="overflow-x-auto w-fit">
                <table class="whitespace-no-wrap w-fit">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-gray-500 border-b ">
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">No</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Branch</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Cluster</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Nama</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">ID Digipos</th>
                            <th colspan="{{ count($qns->question) }}"
                                class="px-4 py-3 text-center bg-gray-600 border-x-white border-x w-fit">Pertanyaan</th>

                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b ">
                            @foreach ($qns->question as $question)
                                <th class="px-4 py-3 bg-gray-800 border-x-white border-x w-fit">{{ $question->text }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($qns->response as $i_response => $response)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $i_response + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->responder->branch }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->responder->cluster }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->name) }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->id_digipos) }}
                                </td>
                                {{-- {{ ddd($response->selected_option) }} --}}
                                @foreach ($qns->question as $i_question => $question)
                                    <td class="px-4 py-3 text-sm border-r w-fit">
                                        @switch($question->type)
                                            @case('pilgan')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        {{ $selected->option->text }}
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('isian')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        {{ $selected->other_text }}
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('pilgan_isian')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        {{ $selected->option ? $selected->option->text : $selected->other_text }}
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('kotak_centang')
                                                <ul class="space-y-1">
                                                    @foreach ($response->selected_option as $selected)
                                                        @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                            <li class="list-item">
                                                                <i
                                                                    class="mr-2 text-green-600 fa-solid fa-check"></i>{{ $selected->option ? $selected->option->text : $selected->other_text }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
