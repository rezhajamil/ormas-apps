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
        <div class="flex items-center gap-x-2">
            <h4 class="my-4 text-lg font-semibold text-gray-600 ">
                Hasil Detail {{ ucwords($qns->name) }}
            </h4>
            <button id="btn-excel"
                class="px-3 py-2 font-semibold text-white bg-green-800 rounded h-fit hover:bg-emerald-800"><i
                    class="mr-2 fa-solid fa-file-arrow-down"></i>Excel
            </button>
        </div>
        <div class="mb-6 overflow-hidden border rounded-md shadow-xs w-fit">
            <div class="overflow-x-auto w-fit" id="table-container">
                <table class="whitespace-no-wrap w-fit">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-gray-500 border-b ">
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">No</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Tanggal Pengisian</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Cluster</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Kecamatan</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Nama SF</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">ID Digipos</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">Nama Outlet</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">No RS</th>
                            <th rowspan="2" class="px-4 py-3 border-x-white border-x w-fit">TAP KCP</th>
                            <th colspan="{{ count($qns->question) }}"
                                class="px-4 py-3 text-center bg-gray-600 border-x-white border-x w-fit">Pertanyaan</th>

                        </tr>
                        <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b ">
                            @foreach ($qns->question as $question)
                                <th class="px-4 py-3 bg-gray-800 border-x-white border-x w-fit">{{ $question->text }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($qns->response as $i_response => $response)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $i_response + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit whitespace-nowrap">
                                    {{ date('Y-m-d', strtotime($response->created_at)) }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->responder->outlet->cluster ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->responder->outlet->kecamatan ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->outlet->nama_sf ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->id_digipos) }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->outlet->nama_outlet ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->outlet->no_rs ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->responder->outlet->tap_kcp ?? '') }}
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
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#btn-excel").click(function() {
                exportTableToExcel('table-container', `Hasil Survey`);
            });

            function exportTableToExcel(tableID, filename = '') {
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name
                filename = filename ? filename + '.xls' : 'excel_data.xls';

                // Create download link element
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                    // Setting the file name
                    downloadLink.download = filename;

                    //triggering the function
                    downloadLink.click();
                }
            }
        })
    </script>
@endsection
