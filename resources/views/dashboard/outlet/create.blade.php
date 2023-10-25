@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('outlet.index') }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Tambah Outlet
        </h4>
        <form action="{{ route('outlet.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Kabupaten*
                    </span>
                    <select name="kabupaten" id="kabupaten" class="form-input">
                        <option value="" selected disabled>Pilih Kabupaten</option>
                        @foreach ($kabupaten as $item)
                            <option value="{{ $item->kabupaten }}"
                                {{ old('kabupaten') == $item->kabupaten ? 'selected' : '' }}>
                                {{ $item->kabupaten }}
                            </option>
                        @endforeach
                    </select>
                    @error('kabupaten')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Kecamatan*
                    </span>
                    <select name="kecamatan" id="kecamatan" class="form-input">
                        <option value="" selected disabled>Pilih Kecamatan</option>
                    </select>
                    @error('kecamatan')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nomor RS*
                    </span>
                    <input type="number" name="no_rs" class="form-input" placeholder="Nomor RS"
                        value="{{ old('no_rs') }}" required />
                    @error('no_rs')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        ID Outlet*
                    </span>
                    <input type="number" name="id_outlet" class="form-input" placeholder="ID Outlet"
                        value="{{ old('id_outlet') }}" required />
                    @error('id_outlet')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nama Outlet*
                    </span>
                    <input type="text" name="nama_outlet" class="uppercase form-input" placeholder="Nama Outlet"
                        value="{{ old('nama_outlet') }}" required />
                    @error('nama_outlet')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Telp Pemilik*
                    </span>
                    <input type="number" name="telp_pemilik" class="form-input" placeholder="Telp Pemilik"
                        value="{{ old('telp_pemilik') }}" required />
                    @error('telp_pemilik')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nama SF*
                    </span>
                    <input type="text" name="nama_sf" class="uppercase form-input" placeholder="Nama SF"
                        value="{{ old('nama_sf') }}" required />
                    @error('nama_sf')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        TAP KCP*
                    </span>
                    <input type="text" name="tap_kcp" class="uppercase form-input" placeholder="TAP KCP"
                        value="{{ old('tap_kcp') }}" required />
                    <span class="text-gray-500 underline cursor-pointer hover:text-gray-600" id="btn-search-tap">
                        <i class="mr-1 fa-solid fa-magnifying-glass"></i>
                        <span>Cari TAP</span>
                    </span>
                    @error('tap_kcp')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Side ID Cover*
                    </span>
                    <input type="text" name="side_id_cover" class="uppercase form-input" placeholder="Side ID Cover"
                        value="{{ old('side_id_cover') }}" required />
                    @error('side_id_cover')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Kategori*
                    </span>
                    <select name="kategori" id="kategori" class="form-input">
                        <option value="" selected disabled>Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item }}" {{ old('kategori') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Pareto*
                    </span>
                    <select name="pareto" id="pareto" class="form-input">
                        <option value="" selected disabled>Pilih Pareto</option>
                        @foreach ($pareto as $item)
                            <option value="{{ $item }}" {{ old('pareto') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('pareto')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Frekuensi Kunjungan*
                    </span>
                    <select name="frekuensi_kunjungan" id="frekuensi_kunjungan" class="form-input">
                        <option value="" selected disabled>Pilih Frekuensi Kunjungan</option>
                        @foreach ($frekuensi as $item)
                            <option value="{{ $item }}"
                                {{ old('frekuensi_kunjungan') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('frekuensi_kunjungan')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Hari Kunjungan*
                    </span>
                    <select name="hari_kunjungan" id="hari_kunjungan" class="form-input">
                        <option value="" selected disabled>Pilih Hari Kunjungan</option>
                        @foreach ($hari as $item)
                            <option value="{{ $item }}" {{ old('hari_kunjungan') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('hari_kunjungan')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Remark Fisik*
                    </span>
                    <select name="remark_fisik" id="remark_fisik" class="form-input">
                        <option value="" selected disabled>Pilih Remark Fisik</option>
                        @foreach ($fisik as $item)
                            <option value="{{ $item }}" {{ old('remark_fisik') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('remark_fisik')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        PJP*
                    </span>
                    <select name="pjp" id="pjp" class="form-input">
                        <option value="" selected disabled>Pilih PJP</option>
                        @foreach ($pjp as $item)
                            <option value="{{ $item }}" {{ old('pjp') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('pjp')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Kecamatan Lighthouse*
                    </span>
                    <select name="kecamatan_lighthouse" id="kecamatan_lighthouse" class="form-input">
                        <option value="" selected disabled>Pilih Kecamatan Lighthouse</option>
                        @foreach ($lighthouse as $item)
                            <option value="{{ $item }}"
                                {{ old('kecamatan_lighthouse') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('kecamatan_lighthouse')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        HRC Index*
                    </span>
                    <input type="text" name="hrc_index" class="uppercase form-input" placeholder="HRC Index"
                        value="{{ old('hrc_index') }}" required />
                    @error('hrc_index')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 mt-6 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">
                Submit
            </button>
        </form>
        <span class="inline-block w-full my-2 text-lg font-semibold text-center text-gray-600">Atau Upload File</span>
        <form action="{{ route('outlet.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md"
            enctype="multipart/form-data">
            @csrf
            <div class="flex w-full gap-4">
                <label class="block w-full px-6 text-sm">
                    <span class="font-semibold text-gray-700">
                        File CSV (max 1000 row)*
                    </span>
                    <p class="w-full overflow-scroll text-sm text-gray-700 whitespace-normal">
                        Header
                    <ol class="grid w-full grid-cols-4 text-gray-500 list-decimal">
                        <li>no_rs</li>
                        <li>id_outlet</li>
                        <li>nama_outlet</li>
                        <li>telp_pemilik</li>
                        <li>nama_sf</li>
                        <li>branch</li>
                        <li>sub_branch</li>
                        <li>cluster</li>
                        <li>kabupaten</li>
                        <li>kecamatan</li>
                        <li>tap_kcp</li>
                        <li>side_id_cover</li>
                        <li>kategori</li>
                        <li>pareto</li>
                        <li>frekuensi_kunjungan</li>
                        <li>hari_kunjungan</li>
                        <li>remark_fisik</li>
                        <li>pjp</li>
                        <li>kecamatan_lighthouse</li>
                        <li>hrc_index</li>
                    </ol>
                    </p>
                    <input type="file" name="csv" class="mt-2" required />
                    @error('csv')
                        <span class="block mt-1 text-xs text-red-600">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 mt-6 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">
                Submit
            </button>
        </form>
    </div>
    <div class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/70" id="search-tap"
        style="display: none">
        <div class="w-4/5 px-3 py-2 bg-white rounded-md h-fit sm:w-1/2">
            <span class="inline-block w-full font-bold text-right text-gray-500 cursor-pointer hover:text-gray-600"
                id="close-search-tap">X</span>
            <span class="inline-block w-full text-xl font-bold text-center text-premier">List TAP</span>
            <hr>
            <div class="flex flex-col w-full gap-2 mt-2">
                @forelse ($taps as $idx => $tap)
                    <div class="w-full p-2 transition-all border-b-2 rounded cursor-pointer hover:bg-gray-200 tap-item"
                        tap="{{ $tap->tap_kcp }}">
                        <span class="font-semibold text-slate-600">{{ $tap->tap_kcp }}</span>
                    </div>
                @empty
                    <span class="italic text-gray-400">Tidak Pilihan TAP</span>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#btn-search-tap").click(function() {
                $("#search-tap").show()
            })
            $("#close-search-tap").click(function() {
                $("#search-tap").hide()
            })
            $(".tap-item").click(function() {
                $("input[name='tap_kcp']").val($(this).attr('tap'));
                $("#search-tap").hide();
            })

            $("select[name='kabupaten']").change(function() {
                // console.log('object');
                $.ajax({
                    url: '{{ route('territory.get_kecamatan') }}',
                    method: 'GET',
                    data: {
                        kabupaten: $(this).val()
                    },
                    success: (data) => {
                        $("select[name='kecamatan']").html(
                            "<option selected disabled>Pilih Kecamatan</option>" +
                            data.map(kecamatan => {
                                return `<option value="${kecamatan.kecamatan}">${kecamatan.kecamatan}</option>`
                            }))
                    }
                })
            })
        });
    </script>
@endsection
