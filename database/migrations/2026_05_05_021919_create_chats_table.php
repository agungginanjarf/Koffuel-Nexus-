<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up()
{
    Schema::create('chats', function (Blueprint $table) {
        $table->id();
        $table->foreignId('limbah_id')->constrained('limbah')->onDelete('cascade');
        
        $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
        $table->text('message');
        $table->timestamps();
    });
}
   
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
