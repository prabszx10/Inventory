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
        Schema::create('history_barangs', function (Blueprint $table) {
            $table->string('history_barang_id',32)->primary();
            $table->string('history_barang_barang_id',32);
            $table->double('history_barang_stock');
            $table->string('history_barang_status',50);
            $table->date('history_barang_tanggal');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('history_barang_barang_id')->references('barang_id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_barangs');
    }
};
