<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import for custom validation rules
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all(); // Fetch all products

        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_faktur' => 'required|date',
            'no_faktur' => 'required',
            'nama_konsumen' => 'required',
            'idbarang' => 'required|exists:products,idbarang', // Ensure product exists
            'jumlah' => 'required|integer|min:1',
            'diskon' => 'required|numeric|between:0,100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $sale = new Sale;
        $sale->fill($request->except('harga_total'));

        // Ensure product is retrieved for accurate pricing calculation
        $product = Product::find($request->idbarang);
        if (!$product) {
            return redirect()->back()->withErrors(['idbarang' => 'Produk tidak ditemukan']);
        }

        // Calculate harga_total using getHargaTotalAttribute() or custom logic
        $sale->harga_total = $sale->getHargaTotalAttribute($product->Satuan, $request->jumlah, $request->diskon);

        $sale->save();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
{
    $products = Product::all();
    return view('sales.edit', compact('sale', 'products'));
}

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'tgl_faktur' => 'required|date',
            'nama_konsumen' => 'required',
            'idbarang' => 'required|exists:products,idbarang',
            'jumlah' => 'required|integer|min:1',
            'diskon' => 'required|numeric|between:0,100',
        ]);


        $sale->update($request->all());
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui.');
        
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
