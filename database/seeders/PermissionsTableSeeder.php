<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'website_access',
            ],
            [
                'id'    => 34,
                'title' => 'header_create',
            ],
            [
                'id'    => 35,
                'title' => 'header_edit',
            ],
            [
                'id'    => 36,
                'title' => 'header_show',
            ],
            [
                'id'    => 37,
                'title' => 'header_delete',
            ],
            [
                'id'    => 38,
                'title' => 'header_access',
            ],
            [
                'id'    => 39,
                'title' => 'bulkdeal_access',
            ],
            [
                'id'    => 40,
                'title' => 'bulkitem_access',
            ],
            [
                'id'    => 41,
                'title' => 'nearival_access',
            ],
            [
                'id'    => 42,
                'title' => 'newproduct_create',
            ],
            [
                'id'    => 43,
                'title' => 'newproduct_edit',
            ],
            [
                'id'    => 44,
                'title' => 'newproduct_show',
            ],
            [
                'id'    => 45,
                'title' => 'newproduct_delete',
            ],
            [
                'id'    => 46,
                'title' => 'newproduct_access',
            ],
            [
                'id'    => 47,
                'title' => 'brand_create',
            ],
            [
                'id'    => 48,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 49,
                'title' => 'brand_show',
            ],
            [
                'id'    => 50,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 51,
                'title' => 'brand_access',
            ],
            [
                'id'    => 52,
                'title' => 'order_access',
            ],
            [
                'id'    => 53,
                'title' => 'orderconfrirm_create',
            ],
            [
                'id'    => 54,
                'title' => 'orderconfrirm_edit',
            ],
            [
                'id'    => 55,
                'title' => 'orderconfrirm_show',
            ],
            [
                'id'    => 56,
                'title' => 'orderconfrirm_delete',
            ],
            [
                'id'    => 57,
                'title' => 'orderconfrirm_access',
            ],
            [
                'id'    => 58,
                'title' => 'shipping_access',
            ],
            [
                'id'    => 59,
                'title' => 'addshiping_create',
            ],
            [
                'id'    => 60,
                'title' => 'addshiping_edit',
            ],
            [
                'id'    => 61,
                'title' => 'addshiping_show',
            ],
            [
                'id'    => 62,
                'title' => 'addshiping_delete',
            ],
            [
                'id'    => 63,
                'title' => 'addshiping_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
