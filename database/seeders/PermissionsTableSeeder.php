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
                'title' => 'product_edit',
            ],
            [
                'id'    => 29,
                'title' => 'product_show',
            ],
            [
                'id'    => 30,
                'title' => 'product_delete',
            ],
            [
                'id'    => 31,
                'title' => 'product_access',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 36,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 37,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 38,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 39,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 40,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 41,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 42,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 43,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 44,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 45,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 46,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 47,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 48,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 49,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 50,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 51,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 52,
                'title' => 'asset_create',
            ],
            [
                'id'    => 53,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 54,
                'title' => 'asset_show',
            ],
            [
                'id'    => 55,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 56,
                'title' => 'asset_access',
            ],
            [
                'id'    => 57,
                'title' => 'assets_history_show',
            ],
            [
                'id'    => 58,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 59,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 60,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 61,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 62,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 63,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 64,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 65,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 66,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 67,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 68,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 69,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 70,
                'title' => 'expense_create',
            ],
            [
                'id'    => 71,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 72,
                'title' => 'expense_show',
            ],
            [
                'id'    => 73,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 74,
                'title' => 'expense_access',
            ],
            [
                'id'    => 75,
                'title' => 'income_create',
            ],
            [
                'id'    => 76,
                'title' => 'income_edit',
            ],
            [
                'id'    => 77,
                'title' => 'income_show',
            ],
            [
                'id'    => 78,
                'title' => 'income_delete',
            ],
            [
                'id'    => 79,
                'title' => 'income_access',
            ],
            [
                'id'    => 80,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 81,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 82,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 83,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 84,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 85,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 86,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 87,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 88,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 89,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 90,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 91,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 92,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 93,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 94,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 95,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 96,
                'title' => 'order_access',
            ],
            [
                'id'    => 97,
                'title' => 'view_order_edit',
            ],
            [
                'id'    => 98,
                'title' => 'view_order_show',
            ],
            [
                'id'    => 99,
                'title' => 'view_order_delete',
            ],
            [
                'id'    => 100,
                'title' => 'view_order_access',
            ],
            [
                'id'    => 101,
                'title' => 'color_create',
            ],
            [
                'id'    => 102,
                'title' => 'color_edit',
            ],
            [
                'id'    => 103,
                'title' => 'color_show',
            ],
            [
                'id'    => 104,
                'title' => 'color_delete',
            ],
            [
                'id'    => 105,
                'title' => 'color_access',
            ],
            [
                'id'    => 106,
                'title' => 'brand_create',
            ],
            [
                'id'    => 107,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 108,
                'title' => 'brand_show',
            ],
            [
                'id'    => 109,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 110,
                'title' => 'brand_access',
            ],
            [
                'id'    => 111,
                'title' => 'update_order_create',
            ],
            [
                'id'    => 112,
                'title' => 'update_order_edit',
            ],
            [
                'id'    => 113,
                'title' => 'update_order_show',
            ],
            [
                'id'    => 114,
                'title' => 'update_order_delete',
            ],
            [
                'id'    => 115,
                'title' => 'update_order_access',
            ],
            [
                'id'    => 116,
                'title' => 'shipment_create',
            ],
            [
                'id'    => 117,
                'title' => 'shipment_edit',
            ],
            [
                'id'    => 118,
                'title' => 'shipment_show',
            ],
            [
                'id'    => 119,
                'title' => 'shipment_delete',
            ],
            [
                'id'    => 120,
                'title' => 'shipment_access',
            ],
            [
                'id'    => 121,
                'title' => 'manage_returns_refund_create',
            ],
            [
                'id'    => 122,
                'title' => 'manage_returns_refund_edit',
            ],
            [
                'id'    => 123,
                'title' => 'manage_returns_refund_show',
            ],
            [
                'id'    => 124,
                'title' => 'manage_returns_refund_delete',
            ],
            [
                'id'    => 125,
                'title' => 'manage_returns_refund_access',
            ],
            [
                'id'    => 126,
                'title' => 'inventory_management_access',
            ],
            [
                'id'    => 127,
                'title' => 'stock_create',
            ],
            [
                'id'    => 128,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 129,
                'title' => 'stock_show',
            ],
            [
                'id'    => 130,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 131,
                'title' => 'stock_access',
            ],
            [
                'id'    => 132,
                'title' => 'customer_management_access',
            ],
            [
                'id'    => 133,
                'title' => 'product_review_create',
            ],
            [
                'id'    => 134,
                'title' => 'product_review_edit',
            ],
            [
                'id'    => 135,
                'title' => 'product_review_show',
            ],
            [
                'id'    => 136,
                'title' => 'product_review_delete',
            ],
            [
                'id'    => 137,
                'title' => 'product_review_access',
            ],
            [
                'id'    => 138,
                'title' => 'query_create',
            ],
            [
                'id'    => 139,
                'title' => 'query_edit',
            ],
            [
                'id'    => 140,
                'title' => 'query_show',
            ],
            [
                'id'    => 141,
                'title' => 'query_delete',
            ],
            [
                'id'    => 142,
                'title' => 'query_access',
            ],
            [
                'id'    => 143,
                'title' => 'promotions_and_discount_access',
            ],
            [
                'id'    => 144,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 145,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 146,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 147,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 148,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 149,
                'title' => 'featured_product_create',
            ],
            [
                'id'    => 150,
                'title' => 'featured_product_edit',
            ],
            [
                'id'    => 151,
                'title' => 'featured_product_show',
            ],
            [
                'id'    => 152,
                'title' => 'featured_product_delete',
            ],
            [
                'id'    => 153,
                'title' => 'featured_product_access',
            ],
            [
                'id'    => 154,
                'title' => 'setting_access',
            ],
            [
                'id'    => 155,
                'title' => 'websetting_create',
            ],
            [
                'id'    => 156,
                'title' => 'websetting_edit',
            ],
            [
                'id'    => 157,
                'title' => 'websetting_show',
            ],
            [
                'id'    => 158,
                'title' => 'websetting_delete',
            ],
            [
                'id'    => 159,
                'title' => 'websetting_access',
            ],
            [
                'id'    => 160,
                'title' => 'master_create',
            ],
            [
                'id'    => 161,
                'title' => 'master_edit',
            ],
            [
                'id'    => 162,
                'title' => 'master_show',
            ],
            [
                'id'    => 163,
                'title' => 'master_delete',
            ],
            [
                'id'    => 164,
                'title' => 'master_access',
            ],
            [
                'id'    => 165,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
