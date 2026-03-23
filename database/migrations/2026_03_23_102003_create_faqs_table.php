<?php
// database/migrations/2024_01_01_000000_create_faqs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->enum('side', ['left', 'right'])->default('left');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Index for faster queries
            $table->index(['side', 'is_active', 'order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}