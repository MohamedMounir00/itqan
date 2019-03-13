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

 DB::table('appsetings')->insert([
            'key' => 'make_decision_time',
            'value' => '15',
        ]);



    }
}
// php artisan db:seed --class=TestTableSeeder
