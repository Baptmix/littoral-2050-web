<div
    class="flex py-3 px-5 text-gray-700 bg-gray-50 border border-gray-200 dark:bg-gray-800 dark:border-gray-700 justify-between">
    @unless ($breadcrumbs->isEmpty())
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">

                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && $loop->first)
                        <li class="inline-flex items-center">
                            <a href="{{ $breadcrumb->url }}"
                               class="inline-flex items-center text-sm text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                {{ $breadcrumb->title }}
                            </a>
                        </li>
                    @endif

                    @if (!is_null($breadcrumb->url) && !$loop->last && !$loop->first)
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <a href="#"
                                   class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $breadcrumb->title }}</a>
                            </div>
                        </li>
                    @elseif (!is_null($breadcrumb->url) && $loop->last && !$loop->first)
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span
                                    class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $breadcrumb->title }}</span>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
        <nav>
            @if(\Request::route()->getName() != "list")
            <button onclick="window.location.href = '{{ url()->previous() }}';" class="flex flex-row bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg> Retour
            </button>
            @endif
        </nav>
    @endunless
</div>
