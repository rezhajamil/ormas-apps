@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('target.index') }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Edit Target
        </h4>
        <form action="{{ route('target.update', $target->id) }}" method="post"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        ID Outlet*
                    </span>
                    <input type="text" name="id_outlet" class="uppercase form-input" placeholder="ID Outlet"
                        value="{{ old('id_outlet', $target->id_outlet) }}" required />
                    <span class="text-gray-500 underline cursor-pointer hover:text-gray-600" id="btn-search-outlet">
                        <i class="mr-1 fa-solid fa-magnifying-glass"></i>
                        <span>Cari OUTLET</span>
                    </span>
                    @error('id_outlet')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Transaksi*
                    </span>
                    <input type="number" name="transaksi" class="uppercase form-input" placeholder="Transaksi"
                        value="{{ old('transaksi', $target->trx) }}" required />
                    @error('transaksi')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Revenue*
                    </span>
                    <input type="number" name="revenue" class="uppercase form-input" placeholder="Revenue"
                        value="{{ old('revenue', $target->rev) }}" required />
                    @error('revenue')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Jenis*
                    </span>
                    <input type="text" name="jenis" class="uppercase form-input" placeholder="Jenis"
                        value="{{ old('jenis', $target->jenis) }}" required />
                    <span class="text-gray-500 underline cursor-pointer hover:text-gray-600" id="btn-search-jenis">
                        <i class="mr-1 fa-solid fa-magnifying-glass"></i>
                        <span>Cari Jenis</span>
                    </span>
                    @error('jenis')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Produk*
                    </span>
                    <input type="text" name="produk" class="uppercase form-input" placeholder="Produk"
                        value="{{ old('produk', $target->produk) }}" required />
                    <span class="text-gray-500 underline cursor-pointer hover:text-gray-600" id="btn-search-produk">
                        <i class="mr-1 fa-solid fa-magnifying-glass"></i>
                        <span>Cari Produk</span>
                    </span>
                    @error('produk')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Tanggal*
                    </span>
                    <input type="date" name="date" class="uppercase form-input" placeholder="Tanggal"
                        value="{{ old('date', $target->date) }}" required />
                    @error('date')
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
        <div class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/70" id="search-jenis"
            style="display: none">
            <div class="w-4/5 px-3 py-2 bg-white rounded-md h-fit sm:w-1/2">
                <span class="inline-block w-full font-bold text-right text-gray-500 cursor-pointer hover:text-gray-600"
                    id="close-search-jenis">X</span>
                <span class="inline-block w-full text-xl font-bold text-center text-premier">List JENIS</span>
                <hr>
                <div class="flex flex-col w-full gap-2 mt-2">
                    @forelse ($jenis as $idx => $data)
                        <div class="w-full p-2 transition-all border-b-2 rounded cursor-pointer hover:bg-gray-200 jenis-item"
                            jenis="{{ $data->jenis }}">
                            <span class="font-semibold text-slate-600">{{ $data->jenis }}</span>
                        </div>
                    @empty
                        <span class="italic text-gray-400">Tidak Ada Pilihan Jenis</span>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/70" id="search-produk"
            style="display: none">
            <div class="w-4/5 px-3 py-2 bg-white rounded-md h-fit sm:w-1/2">
                <span class="inline-block w-full font-bold text-right text-gray-500 cursor-pointer hover:text-gray-600"
                    id="close-search-produk">X</span>
                <span class="inline-block w-full text-xl font-bold text-center text-premier">List PRODUK</span>
                <hr>
                <div class="flex flex-col w-full gap-2 mt-2">
                    @forelse ($produk as $idx => $data)
                        <div class="w-full p-2 transition-all border-b-2 rounded cursor-pointer hover:bg-gray-200 produk-item"
                            produk="{{ $data->produk }}">
                            <span class="font-semibold text-slate-600">{{ $data->produk }}</span>
                        </div>
                    @empty
                        <span class="italic text-gray-400">Tidak Ada Pilihan Produk</span>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/70" id="search-outlet"
            style="display: none">
            <div class="w-4/5 px-3 py-2 bg-white rounded-md h-fit sm:w-1/2">
                <span class="inline-block w-full font-bold text-right text-gray-500 cursor-pointer hover:text-gray-600"
                    id="close-search-outlet">X</span>
                <input type="text" id="keyword-outlet" class="w-full my-2" placeholder="Cari Outlet">
                <hr>
                <span id="loading" class="inline-block w-full text-lg text-center text-gray-400"
                    style="display: none">Mencari...</span>
                <div class="flex flex-col w-full gap-2 mt-2" id="outlet-list">
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $("#btn-search-jenis").click(function() {
                    $("#search-jenis").show()
                })
                $("#close-search-jenis").click(function() {
                    $("#search-jenis").hide()
                })
                $(".jenis-item").click(function() {
                    $("input[name='jenis']").val($(this).attr('jenis'));
                    $("#search-jenis").hide();
                })

                $("#btn-search-produk").click(function() {
                    $("#search-produk").show()
                })
                $("#close-search-produk").click(function() {
                    $("#search-produk").hide()
                })
                $(".produk-item").click(function() {
                    $("input[name='produk']").val($(this).attr('produk'));
                    $("#search-produk").hide();
                })

                $("#btn-search-outlet").click(function() {
                    $("#search-outlet").show()
                })
                $("#close-search-outlet").click(function() {
                    $("#search-outlet").hide()
                })

                $(document).on('click', ".outlet-item", function() {
                    $("input[name='id_outlet']").val($(this).attr('id_outlet'));
                    $("#search-outlet").hide();
                })

                $("#keyword-outlet").on('input', function() {
                    $("#loading").show()
                    $.ajax({
                        url: '{{ route('outlet.get_outlet') }}',
                        method: 'GET',
                        data: {
                            nama_outlet: $(this).val()
                        },
                        success: (data) => {
                            $("#outlet-list").html(
                                data.map(d => {
                                    return (
                                        `<div class="w-full p-2 transition-all border-b-2 rounded cursor-pointer hover:bg-gray-200 outlet-item"
                                    id_outlet="${d.id_outlet}">
                                    <span class="font-semibold text-slate-600">${d.nama_outlet}</span>
                                </div>`
                                    )
                                })
                            );

                            $('#loading').hide();

                            if (!data.length) {
                                $('#outlet-list').html(
                                    '<span class="inline-block w-full text-lg text-center text-gray-400">Tidak Ada Data</span>'
                                )
                            }
                        }
                    })
                })

            });
        </script>
    @endsection
