<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'approved'        => 1,
                'phone'           => '',
                'addhar_number'   => '',
                'pan_number'      => '',
                'state'           => '',
                'city'            => '',
                'pincode'         => '',
                'shop_name'       => '',
                'shop_gst_number' => '',
                'shop_pan_number' => '',
                'shop_state'      => '',
                'shop_city'       => '',
                'shop_pincode'    => '',
            ],
        ];

        User::insert($users);
    }
}
