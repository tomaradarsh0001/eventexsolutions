<?php
// database/migrations/2024_01_01_000003_create_gallery_videos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryVideosTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->string('title')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallery_videos');
    }
}