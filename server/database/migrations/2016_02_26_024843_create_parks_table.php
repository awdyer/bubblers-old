<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('code', 5);

            $table->integer('suburb_id')->unsigned();
            $table->foreign('suburb_id')
                ->references('id')->on('suburbs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parks');
    }
}
