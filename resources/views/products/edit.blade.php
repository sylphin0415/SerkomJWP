<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="namabarang" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
                <input type="text" id="namabarang" name="namabarang" value="{{ $product->namabarang }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="hargajual" class="block text-gray-700 text-sm font-bold mb-2">Harga Jual</label>
                <input type="number" id="hargajual" name="hargajual" value="{{ $product->hargajual }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="hargabeli" class="block text-gray-700 text-sm font-bold mb-2">Harga Beli</label>
                <input type="number" id="hargabeli" name="hargabeli" value="{{ $product->hargabeli }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="satuan" class="block text-gray-700 text-sm font-bold mb-2">Satuan</label>
                <input type="text" id="satuan" name="satuan" value="{{ $product->Satuan }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ $product->kategori }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ $product->stok }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
