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
        Schema::create('konsinyasi_produk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_konsinyasi');
            $table->string('id_produk');
            $table->integer('stok');
            $table->string('tgl_konsinyasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsinyasi_produk');
    }
};
