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
                            <th class="px-4 py-3 border-x-white border-x w-fit">No</th>
                            <th class="px-4 py-3 bg-gray-700 border-x-white border-x w-fit">Action</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">Tanggal Pengisian</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">Cluster</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">Kecamatan</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">Nama SF</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">ID Digipos</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">Nama Outlet</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">No RS</th>
                            <th class="px-4 py-3 border-x-white border-x w-fit">TAP KCP</th>
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
                                <td class="px-2 text-sm border-r w-fit">
                                    <div class="flex items-center justify-center space-x-4 text-base">
                                        <form action="{{ route('qns_response.destroy', $response->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="flex items-center justify-between m-0 text-sm font-medium leading-5 rounded-md text-premier focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit whitespace-nowrap">
                                    {{ date('Y-m-d', strtotime($response->created_at)) }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->outlet->cluster ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $response->outlet->kecamatan ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->outlet->nama_sf ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->id_digipos) }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->outlet->nama_outlet ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->outlet->no_rs ?? '') }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ ucwords($response->outlet->tap_kcp ?? '') }}
                                </td>
                                {{-- {{ ddd($response->selected_option) }} --}}
                                @foreach ($qns->question as $i_question => $question)
                                    <td class="px-4 py-3 text-sm border-r w-fit has-tooltip">
                                        <span
                                            class='p-1 -mt-8 -ml-5 bg-gray-300 rounded shadow-lg tooltip text-slate-800 whitespace-nowrap'>Edit
                                            Jawaban</span>
                                        @switch($question->type)
                                            @case('pilgan')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        {{-- {{ ddd($selected->option->text) }}
                                                        {{ $selected->option->text }} --}}
                                                        @php $optionText = optional($selected->option)->text; @endphp
                                                        <a href="{{ route('qns_selected_option.edit', $selected->id) }}"
                                                            class="transition-all cursor-pointer hover:underline hover:font-bold">
                                                            {{ $optionText }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('isian')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        <a href="{{ route('qns_selected_option.edit', $selected->id) }}"
                                                            class="transition-all cursor-pointer hover:underline hover:font-bold">
                                                            {{ $selected->other_text }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('pilgan_isian')
                                                @foreach ($response->selected_option as $selected)
                                                    @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                        <a href="{{ route('qns_selected_option.edit', $selected->id) }}"
                                                            class="transition-all cursor-pointer hover:underline hover:font-bold">
                                                            @php $optionText = optional($selected->option)->text; @endphp
                                                            {{ $selected->option ? $optionText : $selected->other_text }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @break

                                            @case('kotak_centang')
                                                <ul class="space-y-1">
                                                    @foreach ($response->selected_option as $selected)
                                                        @if ($selected->question_id == $question->id && ($selected_response_id = $response->id))
                                                            <a href="{{ route('qns_selected_option.edit', $selected->id) }}"
                                                                class="transition-all cursor-pointer hover:underline hover:font-bold">
                                                                <li class="list-item whitespace-nowrap">
                                                                    <i class="mr-2 text-green-600 fa-solid fa-check"></i>

                                                                    @php $optionText = optional($selected->option)->text; @endphp
                                                                    {{ $selected->option ? $optionText : $selected->other_text }}
                                                                </li>
                                                            </a>
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
    {{-- <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script> --}}
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#btn-excel").click(function() {
                // exportTableToExcel('table-container', `Hasil Survey`);
                exportCSVExcel('table-container', `Hasil Survey`);
            });

            // function exportTableToExcel(tableID, filename = '') {
            //     var downloadLink;
            //     var dataType = 'application/vnd.ms-excel';
            //     var tableSelect = document.getElementById(tableID);
            //     var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            //     // Specify file name
            //     filename = filename ? filename + '.xls' : 'excel_data.xls';

            //     // Create download link element
            //     downloadLink = document.createElement("a");

            //     document.body.appendChild(downloadLink);

            //     if (navigator.msSaveOrOpenBlob) {
            //         var blob = new Blob(['\ufeff', tableHTML], {
            //             type: dataType
            //         });
            //         navigator.msSaveOrOpenBlob(blob, filename);
            //     } else {
            //         // Create a link to the file
            //         downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            //         // Setting the file name
            //         downloadLink.download = filename;

            //         //triggering the function
            //         downloadLink.click();
            //     }
            // }

            function exportCSVExcel(tableId, fileName) {
                $(`#${tableId}`).table2excel({
                    exclude: ".no-export",
                    filename: "download.xls",
                    fileext: ".xls",
                    filename: fileName + ".xls",
                    exclude_links: true,
                    exclude_inputs: true
                });
            }
        })
    </script>
@endsection
