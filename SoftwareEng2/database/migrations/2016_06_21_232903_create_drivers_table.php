<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id')             ;
            $table->time      ('begintime')      ;
            $table->time      ('endtime')        ;
            $table->decimal   ('hourlywage', 10) ;
            $table->decimal   ('score')          ;
            $table->text      ('plate')          ;
            $table->decimal   ('servicecounter') ;
            $table->integer('userid')   ->unsigned();
            $table->integer('vehicleid')->unsigned();
            $table->timestamps()                 ;

            /**
             *     FOREIGN KEY SECTION   [DONE]
             */
            $table->foreign('userid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vehicleid')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drivers');
    }
}
