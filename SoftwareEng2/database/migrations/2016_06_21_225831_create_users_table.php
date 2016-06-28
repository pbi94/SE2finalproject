<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')                 ; // PRIMARY KEY  of `users` Table
            $table->string    ('name')               ; // NAME         of  user
            $table->string    ('family')             ; // FAMILY       of  user
            $table->strin     ('phonenumber')        ; // PHONE NUMBER of  user
            $table->string    ('email')   ->unique() ; // EMAIL        of  user
            $table->string    ('username')->unique() ; // USERNAME     of  user
            $table->string    ('password')           ; // PASSWORD     of  user
            $table->integer   ('type')               ; // TYPE         of  user : Manager : 1, Driver : 2, Customer : 3
            $table->rememberToken()                  ;
            $table->timestamps   ()                  ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
