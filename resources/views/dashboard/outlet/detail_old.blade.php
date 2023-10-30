@extends('layouts.dashboard.app', ['plain' => true])
@section('content')
    {{-- <div class="w-full px-4 py-4 text-lg font-bold text-center bg-sekunder text-kuartener">
        <span class="uppercase">Detail Outlet</span>
    </div> --}}
    <div class="flex flex-col w-full p-4 gap-y-8">
        <div class="flex flex-col gap-2 jenis-container">
            <div class="flex border-b-2 ">
                <span class="inline-block w-full font-semibold text-center text-slate-600">
                    INFO OUTLET
                </span>
                <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list" jenis="info_outlet"></i>
            </div>
            @include('dashboard.outlet.detail.info')
        </div>
        <div class="flex flex-col gap-2 jenis-container">
            <div class="flex border-b-2 ">
                <span class="inline-block w-full font-semibold text-center text-slate-600">
                    PRODUCTIVITY
                </span>
                <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list" jenis="productivity"></i>
            </div>
            @include('dashboard.outlet.detail.productivity')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".btn-toggle-list").click(function() {
                let jenis = $(this).attr('jenis');

                $(`.card-list[jenis="${jenis}"]`).toggle();

                if ($(this).hasClass('fa-square-minus')) {
                    $(this).removeClass('fa-square-minus').addClass('fa-square-plus');
                } else if ($(this).hasClass('fa-square-plus')) {
                    $(this).removeClass('fa-square-plus').addClass('fa-square-minus');
                }
            })
        })
    </script>
@endsection
