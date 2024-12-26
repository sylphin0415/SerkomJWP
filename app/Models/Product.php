<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'idbarang';

    protected $fillable = [
        'namabarang',
        'hargajual',
        'hargabeli',
        'Satuan',
        'kategori',
        'stok'
    ];
    public function sales()
    {
        return $this->hasMany(Sale::class, 'idbarang');
    }
}
