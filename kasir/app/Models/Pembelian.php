<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pembelian',
        'tgl_pembelian',
        'id_supplier',
        'id_user'
    ];

    protected $table = 'pembelian';

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }
}
