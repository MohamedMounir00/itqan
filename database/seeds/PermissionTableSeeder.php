<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //php artisan db:seed --class=PermissionTableSeeder
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            /////product/
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            /// admin///
           'admin-list',
           'admin-create',
            'admin-edit',
           'admin-delete',

            /// client///
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            /// technical///
            'technical-list',
            'technical-create',
            'technical-edit',
            'technical-delete',

            /// order///
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'order-action',
            /// category-order///
            'category_order-list',
            'category_order-create',
            'category_order-edit',
            'category_order-delete',

            /// category-product///
            'category_product-list',
            'category_product-create',
            'category_product-edit',
            'category_product-delete',

            /// time-working///
            'time-list',
            'time-create',
            'time-edit',
            'time-delete',
            /// time-working///
            'holiday-list',
            'holiday-create',
            'holiday-edit',
            'holiday-delete',
            /// ministry///
            'ministry-list',
            'ministry-create',
            'ministry-edit',
            'ministry-delete',

            /// company///
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',
            /// currency///
            'currency-list',
            'currency-create',
            'currency-edit',
            'currency-delete',
            /// country///
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',
            /// city///
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            //////////setting
            'send-message',
            'admin-message',
            'setting'




        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
