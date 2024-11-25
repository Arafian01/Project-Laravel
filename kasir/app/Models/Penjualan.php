<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_penjualan',
        'tgl_penjualan',
        'id_konsumen',
        'status_pembelian',
        'id_user'
    ];

    protected $table = 'penjualan';

    public function konsumen(){
        return $this->belongsTo(Konsumen::class, 'id_konsumen', 'id');
    }
}
