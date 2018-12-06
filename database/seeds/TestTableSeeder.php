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




          $name =[
            'en'=>'basin',
            'ar'=>'حوض',
            // 'en'=>'Pm',
             // 'ar'=>'مساء',
          ];


           // $user = new \App\TypeCompany() ;

           // $user->name = serialize($name);
            //    $user->name = 'تجربه'[$key];


         //  $user->save() ;

        \App\Producet::create([
           'name' =>serialize($name),
            'price'=>100,
            'cat_id'=>1

        ]);





    }
}
