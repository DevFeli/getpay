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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');;
            $table->string('street')->nullable();
            $table->string('number', length:3)->nullable();
            $table->string('complement', length:10)->nullable();
            $table->string('neighborhood', length:45)->nullable();
            $table->string('city', length:45)->nullable();
            $table->string('state', length:2)->nullable();
            $table->string('zip_code', length:10)->nullable();
            $table->string('country', length:45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
