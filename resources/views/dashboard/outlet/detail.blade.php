@php
    function mom($mtd, $m1)
    {
        if ($m1) {
            $mom = round(($mtd / $m1 - 1) * 100, 2);
        } else {
            $mom = 100;
        }

        return $mom;
    }

    function gap($mtd, $m1)
    {
        $gap = $mtd - $m1;
        $format = number_format($gap, 0, ',', '.');

        $text = $gap >= 0 ? $format : '(' . abs($format) . ')';

        return $text;
    }
@endphp
@extends('layouts.dashboard.app', ['plain' => true])
@section('content')
    <div class="w-full px-4 py-4 text-lg font-bold text-center bg-sekunder text-kuartener">
        <span class="uppercase">PERFORMANCE RS <br> PRODUCTIVITY & AGGRESSIVITY</span>
    </div>
    @if ($outlet)
        <div class="flex w-full px-2 my-2 gap-x-2">
            <div class="flex p-2 text-sm text-white bg-gray-500 rounded-sm gap-x-2 w-fit">
                <span class="inline-block w-full text-center uppercase whitespace-nowrap ">ID
                    Outlet</span>
                <span class="inline-block w-full text-center uppercase whitespace-nowrap ">|</span>
                <span class="inline-block w-full text-center uppercase whitespace-nowrap ">{{ $outlet->id_outlet }}</span>
            </div>
            <div class="flex p-2 text-sm text-white bg-gray-500 rounded-sm gap-x-2 w-fit">
                <span class="inline-block w-full text-center uppercase whitespace-nowrap ">Date</span>
                <span class="inline-block w-full text-center uppercase whitespace-nowrap ">|</span>
                <span
                    class="inline-block w-full text-center uppercase whitespace-nowrap ">{{ date('d M', strtotime($date)) }}</span>
            </div>
        </div>
        <div class="flex flex-col flex-grow p-4 w-fit gap-y-8">
            <div class="flex flex-col gap-2 jenis-container">
                <div class="flex border-b-2 ">
                    <span class="inline-block pr-4 font-semibold text-center w-fit whitespace-nowrap text-slate-600">
                        INFO OUTLET
                    </span>
                    <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list"
                        jenis="info_outlet"></i>
                </div>
                @include('dashboard.outlet.detail.info')
            </div>
            <div class="flex w-full -my-4 ">
                <div class="flex p-2 text-sm text-gray-500 bg-gray-200 rounded-sm gap-x-2 w-fit">
                    <span class="inline-block w-full text-center uppercase whitespace-nowrap ">Last Update</span>
                    <span class="inline-block w-full text-center uppercase whitespace-nowrap ">:</span>
                    <span class="inline-block w-full text-center uppercase whitespace-nowrap ">{{ $outlet->date }}</span>
                </div>
            </div>
            <div class="flex flex-col gap-2 jenis-container">
                <div class="flex border-b-2 ">
                    <span class="inline-block pr-4 font-semibold text-center w-fit whitespace-nowrap text-slate-600">
                        RS PRODUCTIVITY
                    </span>
                    <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list"
                        jenis="productivity"></i>
                </div>
                @include('dashboard.outlet.detail.productivity')
            </div>
            <div class="flex flex-col gap-2 jenis-container">
                <div class="flex border-b-2 ">
                    <span class="inline-block pr-4 font-semibold text-center w-fit whitespace-nowrap text-slate-600">
                        RS AGGRESSIVITY
                    </span>
                    <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list"
                        jenis="aggressivity"></i>
                </div>
                @include('dashboard.outlet.detail.aggressivity')
            </div>
            <div class="flex flex-col gap-2 jenis-container">
                <div class="flex border-b-2 ">
                    <span class="inline-block pr-4 font-semibold text-center w-fit whitespace-nowrap text-slate-600">
                        OMZET
                    </span>
                    <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list" jenis="omzet"></i>
                </div>
                @include('dashboard.outlet.detail.omzet')
            </div>
            <div class="flex flex-col gap-2 jenis-container">
                <div class="flex border-b-2 ">
                    <span class="inline-block pr-4 font-semibold text-center w-fit whitespace-nowrap text-slate-600">
                        PROGRAM TERDAFTAR (WHITELISTED)
                    </span>
                    <i class="ml-auto text-lg cursor-pointer fa-solid fa-square-minus btn-toggle-list"
                        jenis="whitelist"></i>
                </div>
                @include('dashboard.outlet.detail.whitelist')
            </div>
        </div>
    @endif
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
