<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained('add_buses')->onDelete('cascade'); 
            $table->date('available_date');  
            $table->time('departure_time'); 
            $table->string('status')->default('active');  
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
