<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cart' , 1000 );
            $table->string('address' , 255 );
            $table->string('phone' , 55 );
            $table->smallInteger('subtotal');
            $table->smallInteger('taxes_percentage');
            $table->smallInteger('taxes');
            $table->smallInteger('shiping');
            $table->smallInteger('total');
            $table->string('status' , 1 )->default('1'); // 1 => Processed ; 2 => Shipped ; 3 => Arrived
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
        Schema::dropIfExists('orders');
    }
}
