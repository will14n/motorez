@csrf()

<div class="grid gap-6 mb-6 md:grid-cols-2">
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
        <input
            type="text"
            name="brand"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('brand') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
        <input
            type="text"
            name="model"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('model') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ano</label>
        <input
            type="text"
            name="year"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('year') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Versão</label>
        <input
            type="text"
            name="version"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('version') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cor</label>
        <input
            type="text"
            name="color"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('color') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilometragem</label>
        <input
            type="number"
            name="kilometer"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('kilometer') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Combustível</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="fuel"
        >
            <option selected>Selecione o combustível</option>
            <option value="flex">Flex</option>
            <option value="alcohol">Alcool</option>
            <option value="gasoline">Gasolina</option>
            <option value="gnv">GNV</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cambio</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="transmission"
        >
            <option selected>Selecione a transmissão</option>
            <option value="automatic">Automático</option>
            <option value="manual">Manual</option>
        </select>
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portas</label>
        <input
            type="text"
            name="door"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('door') }}"
        >
    </div>
    <div class="mb-5">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preço</label>
        <input
            type="text"
            name="price"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('price') }}"
        >
    </div>
</div>
<div class="mb-5">
    <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opcionais</label>
    <select
        multiple
        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="optional"
    >
        @foreach ($optionals as $option)
            <option value="{{ $option->id }}">{{ $option->title }}</option>
        @endforeach
    </select>
</div>
<div class="mb-5 text-right">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
</div>
