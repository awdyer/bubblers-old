<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBubblersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bubblers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);

            $table->integer('park_id')->unsigned();
            $table->foreign('park_id')
                ->references('id')->on('parks')
                ->onDelete('cascade');

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
        Schema::drop('bubblers');
    }
}
