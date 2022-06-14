<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('first_name' , 55)->nullable();
            $table->string('last_name' , 55)->nullable();
            $table->string('email' , 55)->unique();
            $table->string('email_2' , 55)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone' , 100 )->default('[]'); // default ==> empty array
            $table->string('state' , 55 )->nullable();
            $table->string('address' , 750 )->default('[]');  // default ==> empty array
            $table->string('role', 1 )->default('3'); // 1=> admin  ,  2=> moderator  ,  3=> user
            /*========== Oauth Columns ==========*/
            $table->string('oauth_id')->nullable();
            $table->string('oauth_type')->nullable();
            /*====================================*/
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
