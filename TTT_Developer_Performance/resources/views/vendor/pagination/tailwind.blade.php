@if ($paginator->hasPages())
    <nav class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            {{-- First Page Link --}}
            <li>
                <a href="{{ $paginator->url(1) }}"
                   class="px-4 py-2 ml-0 leading-tight text-white bg-[#00408e] border border-gray-300 rounded-l-lg hover:bg-blue-900">
                    First
                </a>
            </li>

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 leading-tight text-gray-400 bg-white border border-gray-300 cursor-not-allowed">‹</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-4 py-2 leading-tight text-blue-800 bg-white border border-gray-300 hover:bg-blue-100">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 leading-tight text-white bg-blue-500 border border-gray-300">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-4 py-2 leading-tight text-blue-800 bg-white border border-gray-300 hover:bg-blue-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-4 py-2 leading-tight text-blue-800 bg-white border border-gray-300 hover:bg-blue-100">
                        ›
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 leading-tight text-gray-400 bg-white border border-gray-300 cursor-not-allowed">›</span>
                </li>
            @endif

            {{-- Last Page Link --}}
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}"
                   class="px-4 py-2 leading-tight text-white bg-[#00408e] border border-gray-300 rounded-r-lg hover:bg-blue-900">
                    Last
                </a>
            </li>
        </ul>
    </nav>
@endif
