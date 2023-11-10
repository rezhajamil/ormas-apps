@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 ">
            Detail Outlet
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
                                AGUSTUS</th>
                            <th colspan="5" class="p-2 text-white bg-black whitespace-nowrap">SO & PAIR AGUSTUS
                            </th>
                            <th colspan="10" class="p-2 text-white bg-black whitespace-nowrap">SO & PAIR
                                SEPTEMBER</th>
                            <th colspan="8" class="p-2 bg-lime-600 whitespace-nowrap">RENEWAL AKUISISI</th>
                            <th colspan="4" class="p-2 bg-sky-600 whitespace-nowrap">OMSET</th>
                            <th colspan="8" class="p-2 bg-red-700 whitespace-nowrap">SUPER SERU</th>
                            <th rowspan="2" class="p-2 bg-gray-500 whitespace-nowrap">Kecamatan Lighthouse</th>
                            <th rowspan="2" class="p-2 bg-gray-500 whitespace-nowrap">HRC Index</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b divide-x divide-white divide-solid bg-gray-50 ">
                            <th class="p-2 bg-gray-500 whitespace-nowrap">ID Outlet</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">No. RS</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Nama Outlet</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">SF</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">No. HP Pemilik</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Sub Branch</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Cluster</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">TAP-KCP</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">SIDE ID COVER</th>
                            <th class="p-2 bg-purple-800 whitespace-nowrap">Kategori Outlet</th>
                            <th class="p-2 bg-purple-800 whitespace-nowrap">Pareto/Non Pareto</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Frekuensi Kunjungan</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Hari Kunjungan</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Remark Fisik SF Code</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">PJP Non PJP</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Kecamatan</th>
                            <th class="p-2 bg-gray-500 whitespace-nowrap">Kabupaten</th>

                            {{-- CVM --}}
                            <th class="p-2 bg-black whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-black whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-black whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-black whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-black whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-black whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-black whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-black whitespace-nowrap">Rev 29 September</th>
                            <th class="p-2 bg-black whitespace-nowrap">Remark TRX</th>

                            {{-- COMBO SAKTI --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- INTERNET SAKTI --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- HOT PROMO --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- DIGITAL --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- VOICE --}}
                            <th class="p-2 bg-red-500 whitespace-nowrap">P1 LEGACY TRX 1-4</th>
                            <th class="p-2 bg-red-500 whitespace-nowrap">P1 LEGACY TRX 1</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- VAS --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- PRODUCTIVE --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- ST SP --}}
                            <th class="p-2 bg-black whitespace-nowrap">FULL AGUSTUS</th>
                            <th class="p-2 bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-2 bg-black whitespace-nowrap">28 Agustus</th>
                            <th class="p-2 bg-black whitespace-nowrap">28 September</th>

                            {{-- ST VF --}}
                            <th class="p-2 bg-black whitespace-nowrap">FULL AGUSTUS</th>
                            <th class="p-2 bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-2 bg-black whitespace-nowrap">28 Agustus</th>
                            <th class="p-2 bg-black whitespace-nowrap">28 September</th>

                            {{-- SO & PAIR FM AGUSTUS --}}
                            <th class="p-2 bg-green-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">REV SO</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">SO USIM</th>

                            {{-- SO & PAIR AGUSTUS --}}
                            <th class="p-2 bg-green-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">REV SO</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-2 bg-green-500 whitespace-nowrap">SO USIM</th>

                            {{-- SO & PAIR SEPTEMBER --}}
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">SO_SP</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">REV SO</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">SO IN</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">SO OUT</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">PAIR_VF</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">REV PAIR</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">PAIR_IN</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">PAIR_OUT</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">%PAIR_IN</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">%PAIR_OUT</th>

                            {{-- RENEWAL AKUISISI --}}
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-orange-500 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-yellow-500 whitespace-nowrap">Rev 29 September</th>

                            {{-- OMSET --}}
                            <th class="p-2 bg-black whitespace-nowrap">FM AGUSTUS</th>
                            <th class="p-2 bg-black whitespace-nowrap">TARGET</th>
                            <th class="p-2 bg-black whitespace-nowrap">M1</th>
                            <th class="p-2 bg-black whitespace-nowrap">M</th>

                            {{-- SUPER SERU --}}
                            <th class="p-2 bg-green-700 whitespace-nowrap">FM Agustus TRX</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">FM Agustus REV</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">Target TRX</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">Target Rev</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">TRX 29 Agustus</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">TRX 29 September</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">Rev 29 Agustus</th>
                            <th class="p-2 bg-green-700 whitespace-nowrap">Rev 29 September</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-white uppercase border-b divide-x divide-white divide-solid bg-gray-50 ">
                            <th class="p-2 bg-red-400 whitespace-nowrap">1</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">2</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">3</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">4</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">5</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">6</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">7</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">8</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">9</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">10</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">11</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">12</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">13</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">14</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">15</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">16</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">17</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">18</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">19</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">20</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">21</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">22</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">23</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">24</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">25</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">26</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">27</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">28</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">29</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">30</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">31</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">32</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">33</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">34</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">35</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">36</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">37</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">38</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">39</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">40</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">41</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">42</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">43</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">44</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">45</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">46</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">47</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">48</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">49</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">50</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">51</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">52</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">53</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">54</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">55</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">56</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">57</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">58</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">59</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">60</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">61</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">62</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">63</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">64</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">65</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">66</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">67</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">68</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">69</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">70</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">71</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">72</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">73</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">74</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">75</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">76</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">77</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">78</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">79</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">80</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">81</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">82</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">83</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">84</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">85</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">86</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">87</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">88</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">89</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">90</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">91</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">92</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">93</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">94</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">95</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">96</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">97</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">98</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">99</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">100</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">101</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">102</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">103</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">104</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">105</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">106</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">107</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">108</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">109</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">110</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">111</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">112</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">113</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">114</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">115</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">116</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">117</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">118</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">119</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">120</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">121</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">122</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">123</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">124</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">125</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">126</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">127</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">128</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">129</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">130</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">131</th>
                            <th class="p-2 bg-red-400 whitespace-nowrap">132</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">

                    </tbody>
                </table>
            </div>
            <div
                class="grid p-2 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9 ">
                <span class="flex items-center col-span-3">
                    {{-- Showing {{ $outlets->firstItem() }} - {{ $outlets->lastItem() }} of {{ $outlets->total() }} --}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                {{-- {{ $outlets->links('components.pagination', ['data' => $outlets]) }} --}}
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
