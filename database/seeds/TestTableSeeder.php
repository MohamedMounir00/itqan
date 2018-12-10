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
            'en'=>'تم تعين  فنى لطلبك',
            'ar'=>'assien techamnal',
            // 'en'=>'Pm',
             // 'ar'=>'مساء',
          ];


           // $user = new \App\TypeCompany() ;

           // $user->name = serialize($name);
            //    $user->name = 'تجربه'[$key];


         //  $user->save() ;

        \App\NotfiyOrder::create([
           'message' =>serialize($name),
            'order_id'=>8,
            'client_id'=>1,
            'technical_id'=>5,


        ]);





    }
}
