<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('desc');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('express')->default('0');

            $table->integer('time_id')->unsigned()->nullable();
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
            $table->string('date');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('technical_id')->unsigned()->nullable();
            $table->foreign('technical_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->enum('status',['new','wating','done','can_not','consultation','delay','need_parts','another_visit_works']);

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
        Schema::dropIfExists('orders');
    }
}
