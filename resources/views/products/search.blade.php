<form action="{{ route('products.search') }}" method="GET" class="flex flex-col md:flex-row md:w-full mt-4">
    <input type="text" name="search" placeholder="Search Products" class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-1/2">
    <button type="submit" class="mt-2 md:ml-2 bg-cyan-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded-md">Search</button>
    @if ($results->isEmpty())
        <p>No products found.</p>
    @else
        <ul>
            @foreach ($results as $product)
                <li>{{ $product->namabarang }}</li>
            @endforeach
        </ul>
    @endif
</form>
