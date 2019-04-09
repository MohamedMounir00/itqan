<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price')->nullable();
            $table->text('details')->nullable();
            $table->string( 'code' )->nullable( );
            $table->integer( 'uses' )->unsigned( )->nullable( );
            $table->timestamp( 'expires_at' );
            $table->enum('type',['percentage','currency'])->default('currency');
            $table->integer('order_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotional_codes');
    }
}
