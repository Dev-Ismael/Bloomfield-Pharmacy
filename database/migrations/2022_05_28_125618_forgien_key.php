<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForgienKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ################ Subcategories ###################
        Schema::table('subcategories', function (Blueprint $table) {
            $table->foreign("category_id")
            ->references('id')
            ->on("categories")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
        ################ products ###################
        Schema::table('products', function (Blueprint $table) {
            $table->foreign("subcategories_id")
            ->references('id')
            ->on("subcategories")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
