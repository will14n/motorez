@extends('layout/structure')

@section('mainContent')
    <div class="py-10">
        <form action="{{ route('stock.index') }}" method="get" class="flex justify-center">
            <div class="flex justify-center w-full justify-between">
                <div class="inline-block w-full sm:flex items-center">
                    <div class=" mb-6 pr-4">
                        <label for="small-input" class="block text-sm font-medium text-gray-900 dark:text-white">Filtro:</label>
                        <input
                        type="text"
                        name="search"
                        class="block p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('search') }}"
                        >
                    </div>
                    <div class=" mb-6 pr-4">
                        <label for="small-input" class="block text-sm font-medium text-gray-900 dark:text-white">Ordenar por:</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="ordenation"
                        >
                            <option selected value="synced_at">Data Cadastro</option>
                            <option value="model">Modelo</option>
                            <option value="brand">Marca</option>
                            <option value="year">Ano</option>
                            <option value="fuel">Combustível</option>
                            <option value="price">Preço</option>
                            <option value="kilometer">Quilometragem</option>
                            <option value="supplier">Fornecedor</option>
                        </select>
                    </div>
                    <div class=" mb-6">
                        <label for="small-input" class="block text-sm font-medium text-gray-900 dark:text-white">Ordenar por:</label>
                        <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="sense"
                        >
                        <option selected value="asc">Crescente</option>
                        <option value="desc">Decrescente</option>
                    </select>
                </div>
            </div>
                <div class="flex">
                    <div class="my-6">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Pesquisar
                        </button>
                    </div>
                    <div class="my-6 pl-4">
                        <a
                            href="{{ route('stock.export') }}?{{ http_build_query($filters) }}"
                        >
                            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Exportar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <div class="mx-auto grid grid-cols-1 gap-x-8 gap-y-8 border-gray-200 lg:mx-0 lg:max-w-none md:grid-cols-4 xl:grid-cols-5">
            @foreach ($stocks->items() as $stock)
                <article class="flex bg-white p-4 max-w-xl flex-col items-start justify-between shadow-xl rounded-xl">
                    <div class="flex items-center gap-x-4 text-xs justify-between w-full">
                        <time datetime="2020-03-16" class="text-gray-500">{{ \Carbon\Carbon::parse($stock->synced_at)->format('d/m/Y h:i:s') }}</time>
                        <a href="#" class="relative z-10 rounded-full bg-gray-200 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $stock->supplier }}</a>
                    </div>
                    <div class="group relative w-full">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                {{ $stock->brand.' '.$stock->model.' '.$stock->year }}
                            </a>
                        </h3>
                        <div class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 grid grid-cols-2">
                            <div class="flex">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2"/>
                                </svg>
                                <p>
                                    {{ $stock->version }}
                                </p>
                            </div>
                            <div class="flex">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7h.01m3.486 1.513h.01m-6.978 0h.01M6.99 12H7m9 4h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 3.043 12.89 9.1 9.1 0 0 0 8.2 20.1a8.62 8.62 0 0 0 3.769.9 2.013 2.013 0 0 0 2.03-2v-.857A2.036 2.036 0 0 1 16 16Z"/>
                                </svg>
                                <p>
                                    {{ $stock->color }}
                                </p>
                            </div>
                            <div class="flex">
                                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADnUlEQVR4nO2ZSWhUQRCGv0hM9GDALV5UFEU8uEUFwQUVowcR3BDc8KDE4EW8CaIg7ooeBEHxJl7Ek/uK4oKgeHDBfV9iCF70IIlrlJK/oZmZ997Mm8nMKO+HBzNd1dXVr6v/qpqBBAkSJEjwj6MHMAvYBJwD7gMfgDbgK9AMPABOSmc20I0yQTWwEDgBfAN+5/i0ae4ioLIUG6gCVgHvPae+A5eBLcAcYARQ68nt8zDJNkv3hyd/DawGuhRrE9O1qHPgLtAA9AzQd3pB4dggG07vCTCpA/2nK7AXaPcWNScqIuaFbcRhEPDT07U19unkC4rewG0vrt0bPJrF3Gw2ckQ6h4C1Igf7fjXkpHNGfx23GX4G1AH9gC8aq4+Yfx24FiIfqxNolV10v17J/gtvPK+TeCmDdiK9PNlajT/OMwTOys7OlHEjh5uSPcrnZKr1Ns3QLaAmRV6lTZh8TNxFgPPAG6B7BlmNF9I35VPO2O/RYp8AnYHKAVEXPgwVETmkF/BcvuzJ1fhkxa0luVGUHnUimV/AtGwnWUJ6qjewjvJAP48pX2V7J9d4lGl02JfSoUqk4hjSPY1REzsDb6XsElSrGCXTZexIDPTIxOWslfr8LuriL5GiVamDlahcJn9T5MJukUfv9R4x3NP4grDJp6RkBaGfsM6oNM+HnaJgtpcBl4Bx+j4mw31olI/HggzVqDT4mZL4ioHRwA0vjJZHJOkfYtSM4T7Xq2+KBcvWB0SrtrY1X0uzOPkr0p+ZSbhFQusVOhqdFEYfvV7GKuvU6iEI2zVvYybhaQmt8elITATueGFkJcrQHG3M1VzzOQ0PJRxeGH//XtKdCpcWfT7sseBrORQ30/8Wg6WhWcJCXfQdAX16q0LCGrW4qJWtpkzCtoCFrQKOgw+aP17h5O7CgBi2rgf49jWXjVzLcyMT9AS+wUJvpFlC4+lCwDGL/2wtkO1aj64DL/vIAl727TqZJm2iUD8m1HmlVBouSBiXSYqJ+fLVyqY0bAvoncsRu+WrJfE0zPN643LHrbDoccVYe0yKLGaf0i4qD8x5rkxZnzI+SqV9MfuRzloz9TeDDfLRWo7IxqpFmddo7qBXnU6JwfVhT1iynSqdX/KhVj61aHxx2EaqvVb3OPBJn6323xVxInE2EpZsK7Wm+7vis3xy3Wokla9IWczCbQilwxAv5N1jPkaiUs2V5ZUZlA9mABflW0n+FEqQIEGCBP8v/gBLQFl3FbCIUwAAAABJRU5ErkJggg==">
                                <p>
                                    {{ number_format($stock->kilometer, null, ',', '.') }}
                                </p>
                            </div>
                            <div class="flex">
                                <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACTElEQVR4nO2XwWoUQRCGPxZiWDB60UXUB4gXzSsoJKdAFK/GFzDJi+SkEfMG6jN4NBDJKRqU1Q0GctPNLcklgWSk5R8YhpnZ3p3utUb2h4Lt3uqq+baqp3uhXHPAe+A3kESwX8A74AERtQycRwLI2xnwLAbEnCAugTfALNAKnKOluJvK42DuB87xt50SQYxDm8r3NnTgdE+4X8ypDWwAR4Fa6UjxXFyne5k9E1SXCpy20+tIe+OV4rc0dnlTvQBu1QVJE6XqazxPGC0oXr8k54o+d+vC5EHy4xCqytEBvmr8A7gdI0koDcrRCQFjASQIjBWQ2jCWQGrBWANBb69k2LeZRRByZ5BXZayDdH0rYx2k47tnrIOgSqSV+QZcZ4grirtajOOKUqa8j4PpaW7dZ8HGEBfBYexlRc4iFfk80tyhz4K2bqppZepaX/HaAUCmNHfhuyC2fHJeyGfKd61VkEP5PGw6yLp8ernzo3Eg1/SqzR+GjQOh5DA0CbINrALTFb7Zw7BrFSSRfQHueMKYBHkO7GdgfCtjDsTpBvBd4zWqlf2fYg7E6anGOwyWaZCbGp+OsHbwFxFVlDPxfI4JSAxNKsKktcbXWieauzrgIul8jn2DxlZRzh3NLVaseyKfT75BY6so55rm9oCZkmocyGfFN2hsFeWcBj5r/iewJCBnjzMQu8AV36CxVZbzbgamyHarbsmWQNLKrGofnMi21U6FlbAKMrIaD/KhohfHaVt1QRJD1riWivIMyf8Gkhgw6shtsn8N4OzjKE//B6DqkMWbAKqTAAAAAElFTkSuQmCC">
                                <p>
                                    {{ $stock->fuel }}
                                </p>
                            </div>
                            <div class="flex">
                                <img class="w-6 h-6" src="data:image/png;base64,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">
                                <p>
                                    {{ $stock->transmission }}
                                </p>
                            </div>
                            @if (isset($stock->door))
                                <div class="flex">
                                    <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAANElEQVR4nGNgGAVkgv9k4sFnAbFg1AKCYDSICAbJ0LMAHYxaQBCMoCD6TyU8cBaMAgZ0AADDynuFUQjdPwAAAABJRU5ErkJggg==">
                                    <p>
                                        {{ $stock->door }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <p>
                        <b>R$ {{ number_format($stock->price, 2, ',', '.') }}</b>
                    </p>
                </article>
            @endforeach
        </div>
        <x-pagination
            :paginator="$stocks"
            :appends="$filters"
        />
    </div>
@endsection
