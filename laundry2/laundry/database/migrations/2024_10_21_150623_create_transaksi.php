<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_outlet')->constrained('outlet')->onDelete('cascade');
            $table->string('kode_invoice');
            $table->foreignId('id_member')->constrained('member')->onDelete('cascade');
            $table->date('tanggal');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar');
            $table->integer('biaya_tambahan');
            $table->integer('diskon');
            $table->integer('pajak');
            $table->enum('status',['baru','proses','selesai','diambil']);
            $table->enum('dibayar',['dibayar','belum dibayar']);
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
