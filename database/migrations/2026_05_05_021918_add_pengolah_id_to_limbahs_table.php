<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('limbah', function (Blueprint $table) {
        $table->foreignId('pengolah_id')->nullable()->constrained('users')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('limbah', function (Blueprint $table) {
        $table->dropForeign(['pengolah_id']);
        $table->dropColumn('pengolah_id');
    });
}
};
