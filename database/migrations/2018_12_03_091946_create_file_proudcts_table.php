<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileProudctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_proudcts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storge_id')->unsigned()->nullable();
            $table->foreign('storge_id')->references('id')->on('storges')->onDelete('cascade');
            $table->integer('producet_id')->unsigned()->nullable();
            $table->foreign('producet_id')->references('id')->on('producets')->onDelete('cascade');

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
        Schema::dropIfExists('file_proudcts');
    }
}
