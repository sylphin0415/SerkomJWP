<link rel="stylesheet" href=".boostrap.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
        <form id="searchForm" class="flex items-center">
            <input type="text" name="search" placeholder="Cari produk"
                class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 w-full">
            <button type="submit"
                    class="ml-3 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-md">
                Cari
            </button>
        </form>
        <div id="searchResults"></div>
        <script>
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('products.search') }}",
                data: $(this).serialize(),
                success: function(response) {
                    console.log("Search results:", response); // Log the response for debugging
                    $('#searchResults').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown); // Log errors
                }
            });
        });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('products.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-semibold rounded-md">
                            Tambah Produk
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Barang</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Jual</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Beli</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Satuan</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->idbarang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->namabarang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->hargajual }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->hargabeli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->Satuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->stok }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('products.show', $product->idbarang) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                            <a href="{{ route('products.edit', $product->idbarang) }}" class="text-indigo-600 hover:text-indigo-900 ml-2">Edit</a>
                                            <form action="{{ route('products.destroy', $product->idbarang) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
