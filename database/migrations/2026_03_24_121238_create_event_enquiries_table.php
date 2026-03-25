<?php
// database/migrations/2024_01_01_000000_create_event_enquiries_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('event_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('purpose');
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'contacted', 'completed'])->default('pending');
            $table->boolean('is_read')->default(false);
            $table->timestamp('contacted_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_enquiries');
    }
}