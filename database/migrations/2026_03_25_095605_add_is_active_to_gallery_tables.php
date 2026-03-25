<?php
// database/migrations/xxxx_xx_xx_add_is_active_to_gallery_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveToGalleryTables extends Migration
{
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });
        
        Schema::table('gallery_videos', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });
    }
    
    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
        
        Schema::table('gallery_videos', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}