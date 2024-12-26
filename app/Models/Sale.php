<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = 'idsales';
    
    protected $fillable = [
        'tgl_faktur',
        'no_faktur',
        'nama_konsumen',
        'idbarang',
        'jumlah',
        'diskon', // Simpan diskon sebagai persentase (0-1) atau nilai absolut
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idbarang');
    }

    public function setHargaTotalAttribute($value)
    {
        // Kosongkan karena perhitungan dilakukan di getHargaTotalAttribute
    }
    public function getHargaTotalAttribute()
    {
        $harga_produk = $this->product->Satuan;
        $diskon = $this->diskon / 100; // Konversi diskon ke desimal
        $harga_total = $harga_produk * $this->jumlah * (1 - $diskon);
        return $harga_total;
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $sale->harga_total = $sale->product->harga * $sale->jumlah * (1 - $sale->diskon / 100);
        });
    }
}
