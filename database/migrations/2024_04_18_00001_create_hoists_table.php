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
        Schema::create('hoists', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('plate'); 
            $table->string('visible')->nullable(); 
            $table->string('slug', 64); 
            $table->string('type', 32); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoists');
    }
};
