<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drives', function (Blueprint $table) {
            $table->increments('id')          ;
            $table->dateTime  ('startservice');
            $table->dateTime  ('endservice')  ;
            $table->decimal   ('score')       ;
            $table->float     ('taximeter')   ;
            $table->boolean   ('payed')       ;
            $table->timestamps()              ;
            $table->integer('customerid')->unsigned();
            $table->integer('driverid')  ->unsigned();

            $table->foreign('customerid')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('driverid')
                ->references('id')
                ->on('drivers')
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
        Schema::drop('drives');
    }
}
