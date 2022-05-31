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
            $table->float('subtotal', 8, 2);
            $table->tinyInteger('taxes_percentage');
            $table->float('taxes', 8, 2);
            $table->tinyInteger('shiping');
            $table->float('total', 8, 2);
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
