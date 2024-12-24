<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tansaksi',
        'id_paket',
        'qty',
        'keterangan'
    ];

    protected $table = 'detail_transaksi';
}
