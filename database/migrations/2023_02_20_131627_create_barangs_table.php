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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('barang_id',32)->primary();
            $table->string('barang_nama',100);
            $table->text('barang_keterangan');
            $table->double('barang_stock');
            $table->string('barang_satuan',50);
            $table->string('barang_file',100)->nullable();
            $table->integer('barang_status')->default('1');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
