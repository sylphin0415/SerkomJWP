@component('layouts.app')
<div class="container mx-auto py-4">
  <div class="card max-w-2xl mx-auto shadow-sm sm:rounded-lg">
    <div class="card-header text-xl font-semibold bg-gray-200 text-gray-800 p-4">
      {{ __('Tambah Produk') }}
    </div>

    <div class="card-body p-6">
      <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="mb-4">
            <label for="namabarang" class="block text-sm font-medium text-gray-700">{{ __('Nama Produk') }}</label>
            <input type="text" id="namabarang" class="form-input w-full @error('namabarang') border-red-500 @enderror" name="namabarang" value="{{ old('namabarang') }}" required autocomplete="namabarang" autofocus>
            @error('namabarang')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="hargajual" class="block text-sm font-medium text-gray-700">{{ __('Harga Jual') }}</label>
            <input type="number" step="0.01" id="hargajual" class="form-input w-full @error('hargajual') border-red-500 @enderror" name="hargajual" required>
            @error('hargajual')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="hargabeli" class="block text-sm font-medium text-gray-700">{{ __('Harga Beli') }}</label>
            <input type="number" step="0.01" id="hargabeli" class="form-input w-full @error('hargabeli') border-red-500 @enderror" name="hargabeli" required>
            @error('hargabeli')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="satuan" class="block text-sm font-medium text-gray-700">{{ __('Satuan') }}</label>
            <input type="text" id="Satuan" class="form-input w-full @error('satuan') border-red-500 @enderror" name="Satuan" required>
            @error('Satuan')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="kategori" class="block text-sm font-medium text-gray-700">{{ __('Kategori') }}</label>
            <input type="text" id="kategori" class="form-input w-full @error('kategori') border-red-500 @enderror" name="kategori" required>
            @error('kategori')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700">{{ __('Stok') }}</label>
            <input type="number" id="stok" class="form-input w-full @error('stok') border-red-500 @enderror" name="stok" required>
            @error('stok')
              <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Simpan') }}
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcomponent
