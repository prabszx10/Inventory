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
        Schema::create('cashiers', function (Blueprint $table) {
            $table->string('cashier_id',16)->primary();
            $table->string('cashier_jumlah_item',100);
            $table->string('cashier_total',100);
            $table->string('cashier_diterima',100)->nullable();
            $table->string('cashier_dikembalikan',100)->nullable();
            $table->text('cashier_keterangan')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
