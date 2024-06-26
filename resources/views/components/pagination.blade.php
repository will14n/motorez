@if (isset($paginator))
    @php
        $queryParams = (isset($appends) && gettype($appends) === 'array') ? '&'.http_build_query($appends) : '';
    @endphp
    <nav aria-label="Page navigation example" class="flex justify-center mt-6">
            <ul class="flex items-center -space-x-px h-10 text-base">
                <li>
                    <a href="?page={{ $paginator->previousPage() <= 1 ? 1 : $paginator->previousPage() }}{{ $queryParams }}" class="flex disabled items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if ($i == $paginator->currentPage())
                        @php
                            $classCss = 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-white';
                        @endphp
                        {{-- <li class="page-item disabled" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li> --}}
                    @else
                        @php
                            $classCss = 'leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white';
                        @endphp
                        {{-- <li class="page-item">
                            <a class="page-link" href="?page={{ $i }}{{ $queryParams }}">{{ $i }}</a>
                        </li> --}}
                    @endif
                    <li>
                        <a href="?page={{ $i }}{{ $queryParams }}" class="flex items-center justify-center px-4 h-10 border border-gray-300 dark:border-gray-700 {{ $classCss }}">{{ $i }}</a>
                    </li>
                @endfor

                <li>
                    <a href="?page={{ $paginator->nextPage() >= $paginator->lastPage() ? $paginator->lastPage() : $paginator->nextPage() }}{{ $queryParams }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </li>
            </ul>
    </nav>
@endif
