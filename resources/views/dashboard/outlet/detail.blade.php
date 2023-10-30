@extends('layouts.dashboard.app', ['plain' => true])
@section('content')
    <div class="w-full px-4 py-4 text-lg font-bold text-center bg-sekunder text-kuartener">
        <span class="uppercase">PERFORMANCE RS <br> PRODUCTIVITY & AGGRESSIVITY</span>
    </div>
    <div class="flex w-full px-2 my-2 gap-x-2">
        <div class="flex w-1/2 p-1 text-sm text-white bg-gray-500 rounded-sm">
            <span class="inline-block w-1/2 text-center uppercase border-r border-x-white">ID Outlet</span>
            <span class="inline-block w-1/2 text-center uppercase border-l border-x-white">{{ $detail->id_outlet }}</span>
        </div>
        <div class="flex w-1/2 p-1 text-sm text-white bg-gray-500 rounded-sm">
            <span class="inline-block w-1/2 text-center uppercase border-r border-x-white">Date</span>
            <span
                class="inline-block w-1/2 text-center uppercase border-l border-x-white">{{ date('d M', strtotime($end_date)) }}</span>
        </div>
    </div>
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
                    RS PRODUCTIVITY
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
