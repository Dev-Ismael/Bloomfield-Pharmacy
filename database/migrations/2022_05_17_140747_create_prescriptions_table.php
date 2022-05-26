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
            $table->string('age' , 55);
            $table->string('gender', 55);
            $table->string('additional_details' ,  1000 )->nullable();
            $table->string('medicine' , 1000 )->nullable();
            $table->string('validation' , 1 )->default("1");  // not valid = 0 , pending = 1 , valid = 2  
            $table->string('schedule_orders' , 1 )->default("0");  // not schedule = 0 ,  schedule = 1 
            $table->tinyInteger('scheduled_days')->nullable();  
            $table->timestamp('scheduled_start')->nullable();  
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
