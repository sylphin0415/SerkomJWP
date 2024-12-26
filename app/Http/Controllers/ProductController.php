<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use LDAP\Result;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
    $search = $request->input('search');
    $results = Product::where('namabarang', 'LIKE', "%{$search}%")->get();
    return view('products.index', ['results' => $results]);
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'namabarang' => 'required|string|max:255',
        'hargajual' => 'required|numeric|min:0',
        'hargabeli' => 'required|numeric|min:0',
        'satuan' => 'required|string|max:10',
        'kategori' => 'required|string|max:50',
        'stok' => 'required|integer|min:0',
    ]);

    $product->update($request->all());

    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
