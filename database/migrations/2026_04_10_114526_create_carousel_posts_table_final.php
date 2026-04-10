<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop the table if it exists to start fresh
        Schema::dropIfExists('carousel_posts');
        
        // Create the table
        Schema::create('carousel_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->boolean('status')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            
            // Add indexes
            $table->index('status');
            $table->index('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carousel_posts');
    }
};