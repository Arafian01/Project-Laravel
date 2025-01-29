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
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom outlet_id dan menjadikannya foreign key
        $table->foreignId('id_outlet')->nullable()->constrained('outlet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus foreign key dan kolom outlet_id
        $table->dropForeign(['outlet_id']);
        $table->dropColumn('outlet_id');
        });
    }
};
