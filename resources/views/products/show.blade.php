<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-gray-700 text-lg font-medium mb-2">Nama Produk: {{ $product->namabarang }}</p>
            <p class="text-gray-700 text-lg mb-2">Harga Jual: Rp. {{ number_format($product->hargajual, 0, ',', '.') }}</p>
            <p class="text-gray-700 text-lg mb-2">Harga Beli: Rp. {{ number_format($product->hargabeli, 0, ',', '.') }}</p>
            <p class="text-gray-700 text-lg mb-2">Harga Satuan: Rp. {{ number_format($product->Satuan, 0, ',', '.') }}</p>
            <p class="text-gray-700 text-lg mb-2">Kategori: {{ $product->hargajual }}</p>
            <p class="text-gray-700 text-lg mb-2">Stok: {{$product->stok}}</p>
            <div class="flex justify-end">
                <a href="{{ route('products.edit', $product->idbarang) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product->idbarang) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.07 7.25l3.5 3.5-3.5 3.5m0-6l3.5 3.5-3.5 3.5"/>
            </svg>
            Kembali
        </a>
    </div>
</x-app-layout>
