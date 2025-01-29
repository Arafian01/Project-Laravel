<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'tanggal',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'id_user',
        'total_bayar'
    ];

    protected $table = 'transaksi';

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_invoice', 'desc')->value('kode_invoice');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'T' . $formattedCodeNumber;
    }

}
