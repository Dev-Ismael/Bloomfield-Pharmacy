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
            $table->foreign("subcategory_id")
            ->references('id')
            ->on("subcategories")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        ################ prescriptions ###################
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        ################ Wishlists ###################
        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign("product_id")
            ->references('id')
            ->on("products")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        ################ Carts ###################
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign("product_id")
            ->references('id')
            ->on("products")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        ################ Orders ###################
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        ################ Prescription_Orders ###################
        Schema::table('prescription_orders', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        Schema::table('prescription_orders', function (Blueprint $table) {
            $table->foreign("prescription_id")
            ->references('id')
            ->on("prescriptions")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        // ################ notifications ###################
        // Schema::table('notifications', function (Blueprint $table) {
        //     $table->foreign("user_id")
        //     ->references('id')
        //     ->on("users")
        //     ->onDelete("cascade")
        //     ->onUpdate("cascade");
        // });

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
