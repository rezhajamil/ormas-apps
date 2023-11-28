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
            Tambah Detail Outlet
        </h4>
        <form action="{{ route('detail_outlet.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md"
            enctype="multipart/form-data">
            @csrf
            <div class="flex w-full gap-4">
                <label class="block w-full px-6 text-sm">
                    <span class="font-semibold text-gray-700">
                        File CSV (max 20000 row)*
                    </span>
                    <a href="{{ asset('example.csv') }}" target="_blank"
                        class="inline-block px-2 py-2 ml-3 font-bold text-white transition-all bg-green-800 rounded hover:bg-green-900"><i
                            class="mr-2 fa-solid fa-file-arrow-down"></i>Contoh CSV
                    </a>
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
