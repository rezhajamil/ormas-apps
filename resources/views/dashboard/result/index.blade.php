@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 ">
            Data Hasil
        </h4>
        <div class="flex items-end justify-between w-full mb-6">
            <form method="GET" action="{{ route('result.index') }}" class="flex items-end gap-x-4">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Tanggal Mulai
                    </span>
                    <input type="date" name="start_date" id="start_date" value="{{ Request::get('start_date') }}"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Tanggal Akhir
                    </span>
                    <input type="date" name="end_date" id="end_date" value="{{ Request::get('end_date') }}"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Jenis
                    </span>
                    <select id="jenis"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="" selected>Semua</option>
                        @foreach ($jenis as $data)
                            <option value="{{ $data->jenis }}">{{ $data->jenis }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Produk
                    </span>
                    <select id="produk"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="" selected>Semua</option>
                        @foreach ($produk as $data)
                            <option value="{{ $data->produk }}">{{ $data->produk }}</option>
                        @endforeach
                    </select>
                </label>
                <button
                    class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-600 rounded-md shadow-md h-fit w-fit focus:outline-none focus:shadow-outline-purple">
                    <div class="flex items-center">
                        <i class="w-5 fa-solid fa-magnifying-glass"></i>
                        <span class="">Cari Hasil</span>
                    </div>
                </button>
            </form>
        </div>
        <hr>
        <div class="flex items-end justify-between w-full mb-6">
            <div class="flex gap-x-4">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Kata Kunci
                    </span>
                    <input type="text" name="search" id="search" placeholder="Cari..."
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Berdasarkan
                    </span>
                    <select id="search_by"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="id_result">ID Outlet</option>
                        <option value="nama_outlet">Nama Outlet</option>
                        <option value="jenis">Jenis</option>
                        <option value="produk">Produk</option>
                    </select>
                </label>
            </div>
            <a class="flex items-center justify-between px-3 py-2 font-semibold text-white rounded-md shadow-md bg-sekunder w-fit focus:outline-none focus:shadow-outline-purple"
                href="{{ route('result.create') }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-plus"></i>
                    <span class="">Tambah Hasil</span>
                </div>
            </a>
        </div>
        <div class="w-full overflow-hidden border rounded-md shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="p-2 border-x whitespace-nowrap">No</th>
                            <th class="p-2 border-x whitespace-nowrap">ID Outlet</th>
                            <th class="p-2 border-x whitespace-nowrap">Nama Outlet</th>
                            <th class="p-2 border-x whitespace-nowrap">Transaksi</th>
                            <th class="p-2 border-x whitespace-nowrap">Revenue</th>
                            <th class="p-2 border-x whitespace-nowrap">Jenis</th>
                            <th class="p-2 border-x whitespace-nowrap">Produk</th>
                            <th class="p-2 border-x whitespace-nowrap">Tanggal</th>
                            <th class="p-2 border-x whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($results as $idx => $result)
                            <tr class="text-gray-700 ">
                                <td class="p-2 text-sm border">
                                    {{ $idx + $results->firstItem() }}
                                </td>
                                <td class="p-2 text-sm border id_outlet">
                                    {{ $result->id_outlet }}
                                </td>
                                <td class="p-2 text-sm border nama_outlet">
                                    {{ $result->nama_outlet }}
                                </td>
                                <td class="p-2 text-sm border trx">
                                    {{ number_format($result->trx, '0', ',', '.') }}
                                </td>
                                <td class="p-2 text-sm border rev">
                                    {{ number_format($result->rev, '0', ',', '.') }}
                                </td>
                                <td class="p-2 text-sm border jenis">
                                    {{ $result->jenis }}
                                </td>
                                <td class="p-2 text-sm border produk">
                                    {{ $result->produk }}
                                </td>
                                <td class="p-2 text-sm border date">
                                    {{ date('Y-m-d', strtotime($result->date)) }}
                                </td>
                                <td class="p-2">
                                    <div class="flex items-center space-x-4 text-base">
                                        <a href="{{ route('result.edit', $result->id) }}" class="text-premier">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('result.destroy', $result->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid p-2 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9 ">
                <span class="flex items-center col-span-3">
                    Showing {{ $results->firstItem() }} - {{ $results->lastItem() }} of {{ $results->total() }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                {{ $results->links('components.pagination', ['data' => $results]) }}
                {{-- @include('components.pagination') --}}
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

        $("#btn-excel").click(function() {
            exportTableToExcel('table-container', `Data DS`);
        });

        const find = () => {
            let search = $("#search").val();
            let searchBy = $('#search_by').val();
            let pattern = new RegExp(search, "i");

            $(`.${searchBy}`).each(function() {
                let label = $(this).text();
                // console.log(status);

                if (pattern.test(label)) {
                    $(this).parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
        }
    </script>
@endsection
