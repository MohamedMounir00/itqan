<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTechnical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technicals', function (Blueprint $table) {
            //
            $table->string('identification')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('latitude')->default('0.0');
            $table->string('longitude')->default('0.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technicals', function (Blueprint $table) {
            //
        });
    }
}
