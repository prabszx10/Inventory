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
        Schema::create('cashier_histories', function (Blueprint $table) {
            $table->string('cashier_history_id',16)->primary();
            $table->string('cashier_history_barang_id',16);
            $table->string('cashier_history_cashier_id',16);
            $table->string('cashier_history_jumlah',100);
            $table->string('cashier_history_satuan',100);
            $table->string('cashier_history_harga')->default('0');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('cashier_history_barang_id')->references('barang_id')->on('barangs')->onDelete('cascade');
            $table->foreign('cashier_history_cashier_id')->references('cashier_id')->on('cashiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_histories');
    }
};
