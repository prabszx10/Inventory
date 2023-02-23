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
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id',32)->primary();
            $table->string('user_username',100);
            $table->string('user_password',100);
            $table->string('user_email',100);
            $table->string('user_role_id',32)->nullable();
            $table->integer('user_status');
            $table->timestamp('user_create_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
