<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRescheduledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescheduleds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technical_id')->unsigned()->nullable();
            $table->foreign('technical_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->text('reason')->nullable();
            $table->string('date')->nullable();
            $table->integer('time_id')->unsigned()->nullable();
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
            $table->boolean('reply')->default(false);

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
        Schema::dropIfExists('rescheduleds');
    }
}
