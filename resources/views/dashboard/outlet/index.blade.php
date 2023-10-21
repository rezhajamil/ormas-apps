@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 ">
            Data Outlet
        </h4>
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
                        <option value="regional">Regional</option>
                        <option value="branch">Branch</option>
                        <option value="cluster">Cluster</option>
                        <option value="digipos">Digipos</option>
                        <option value="nama">Nama</option>
                        <option value="telp">Telp</option>
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Pilih Status
                    </span>
                    <select id="search_status"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="">Semua</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </label>
            </div>
            <a class="flex items-center justify-between px-3 py-2 font-semibold text-white rounded-md shadow-md bg-sekunder w-fit focus:outline-none focus:shadow-outline-purple"
                href="{{ route('outlet.create') }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-plus"></i>
                    <span class="">Tambah Outlet</span>
                </div>
            </a>
        </div>
        <div class="w-full overflow-hidden border rounded-md shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Regional</th>
                            <th class="px-4 py-3">Branch</th>
                            <th class="px-4 py-3">Cluster</th>
                            <th class="px-4 py-3">ID Digipos</th>
                            <th class="px-4 py-3">Username</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Telepon</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y ">
                        @foreach ($users as $idx => $user)
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 text-sm">
                                    {{ $idx + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm regional">
                                    {{ $user->regional }}
                                </td>
                                <td class="px-4 py-3 text-sm branch">
                                    {{ $user->branch }}
                                </td>
                                <td class="px-4 py-3 text-sm cluster">
                                    {{ $user->cluster }}
                                </td>
                                <td class="px-4 py-3 text-sm digipos">
                                    {{ $user->id_digipos }}
                                </td>
                                <td class="px-4 py-3 text-sm username">
                                    {{ $user->username }}
                                </td>
                                <td class="px-4 py-3 text-sm nama">
                                    {{ $user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm telp">
                                    {{ $user->telp }}
                                </td>
                                <td class="px-4 py-3 text-xs status" status="{{ $user->status ? 'Aktif' : 'Tidak Aktif' }}">
                                    @if ($user->status)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full whitespace-nowrap ">
                                            Aktif
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full whitespace-nowrap ">
                                            Tidak Aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-base">
                                        @if ($user->status)
                                            <a href="{{ route('user.change_status', $user->id) }}" class="text-premier">
                                                <i class="fa-solid fa-toggle-on"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('user.change_status', $user->id) }}" class="text-premier">
                                                <i class="fa-solid fa-toggle-off"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('user.edit', $user->id) }}" class="text-premier">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <button
                                            class="flex items-center justify-between m-0 text-sm font-medium leading-5 rounded-md text-premier focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9 ">
                <span class="flex items-center col-span-3">
                    Showing {{ count($users) }} of {{ count($users) }}
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

        $("#btn-excel").click(function() {
            exportTableToExcel('table-container', `Data DS`);
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
