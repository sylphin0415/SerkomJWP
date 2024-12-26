<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Penjualan</h1>

        <form method="POST" action="{{ route('sales.update', $sale) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_konsumen" class="block text-gray-700 text-sm font-bold mb-2">Nama Pelanggan</label>
                <input type="text" id="nama_konsumen" name="nama_konsumen" value="{{ $sale->nama_konsumen }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tgl_faktur" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Faktur</label>
                <input type="date" id="tgl_faktur" name="tgl_faktur" value="{{ $sale->tgl_faktur }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="idbarang" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
                <select name="idbarang" id="idbarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Produk</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->idbarang }}" {{ $product->idbarang == $sale->idbarang ? 'selected' : '' }}>{{ $product->namabarang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ $sale->jumlah }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="diskon" class="block text-gray-700 text-sm font-bold mb-2">Diskon (%)</label>
                <input type="number" id="diskon" name="diskon" value="{{ $sale->diskon }}"
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
