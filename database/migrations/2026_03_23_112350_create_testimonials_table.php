<?php
// database/migrations/2024_01_01_000001_create_testimonials_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->text('review_text');
            $table->integer('rating')->default(5); // 1-5 stars
            $table->date('date')->nullable();
            $table->string('image')->nullable(); // Avatar/photo
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index(['is_active', 'order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}