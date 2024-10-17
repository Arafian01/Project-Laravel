<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk',
        'harga',
        'stok'
    ];

    protected $table = 'produk';

    public function konsinyasiProduk(){
        return $this->hasMany(Konsinyasi_Produk::class, 'id_produk');
    }
}
