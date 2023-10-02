@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <div class="flex gap-4">
            <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
                href="{{ route('qns.index') }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-arrow-left"></i>
                    <span class="">Kembali</span>
                </div>
            </a>
            <a class="flex items-center justify-between px-3 py-2 font-semibold rounded-md shadow-md text-sekunder bg-tersier w-fit focus:outline-none focus:shadow-outline-purple"
                href="{{ route('qns.result_detail', $qns->id) }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-table-list"></i>
                    <span class="">Hasil Detail</span>
                </div>
            </a>

        </div>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Hasil {{ ucwords($qns->name) }}
        </h4>
        <div class="mb-6 overflow-hidden border rounded-md shadow-xs w-fit">
            <div class="overflow-x-auto w-fit">
                <table class="whitespace-no-wrap w-fit">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="px-4 py-3 w-fit">Branch</th>
                            <th class="px-4 py-3 w-fit">Cluster</th>
                            <th class="px-4 py-3 w-fit">Jumlah Responden</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($resume as $data)
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 text-sm w-fit">
                                    {{ $data->branch }}
                                </td>
                                <td class="px-4 py-3 text-sm w-fit">
                                    {{ $data->cluster }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center w-fit">
                                    {{ $data->count }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="overflow-hidden border rounded-md shadow-xs w-fit">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="px-4 py-3 border-l-0 border-x w-fit">No</th>
                            <th class="px-4 py-3 border-x w-fit">Jenis Pertanyaan</th>
                            <th class="px-4 py-3 border-x w-fit">Pertanyaan</th>
                            <th class="px-4 py-3 border-x w-fit">Opsi</th>
                            <th class="px-4 py-3 border-r-0 border-x w-fit">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($qns->question as $i_question => $question)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm border-r w-fit"
                                    rowspan="{{ $question->type == 'pilgan_isian' ? count($question->option) + 1 : count($question->option) }}">
                                    {{ $i_question + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit"
                                    rowspan="{{ $question->type == 'pilgan_isian' ? count($question->option) + 1 : count($question->option) }}">
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
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit bg-sekunder/10"
                                    rowspan="{{ $question->type == 'pilgan_isian' ? count($question->option) + 1 : count($question->option) }}">
                                    {{ $question->text }}
                                </td>
                                @foreach ($question->option as $i_option => $option)
                                    @switch($question->type)
                                        @case('pilgan')
                                            <td class="px-4 py-3 text-sm text-center border-r w-fit bg-tersier/10">
                                                {{ $option->text }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center bg-gray-100 w-fit">
                                                {{ count($option->selected_option) }}
                                            </td>
                                        @break

                                        @case('isian')
                                            <td class="px-4 py-3 text-sm italic text-center text-gray-400 w-fit bg-tersier/10"
                                                colspan="2">
                                                Jawaban bervariasi
                                            </td>
                                        @break

                                        @case('pilgan_isian')
                                            <td class="px-4 py-3 text-sm text-center border-r w-fit bg-tersier/10">
                                                {{ $option->text }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center bg-gray-100 w-fit">
                                                {{ count($option->selected_option) }}
                                            </td>
                                        @break

                                        @case('kotak_centang')
                                            <td class="px-4 py-3 text-sm text-center border-r w-fit bg-tersier/10">
                                                {{ $option->text }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center bg-gray-100 w-fit">
                                                {{ count($option->selected_option) }}
                                            </td>
                                        @break

                                        @default
                                    @endswitch

                                    @if ($question->type == 'pilgan_isian')
                            <tr>
                                <td class="px-4 py-3 text-sm text-center border-r w-fit bg-tersier/10">
                                    Lainnya
                                </td>
                                <td class="px-4 py-3 text-sm text-center bg-gray-100 w-fit">
                                    @php
                                        $count = 0;
                                        foreach ($qns->response as $i_response => $response) {
                                            foreach ($response->selected_option as $i_selected => $selected) {
                                                if ($selected->question->id == $question->id) {
                                                    if ($selected->other_text) {
                                                        $count += 1;
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                    {{ $count }}
                                </td>
                            </tr>
                        @endif
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9 ">
                <span class="flex items-center col-span-3">
                    {{ count($qns->response) }} Responden
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                </span>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
