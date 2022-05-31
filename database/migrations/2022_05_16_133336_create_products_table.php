<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id');	
            $table->string('title' , 55)->index();
            $table->string('slug');
            $table->string('img')->default("product.png");
            $table->float('price', 8, 2);
            $table->tinyInteger('quantity');
            $table->string('has_offer' , 1 )->default("0");  // 0 ==> Not Has offer ; 1 ==> Has Offer ; 
            $table->tinyInteger('offer_percentage')->nullable();
            $table->float('final_price', 8, 2);
            $table->string('brand' , 55);
            $table->string('measurement' , 55);
            $table->string('description', 1000);
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
        Schema::dropIfExists('products');
    }
}
