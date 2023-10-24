<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-premier md:block">
    <div class="py-4 text-gray-500 ">
        <a class="ml-6 text-lg font-bold text-tersier " href="{{ URL::to('/') }}">
            Dashboard ORMAS
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (!isset($menu))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200 "
                    href="{{ URL::to('/') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'user')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200"
                    href="{{ route('user.index') }}">
                    <i class="w-5 fa-solid fa-user-group"></i>
                    <span class="ml-4">User</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'qns')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200"
                    href="{{ route('qns.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">QNS</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'outlet')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <button
                    class="inline-flex items-center justify-between w-full  text-tersier hover:text-gray-800 text-sm font-semibold transition-colors duration-150 "
                    @click="togglePagesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <i class="fa-solid fa-shop"></i>
                        <span class="ml-4">Outlet</span>
                    </span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-white hover:text-gray-100 rounded-md shadow-inner bg-red-900 "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('outlet.index') }}">List Outlet</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('target.index') }}">Target</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('result.index') }}">Hasil</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('fm.index') }}">FM</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  border-white">
                            <a class="w-full" href="{{ route('outlet.index') }}">Detail Outlet</a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-premier md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 ">
        <a class="ml-6 text-lg font-bold text-tersier " href="{{ URL::to('/') }}">
            Dashboard
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (!isset($menu))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200 "
                    href="{{ URL::to('/') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'user')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200"
                    href="{{ route('user.index') }}">
                    <i class="w-5 fa-solid fa-user-group"></i>
                    <span class="ml-4">User</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'qns')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-tersier hover:text-gray-800 -200"
                    href="{{ route('qns.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">QNS</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (isset($menu) && $menu == 'outlet')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-tersier"
                        aria-hidden="true"></span>
                @endif
                <button
                    class="inline-flex items-center justify-between w-full  text-tersier hover:text-gray-800 text-sm font-semibold transition-colors duration-150 "
                    @click="togglePagesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <i class="fa-solid fa-shop"></i>
                        <span class="ml-4">Outlet</span>
                    </span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-white hover:text-gray-100 rounded-md shadow-inner bg-red-900 "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('outlet.index') }}">List Outlet</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('target.index') }}">Target</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('result.index') }}">Hasil</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 border-b border-white">
                            <a class="w-full" href="{{ route('fm.index') }}">FM</a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
