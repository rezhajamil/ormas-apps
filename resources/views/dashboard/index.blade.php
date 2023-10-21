@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                    <i class="w-5 h-5 fa-solid fa-user-group"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Total User Admin
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        {{ $admin_users }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
                <div class="p-3 mr-4 rounded-full text-emerald-500 bg-emerald-100 ">
                    <i class="w-5 h-5 fa-solid fa-user-group"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Total User Sales Force
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        {{ $sf_users }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
