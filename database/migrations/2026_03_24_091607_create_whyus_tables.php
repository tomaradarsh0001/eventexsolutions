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
        // Main table
        Schema::create('why_us', function (Blueprint $table) {
            $table->id();
            $table->text('whyus_paragraph');
            $table->timestamps();
        });

        // Items table
        Schema::create('why_us_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('why_us_id')->constrained('why_us')->onDelete('cascade');
            $table->string('icon'); // lni-heart
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_us_items');
        Schema::dropIfExists('why_us');
    }
};
