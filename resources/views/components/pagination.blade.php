<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
    <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
            @if (!$data->onFirstPage())
                <li>
                    <a href="{{ $data->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-premier"
                        aria-label="Previous">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            @endif
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                @if ($data->currentPage() - 2 <= $i && $i <= $data->currentPage() + 2)
                    <li>
                        <a href="{{ $data->url($i) }}"
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-premier {{ $i == $data->currentPage() ? 'bg-premier border-premier text-white transition-colors duration-150 border border-r-0' : '' }}">
                            {{ $i }}
                        </a>
                    </li>
                @else
                    @if ($i <= 3)
                        <li>
                            <a href="{{ $data->url($i) }}"
                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-premier {{ $i == $data->currentPage() ? 'bg-premier border-premier text-white transition-colors duration-150 border border-r-0' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                        @if ($i == 3)
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                        @endif
                    @else
                        @if ($data->lastPage() - 3 <= $i)
                            @if ($i == $data->lastPage() - 3)
                                <li>
                                    <span class="px-3 py-1">...</span>
                                </li>
                            @endif
                            <li>
                                <a href="{{ $data->url($i) }}"
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-premier {{ $i == $data->currentPage() ? 'bg-premier border-premier text-white transition-colors duration-150 border border-r-0' : '' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endif
                    @endif
                @endif
            @endfor
            @if (!$data->onLastPage())
                <li>
                    <a href="{{ $data->nextPageUrl() }}"
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-premier"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</span>
