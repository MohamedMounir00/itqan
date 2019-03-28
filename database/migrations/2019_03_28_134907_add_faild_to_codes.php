<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaildToCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotional_codes', function (Blueprint $table) {
            //
            $table->enum('type_status',['warranty','coupon'])->default('warranty');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotional_codes', function (Blueprint $table) {
            //
        });
    }
}
