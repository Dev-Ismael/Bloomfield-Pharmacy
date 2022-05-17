<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');	
            $table->string('img');	
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('additional_details')->nullable();
            $table->string('medicine')->nullable();
            $table->string('validation' , 1 )->default("1");  // not valid = 0 , pending = 1 , valid = 2  
            $table->string('schedule_orders' , 1 )->default("0");  // schedule = 0 , not schedule = 1 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
