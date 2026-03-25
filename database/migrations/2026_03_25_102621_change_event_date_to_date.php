<?php
// database/migrations/xxxx_xx_xx_change_event_date_to_date.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEventDateToDate extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_date')->nullable()->change();
        });
    }
}