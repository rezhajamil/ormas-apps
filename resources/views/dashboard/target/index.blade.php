@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 ">
            Data Target
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
                        <option value="id_outlet">ID Outlet</option>
                        <option value="nama_outlet">Nama Outlet</option>
                        <option value="telp_pemilik">Telp Pemilik</option>
                        <option value="nama_sf">Nama SF</option>
                        <option value="tap_kcp">TAP</option>
                        <option value="side_id">SIDE ID</option>
                        <option value="kategori">Kategori</option>
                        <option value="pareto">Pareto</option>
                        <option value="frekuensi_kunjungan">Frekuensi</option>
                        <option value="hari_kunjungan">Hari</option>
                        <option value="hrc_index">HRC Index</option>
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
                        <option value="id_outlet">ID Outlet</option>
                        <option value="nama_outlet">Nama Outlet</option>
                        <option value="telp_pemilik">Telp Pemilik</option>
                        <option value="nama_sf">Nama SF</option>
                        <option value="tap_kcp">TAP</option>
                        <option value="side_id">SIDE ID</option>
                        <option value="kategori">Kategori</option>
                        <option value="pareto">Pareto</option>
                        <option value="frekuensi_kunjungan">Frekuensi</option>
                        <option value="hari_kunjungan">Hari</option>
                        <option value="hrc_index">HRC Index</option>
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
                            <th class="p-2 border-x whitespace-nowrap">No</th>
                            <th class="p-2 border-x whitespace-nowrap">Kabupaten</th>
                            <th class="p-2 border-x whitespace-nowrap">Kecamatan</th>
                            <th class="p-2 border-x whitespace-nowrap">Nama Outlet</th>
                            <th class="p-2 border-x whitespace-nowrap">ID Outlet</th>
                            <th class="p-2 border-x whitespace-nowrap">Telepon Pemilik</th>
                            <th class="p-2 border-x whitespace-nowrap">Nama SF</th>
                            <th class="p-2 border-x whitespace-nowrap">TAP</th>
                            <th class="p-2 border-x whitespace-nowrap">SIDE ID</th>
                            <th class="p-2 border-x whitespace-nowrap">Kategori</th>
                            <th class="p-2 border-x whitespace-nowrap">Pareto</th>
                            <th class="p-2 border-x whitespace-nowrap">Frekuensi</th>
                            <th class="p-2 border-x whitespace-nowrap">Hari</th>
                            <th class="p-2 border-x whitespace-nowrap">Remark Fisik</th>
                            <th class="p-2 border-x whitespace-nowrap">PJP</th>
                            <th class="p-2 border-x whitespace-nowrap">Lighthouse</th>
                            <th class="p-2 border-x whitespace-nowrap">HRC Index</th>
                            <th class="p-2 border-x whitespace-nowrap">Status</th>
                            <th class="p-2 border-x whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($outlets as $idx => $outlet)
                            <tr class="text-gray-700 ">
                                <td class="p-2 text-sm border">
                                    {{ $idx + $outlets->firstItem() }}
                                </td>
                                <td class="p-2 text-sm border kabupaten">
                                    {{ $outlet->kabupaten }}
                                </td>
                                <td class="p-2 text-sm border kecamatan">
                                    {{ $outlet->kecamatan }}
                                </td>
                                <td class="p-2 text-sm border nama_outlet">
                                    {{ $outlet->nama_outlet }}
                                </td>
                                <td class="p-2 text-sm border id_outlet">
                                    {{ $outlet->id_outlet }}
                                </td>
                                <td class="p-2 text-sm border telp_pemilik">
                                    {{ $outlet->telp_pemilik }}
                                </td>
                                <td class="p-2 text-sm border nama_sf">
                                    {{ $outlet->nama_sf }}
                                </td>
                                <td class="p-2 text-sm border tap_kcp">
                                    {{ $outlet->tap_kcp }}
                                </td>
                                <td class="p-2 text-sm border side_id_cover">
                                    {{ $outlet->side_id_cover }}
                                </td>
                                <td class="p-2 text-sm border kategori">
                                    @switch($outlet->kategori)
                                        @case('PLATINUM')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight inline-block w-full text-center text-white bg-[#dedddb] rounded-full whitespace-nowrap ">
                                                {{ $outlet->kategori }}
                                            </span>
                                        @break

                                        @case('GOLD')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight inline-block w-full text-center text-white bg-[#FFD700] rounded-full whitespace-nowrap ">
                                                {{ $outlet->kategori }}
                                            </span>
                                        @break

                                        @case('SILVER')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight inline-block w-full text-center text-white bg-[#C0C0C0] rounded-full whitespace-nowrap ">
                                                {{ $outlet->kategori }}
                                            </span>
                                        @break

                                        @case('BRONZE')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight inline-block w-full text-center text-white bg-[#CD7F32] rounded-full whitespace-nowrap ">
                                                {{ $outlet->kategori }}
                                            </span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td class="p-2 text-sm border pareto">
                                    {{ $outlet->pareto }}
                                </td>
                                <td class="p-2 text-sm border frekuensi_kunjungan">
                                    {{ $outlet->frekuensi_kunjungan }}
                                </td>
                                <td class="p-2 text-sm border hari_kunjungan">
                                    {{ $outlet->hari_kunjungan }}
                                </td>
                                <td class="p-2 text-sm border remark_fisik">
                                    {{ $outlet->remark_fisik }}
                                </td>
                                <td class="p-2 text-sm border pjp">
                                    {{ $outlet->pjp }}
                                </td>
                                <td class="p-2 text-sm border kecamatan_lighthouse">
                                    {{ $outlet->kecamatan_lighthouse }}
                                </td>
                                <td class="p-2 text-sm border hrc_index">
                                    {{ $outlet->hrc_index }}
                                </td>
                                <td class="p-2 text-xs text-center border status"
                                    status="{{ $outlet->status ? 'Aktif' : 'Tidak Aktif' }}">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight {{ $outlet->status ? 'text-green-700 bg-green-100 ' : 'text-red-700 bg-red-100 ' }} inline-block w-full rounded-full whitespace-nowrap ">
                                        {{ $outlet->status ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>
                                <td class="p-2">
                                    <div class="flex items-center space-x-4 text-base">
                                        <a href="{{ route('outlet.change_status', $outlet->id) }}" class="text-premier">
                                            <i
                                                class="fa-solid {{ $outlet->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                        </a>
                                        <a href="{{ route('outlet.edit', $outlet->id) }}" class="text-premier">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
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
                    Showing {{ $outlets->firstItem() }} - {{ $outlets->lastItem() }} of {{ $outlets->total() }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                {{ $outlets->links('components.pagination', ['data' => $outlets]) }}
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
