<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaildToRescheduleds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rescheduleds', function (Blueprint $table) {
            //
            $table->enum('status',['new','wating','done','can_not','consultation','delay','need_parts','another_visit_works']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rescheduleds', function (Blueprint $table) {
            //
        });
    }
}
