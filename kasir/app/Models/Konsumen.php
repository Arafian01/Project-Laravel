<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'konsumen',
        'status'
    ];

    protected $table = 'konsumen';

    public function KonsumenProduk(){
        return $this->hasMany(Konsumen::class, 'id_konsumen');
    }
}
