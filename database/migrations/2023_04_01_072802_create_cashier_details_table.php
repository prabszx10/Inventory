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
        Schema::create('cashier_details', function (Blueprint $table) {
            $table->string('cashier_detail_id',16)->primary();
            $table->string('cashier_detail_cashier_id',16);
            $table->string('cashier_detail_barang_id',16);
            $table->string('cashier_detail_jumlah',16);
            $table->string('cashier_detail_satuan',16);
            $table->string('cashier_detail_harga_total',16);
            $table->string('cashier_detail_harga_satuan',16);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_details');
    }
};
