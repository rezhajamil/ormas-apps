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
            Hasil {{ ucwords($qns->name) }}
        </h4>
        <div class="mb-6 overflow-hidden border rounded-md shadow-xs w-fit">
            <div class="overflow-x-auto w-fit">
                <table class="whitespace-no-wrap w-fit">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="px-4 py-3 w-fit">Cluster</th>
                            <th class="px-4 py-3 w-fit">Jumlah Responden</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($resume as $data)
                            <tr class="text-gray-700 ">
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
                            <th class="px-4 py-3 border-l-0 border-x w-fit">Waktu Menjawab</th>
                            <th class="px-4 py-3 border-l-0 border-x w-fit">Cluster</th>
                            <th class="px-4 py-3 border-l-0 border-x w-fit">Nama</th>
                            <th class="px-4 py-3 border-l-0 border-x w-fit">Telp</th>
                            <th class="px-4 py-3 border-r-0 border-x w-fit">Jumlah Benar</th>
                            <th class="px-4 py-3 border-r-0 border-x w-fit">Skor</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($result as $idx => $res)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $idx + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $res->time_star }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $res->cluster }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $res->name }}
                                </td>
                                <td class="px-4 py-3 text-sm border-r w-fit">
                                    {{ $res->telp }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center border-r w-fit">
                                    {{ $res->correct }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center border-r w-fit">
                                    {{ number_format(($res->correct / count($qns->question)) * 100, 0, '.', ',') }}
                                </td>
                            </tr>
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
    <script>
        $("#search").on("input", function() {
            find();
        });

        $("#search_by").on("input", function() {
            find();
        });

        $("#search_status").on("input", function() {
            find();
        });

        const find = () => {
            let search = $("#search").val();
            let searchBy = $('#search_by').val();
            let searchStatus = $('#search_status').val();
            let pattern = new RegExp(search, "i");

            $(`.${searchBy}`).each(function() {
                let label = $(this).text();
                let status = $(this).siblings('.status').attr('status');
                // console.log(status);

                if (pattern.test(label) && (searchStatus == '' || searchStatus == status)) {
                    $(this).parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
        }
    </script>
@endsection
