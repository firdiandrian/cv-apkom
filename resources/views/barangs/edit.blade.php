<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">Update Barang</h1>

    <form action="{{ route('barangs.update', $barang->ID) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="NamaBarang" class="block text-gray-700 text-sm font-bold mb-2">Name Barang</label>
            <input type="text" name="NamaBarang" id="NamaBarang" value="{{ old('NamaBarang', $barang->NamaBarang) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="Harga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
            <input type="text" name="Harga" id="Harga" value="{{ old('Harga', $barang->Harga) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="Stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
            <input type="text" name="Stok" id="Stok" value="{{ old('Stok', $barang->Stok) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            <a href="{{ route('barangs.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
        </div>
    </form>
</body>
</html>