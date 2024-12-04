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

      Schema::create('calls', function (Blueprint $table) {
          $table->id();
          $table->foreignId('customer_id')->constrained()->onDelete('cascade');
          $table->foreignId('agent_id')->constrained()->onDelete('cascade');
          $table->integer('duration'); // in seconds
          $table->timestamp('call_time');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};