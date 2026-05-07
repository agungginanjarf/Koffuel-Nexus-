<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('transaksis', function (Blueprint $table) {
        $table->foreignId('user_id')->after('id');
        $table->foreignId('briket_id')->after('user_id');
        $table->foreignId('pengolah_id')->after('briket_id');
        $table->string('status')->default('pending')->after('jumlah');
    });
}

public function down()
{
    Schema::table('transaksis', function (Blueprint $table) {
        $table->dropColumn(['user_id', 'briket_id', 'pengolah_id', 'status']);
    });
}

   
};
