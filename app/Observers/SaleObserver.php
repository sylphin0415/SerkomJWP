<?php

namespace App\Observers;
use App\Models\Sale;

class SaleObserver
{
    public function updated(Sale $sale)
    {
        // Logika untuk menghitung harga total
        $sale->harga_total = $sale->product->hargajual * $sale->jumlah * (1 - $sale->diskon / 100);
        $sale->save();
    }
}
