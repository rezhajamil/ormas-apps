@extends('layouts.dashboard.app')
@section('content')
    @php
        function convertBil($num, $decimal = 0)
        {
            $num = (int) $num;
            return number_format($num, $decimal, ',', '.');
        }
    @endphp
    <div class="container grid px-6 py-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 ">
            Detail Outlet
        </h4>
        <div class="flex items-end justify-between w-full mb-6">
            <form method="GET" action="{{ route('detail_outlet.index') }}" class="flex items-end gap-x-4">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">
                        Tanggal
                    </span>
                    <input type="date" name="date" id="date" value="{{ Request::get('date') }}"
                        class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                </label>
                <input type="number" name="id_outlet" id="id_outlet" value="{{ $id_outlet }}"
                    placeholder="ID Outlet (Optional)"
                    class="block w-full mt-1 text-sm rounded-md form-select focus:border-sekunder focus:ring-sekunder focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <button
                    class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-600 rounded-md shadow-md h-fit w-fit focus:outline-none focus:shadow-outline-purple">
                    <div class="flex items-center">
                        <i class="w-5 fa-solid fa-magnifying-glass"></i>
                        <span class="">Cari</span>
                    </div>
                </button>
            </form>
        </div>
        <hr class="border border-gray-600">
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
                href="{{ route('detail_outlet.create') }}">
                <div class="flex items-center">
                    <i class="w-5 fa-solid fa-plus"></i>
                    <span class="">Tambah Detail Outlet</span>
                </div>
            </a>
        </div>
        <div class="w-full overflow-hidden border rounded-md shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-white uppercase border-b divide-x divide-solid bg-gray-50 ">
                            <th rowspan="3" class="p-2 bg-gray-500 whitespace-nowrap">No</th>
                            <th colspan="17" class="p-2 bg-gray-800 whitespace-nowrap">Detail Outlet</th>
                            <th colspan="9" class="p-2 bg-cyan-900 whitespace-nowrap">CVM ( CS + IS + HOT
                                PROMO,MULTISIM )</th>
                            <th colspan="8" class="p-2 bg-green-600 whitespace-nowrap">COMBO SAKTI</th>
                            <th colspan="8" class="p-2 bg-lime-700 whitespace-nowrap">INTERNET SAKTI</th>
                            <th colspan="8" class="p-2 bg-green-300 whitespace-nowrap">HOT PROMO</th>
                            <th colspan="8" class="p-2 bg-red-400 whitespace-nowrap">DIGITAL</th>
                            <th colspan="10" class="p-2 bg-green-600 whitespace-nowrap">Voice</th>
                            <th colspan="8" class="p-2 bg-emerald-600 whitespace-nowrap">VAS</th>
                            <th colspan="6" class="p-2 bg-indigo-300 whitespace-nowrap">Productive</th>
                            <th colspan="4" class="p-2 text-white bg-black whitespace-nowrap">ST SP</th>
                            <th colspan="4" class="p-2 text-white bg-black whitespace-nowrap">ST VF</th>
                            <th colspan="5" class="p-2 text-white bg-black whitespace-nowrap">SO & PAIR FM
                                {{ $month_m1 }}</th>
                            <th colspan="5" class="p-2 text-white bg-black whitespace-nowrap">SO & PAIR
                                {{ $month_m1 }}
                            </th>
                            <th colspan="10" class="p-2 text-white bg-black whitespace-nowrap">SO & PAIR
                                SEPTEMBER</th>
                            <th colspan="8" class="p-2 bg-lime-600 whitespace-nowrap">RENEWAL AKUISISI</th>
                            <th colspan="4" class="p-2 bg-sky-600 whitespace-nowrap">OMSET</th>
                            <th colspan="8" class="p-2 bg-red-700 whitespace-nowrap">SUPER SERU</th>
                            <th rowspan="2" class="p-2 bg-gray-500 whitespace-nowrap">Kecamatan Lighthouse</th>
                            <th rowspan="2" class="p-2 bg-gray-500 whitespace-nowrap">HRC Index</th>
                            <th colspan="7" class="p-2 bg-red-600 whitespace-nowrap">PROGRAM NASIONAL</th>
                            <th colspan="6" class="p-2 bg-blue-900 whitespace-nowrap">PROGRAM LOKAL</th>
                            <th colspan="3" class="p-2 bg-orange-600 whitespace-nowrap">HISTORI ORDER</th>
                            <th colspan="3" class="p-2 bg-yellow-400 whitespace-nowrap">TARGET WEEKLY VALIDITY</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b divide-x divide-white divide-solid bg-gray-50 ">
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">ID Outlet</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">No. RS</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Nama Outlet</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">SF</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">No. HP Pemilik</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Sub Branch</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Cluster</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">TAP-KCP</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">SIDE ID COVER</th>
                            <th class="p-1 text-center bg-purple-800 whitespace-nowrap">Kategori Outlet</th>
                            <th class="p-1 text-center bg-purple-800 whitespace-nowrap">Pareto/Non Pareto</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Frekuensi Kunjungan</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Hari Kunjungan</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Remark Fisik SF Code</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">PJP Non PJP</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Kecamatan</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">Kabupaten</th>

                            {{-- CVM --}}
                            <th class="p-1 text-center bg-black whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">Rev {{ $mtd }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">Remark TRX</th>

                            {{-- COMBO SAKTI --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- INTERNET SAKTI --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- HOT PROMO --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- DIGITAL --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- VOICE --}}
                            <th class="p-1 text-center bg-red-500 whitespace-nowrap">P1 LEGACY TRX 1-4</th>
                            <th class="p-1 text-center bg-red-500 whitespace-nowrap">P1 LEGACY TRX 1</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- VAS --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- PRODUCTIVE --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- ST SP --}}
                            <th class="p-1 text-center bg-black whitespace-nowrap">FULL {{ $month_m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">{{ $m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">{{ $mtd }}</th>

                            {{-- ST VF --}}
                            <th class="p-1 text-center bg-black whitespace-nowrap">FULL {{ $month_m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">{{ $m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">{{ $mtd }}</th>

                            {{-- SO & PAIR FM  --}}
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">REV SO</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">SO USIM</th>

                            {{-- SO & PAIR  --}}
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">REV SO</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-1 text-center bg-green-500 whitespace-nowrap">SO USIM</th>

                            {{-- SO & PAIR SEPTEMBER --}}
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">REV SO</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">SO IN</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">SO OUT</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">PAIR_IN</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">PAIR_OUT</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">%PAIR_IN</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">%PAIR_OUT</th>

                            {{-- RENEWAL AKUISISI --}}
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-yellow-500 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- OMSET --}}
                            <th class="p-1 text-center bg-black whitespace-nowrap">FM {{ $month_m1 }}</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">M1</th>
                            <th class="p-1 text-center bg-black whitespace-nowrap">M</th>

                            {{-- SUPER SERU --}}
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">FM {{ $month_m1 }} TRX</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">FM {{ $month_m1 }} REV</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">Target TRX</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">Target Rev</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">TRX {{ $m1 }}</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">TRX {{ $mtd }}</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">Rev {{ $m1 }}</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">Rev {{ $mtd }}</th>

                            {{-- PROGRAM NASIONAL --}}
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">LH - BANJIR CUAN</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">LH - CVM HD</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">LH - SO DOUBLE CUAN</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">LH - PAKET SAKTI</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">SO REGULER</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">SUPER SERU</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">PRODI HQ</th>

                            {{-- PROGRAM LOKAL --}}
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">ANDALAN COMSAK</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">ANDALAN HOT PROMO</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">TAMBUAH</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">LAPAU SA</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">ANDALAN DIGITAL</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">ALL - PRODI LOKAL</th>

                            {{-- HISTORI ORDER --}}
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">W-3</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">W-2</th>
                            <th class="p-1 text-center bg-gray-500 whitespace-nowrap">W-1</th>

                            {{-- TARGET WEEKLY VALIDITY --}}
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">3D</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">5D</th>
                            <th class="p-1 text-center bg-green-700 whitespace-nowrap">7D</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-white uppercase border-b divide-x divide-white divide-solid bg-gray-50 ">
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">1</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">2</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">3</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">4</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">5</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">6</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">7</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">8</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">9</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">10</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">11</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">12</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">13</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">14</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">15</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">16</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">17</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">18</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">19</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">20</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">21</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">22</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">23</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">24</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">25</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">26</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">27</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">28</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">29</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">30</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">31</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">32</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">33</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">34</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">35</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">36</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">37</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">38</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">39</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">40</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">41</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">42</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">43</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">44</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">45</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">46</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">47</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">48</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">49</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">50</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">51</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">52</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">53</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">54</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">55</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">56</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">57</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">58</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">59</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">60</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">61</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">62</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">63</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">64</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">65</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">66</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">67</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">68</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">69</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">70</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">71</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">72</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">73</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">74</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">75</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">76</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">77</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">78</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">79</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">80</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">81</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">82</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">83</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">84</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">85</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">86</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">87</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">88</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">89</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">90</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">91</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">92</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">93</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">94</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">95</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">96</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">97</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">98</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">99</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">100</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">101</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">102</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">103</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">104</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">105</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">106</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">107</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">108</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">109</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">110</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">111</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">112</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">113</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">114</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">115</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">116</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">117</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">118</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">119</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">120</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">121</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">122</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">123</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">124</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">125</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">126</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">127</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">128</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">129</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">130</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">131</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">132</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">133</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">134</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">135</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">136</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">137</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">138</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">139</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">140</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">141</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">142</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">143</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">144</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">145</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">146</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">147</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">148</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">149</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">150</th>
                            <th class="p-1 text-center bg-red-400 whitespace-nowrap">151</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($details as $idx => $detail)
                            <tr>

                                <td class="p-1 text-sm text-center border">
                                    {{ $idx + $details->firstItem() }}
                                </td>
                                <td class="p-1 text-sm text-center border id_outlet">
                                    {{ $detail->id_outlet }}
                                </td>
                                <td class="p-1 text-sm text-center border no_rs">
                                    {{ $detail->no_rs }}
                                </td>
                                <td class="p-1 text-sm text-center border nama_outlet">
                                    {{ $detail->nama_outlet }}
                                </td>
                                <td class="p-1 text-sm text-center border sf">
                                    {{ $detail->sf }}
                                </td>
                                <td class="p-1 text-sm text-center border telp_pemilik">
                                    {{ $detail->telp_pemilik }}
                                </td>
                                <td class="p-1 text-sm text-center border sub_branch">
                                    {{ $detail->sub_branch }}
                                </td>
                                <td class="p-1 text-sm text-center border cluster">
                                    {{ $detail->cluster }}
                                </td>
                                <td class="p-1 text-sm text-center border tap_kcp">
                                    {{ $detail->tap_kcp }}
                                </td>
                                <td class="p-1 text-sm text-center border side_id_cover">
                                    {{ $detail->side_id_cover }}
                                </td>
                                <td class="p-1 text-sm text-center border kategori">
                                    {{ $detail->kategori }}
                                </td>
                                <td class="p-1 text-sm text-center border pareto">
                                    {{ $detail->pareto }}
                                </td>
                                <td class="p-1 text-sm text-center border frekuensi_kunjungan">
                                    {{ $detail->frekuensi_kunjungan }}
                                </td>
                                <td class="p-1 text-sm text-center border hari_kunjungan">
                                    {{ $detail->hari_kunjungan }}
                                </td>
                                <td class="p-1 text-sm text-center border remark_fisik">
                                    {{ $detail->remark_fisik }}
                                </td>
                                <td class="p-1 text-sm text-center border pjp">
                                    {{ $detail->pjp }}
                                </td>
                                <td class="p-1 text-sm text-center border kecamatan">
                                    {{ $detail->kecamatan }}
                                </td>
                                <td class="p-1 text-sm text-center border kabupaten">
                                    {{ $detail->kabupaten }}
                                </td>
                                {{-- CVM --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->cvm_mtd_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border remark_trx">
                                    {{ $detail->cvm_remark_trx }}
                                </td>
                                {{-- COMBO_SAKTI --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->combo_sakti_mtd_rev) }}
                                </td>
                                {{-- Internet Sakti --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->internet_sakti_mtd_rev) }}
                                </td>
                                {{-- Hot Promo --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->hot_promo_mtd_rev) }}
                                </td>
                                {{-- Digital --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->digital_mtd_rev) }}
                                </td>
                                {{-- Voice --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->p1_legacy_trx_1_4 }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->p1_legacy_trx_1 }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->voice_mtd_rev) }}
                                </td>
                                {{-- VAS --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->vas_mtd_rev) }}
                                </td>
                                {{-- PRODUCTIVE --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->productive_mtd_rev) }}
                                </td>
                                {{-- ST SP --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_sp_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_sp_target) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_sp_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_sp_mtd) }}
                                </td>
                                {{-- ST VF --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_vf_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_vf_target) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_vf_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->st_vf_mtd) }}
                                </td>
                                {{-- SO PAIR FM --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_so_sp_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_so_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_pair_vf_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_pair_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ '' }}
                                </td>
                                {{-- SO PAIR M1 --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_so_sp_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_so_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_pair_vf_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_pair_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ '' }}
                                </td>
                                {{-- SO PAIR MTD --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_so_sp_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_so_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_so_in_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_so_out_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_pair_vf_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_rev_pair_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_pair_in_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->so_pair_pair_out_mtd) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil(($detail->so_pair_pair_in_mtd / ($detail->so_pair_pair_vf_mtd != 0 ? $detail->so_pair_pair_vf_mtd : 1)) * 100) }}
                                    %
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil(($detail->so_pair_pair_out_mtd / ($detail->so_pair_pair_vf_mtd != 0 ? $detail->so_pair_pair_vf_mtd : 1)) * 100) }}
                                    %
                                </td>
                                {{-- Renewal Akuisisi --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->renewal_akuisisi_mtd_rev) }}
                                </td>
                                {{-- OMSET --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->omset_fm) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->omset_target) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->omset_m1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->omset_mtd) }}
                                </td>
                                {{-- Super Seru --}}
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_fm_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_fm_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_target_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_target_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_m1_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_mtd_trx) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_m1_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->super_seru_mtd_rev) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->kecamatan_lighthouse }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->hrc_index }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_lh_banjir_cuan }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_lh_cvm_hd }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_lh_so_double_cuan }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_lh_paket_sakti }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_so_reguler }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_super_seru }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pn_prodi_hq }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_andalan_comsak }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_andalan_hot_promo }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_tambuah }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_lapau_sa }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_andalan_digital }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ $detail->pl_all_prodi_lokal }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->history_order_w_3) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->history_order_w_2) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->history_order_w_1) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->target_weekly_validity_3d) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->target_weekly_validity_5d) }}
                                </td>
                                <td class="p-1 text-sm text-center border">
                                    {{ convertBil($detail->target_weekly_validity_7d) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid p-2 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9 ">
                <span class="flex items-center col-span-3">
                    @if ($details)
                        Showing {{ $details->firstItem() }} - {{ $details->lastItem() }} of {{ $details->total() }}
                    @endif
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                @if ($details)
                    {{ $details->links('components.pagination', ['data' => $details]) }}
                @endif
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
