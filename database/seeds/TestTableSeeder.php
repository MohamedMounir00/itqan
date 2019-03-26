<?php

use App\Ministry;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

 //DB::table('appsetings')->insert([
           // 'key' => 'make_decision_time',
           // 'value' => '15',
       // ]);

        DB::table('holidays')->insert([
            'day_number' => '6',
            'day' => serialize(['ar'=>'السبت','en'=>'Saturday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '7',
            'day' => serialize(['ar'=>'الاحد','en'=>'Sunday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '1',
            'day' => serialize(['ar'=>'الاثنين','en'=>'Monday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '2',
            'day' => serialize(['ar'=>'الثلاثاء','en'=>'Tuesday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '3',
            'day' => serialize(['ar'=>'الاربعاء','en'=>'Wednesday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '4',
            'day' => serialize(['ar'=>'الخميس','en'=>'Thursday']),
        ]);
        DB::table('holidays')->insert([
            'day_number' => '5',
            'day' => serialize(['ar'=>'الجمعه','en'=>'Friday']),
            'active' => '0',
        ]);


    }





}

// php artisan db:seed --class=TestTableSeeder
