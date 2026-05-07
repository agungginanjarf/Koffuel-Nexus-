<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
           
    Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('briket_id');
            $table->foreignId('pengolah_id');
            $table->string('status')->default('pending'); // pending / terjual
            $table->timestamps();
            $table->integer('jumlah');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
