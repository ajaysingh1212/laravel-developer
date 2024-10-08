<?php

return [
    'userManagement' => [
        'title'          => 'ব্যবহারকারী ব্যবস্থাপনা',
        'title_singular' => 'ব্যবহারকারী ব্যবস্থাপনা',
    ],
    'permission' => [
        'title'          => 'অনুমতিসমূহ',
        'title_singular' => 'অনুমতি',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'ভূমিকা/রোলগুলি',
        'title_singular' => 'ভূমিকা/রোল',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'ব্যবহারকারীগণ',
        'title_singular' => 'ব্যবহারকারী',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'name'                       => 'Seller Name',
            'name_helper'                => ' ',
            'email'                      => 'Email',
            'email_helper'               => ' ',
            'email_verified_at'          => 'Email verified at',
            'email_verified_at_helper'   => ' ',
            'password'                   => 'Password',
            'password_helper'            => ' ',
            'roles'                      => 'Roles',
            'roles_helper'               => ' ',
            'remember_token'             => 'Remember Token',
            'remember_token_helper'      => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'phone'                      => 'Phone Number',
            'phone_helper'               => ' ',
            'addhar_number'              => 'Addhar Number',
            'addhar_number_helper'       => ' ',
            'pan_number'                 => 'Pan Number',
            'pan_number_helper'          => ' ',
            'state'                      => 'State',
            'state_helper'               => ' ',
            'city'                       => 'City',
            'city_helper'                => ' ',
            'pincode'                    => 'Pincode',
            'pincode_helper'             => ' ',
            'present_address'            => 'Present Address',
            'present_address_helper'     => ' ',
            'permanent_address'          => 'Permanent Address',
            'permanent_address_helper'   => ' ',
            'shop_name'                  => 'Shop Name',
            'shop_name_helper'           => ' ',
            'shop_gst_number'            => 'Shop Gst Number',
            'shop_gst_number_helper'     => ' ',
            'shop_pan_number'            => 'Shop Pan Number',
            'shop_pan_number_helper'     => ' ',
            'shop_state'                 => 'Shop State',
            'shop_state_helper'          => ' ',
            'shop_city'                  => 'Shop City',
            'shop_city_helper'           => ' ',
            'shop_pincode'               => 'Shop Pin-code',
            'shop_pincode_helper'        => ' ',
            'shop_address'               => 'Shop Address',
            'shop_address_helper'        => ' ',
            'seller_addhar_front'        => 'Addhar Front Side Photo',
            'seller_addhar_front_helper' => ' ',
            'seller_adhar_back'          => 'Adhar Back-Side Photo',
            'seller_adhar_back_helper'   => ' ',
            'seller_pan_image'           => 'Your Pan Card Image',
            'seller_pan_image_helper'    => ' ',
            'shop_pan_image'             => 'Shop Pan-card Image',
            'shop_pan_image_helper'      => ' ',
            'gst_file'                   => 'Gst File Upload',
            'gst_file_helper'            => ' ',
            'other_document'             => 'Other Document For Shop',
            'other_document_helper'      => ' ',
            'approved'                   => 'Approved',
            'approved_helper'            => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'productCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Product Name',
            'name_helper'             => ' ',
            'description'             => 'Short Description',
            'description_helper'      => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'category'                => 'Categories',
            'category_helper'         => ' ',
            'tag'                     => 'Tags',
            'tag_helper'              => ' ',
            'photo'                   => 'Product Image 1',
            'photo_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
            'discount'                => 'Discount In (%)',
            'discount_helper'         => ' ',
            'long_description'        => 'Long Description',
            'long_description_helper' => ' ',
            'product_color'           => 'Product Color',
            'product_color_helper'    => ' ',
            'select_brand'            => 'Select Brand',
            'select_brand_helper'     => ' ',
            'users'                   => 'Users',
            'users_helper'            => ' ',
            'product_image_2'         => 'Product Image 2',
            'product_image_2_helper'  => ' ',
            'product_image_3'         => 'Product Image 3',
            'product_image_3_helper'  => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'assetManagement' => [
        'title'          => 'Asset management',
        'title_singular' => 'Asset management',
    ],
    'assetCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'assetLocation' => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'assetStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'asset' => [
        'title'          => 'Assets',
        'title_singular' => 'Asset',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'category'             => 'Category',
            'category_helper'      => ' ',
            'serial_number'        => 'Serial Number',
            'serial_number_helper' => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'photos'               => 'Photos',
            'photos_helper'        => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'location'             => 'Location',
            'location_helper'      => ' ',
            'notes'                => 'Notes',
            'notes_helper'         => ' ',
            'assigned_to'          => 'Assigned to',
            'assigned_to_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
        ],
    ],
    'assetsHistory' => [
        'title'          => 'Assets History',
        'title_singular' => 'Assets History',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'asset'                => 'Asset',
            'asset_helper'         => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'location'             => 'Location',
            'location_helper'      => ' ',
            'assigned_user'        => 'Assigned User',
            'assigned_user_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'ব্যয় ব্যবস্থাপনা',
        'title_singular' => 'ব্যয় ব্যবস্থাপনা',
    ],
    'expenseCategory' => [
        'title'          => 'ব্যয় বিভাগ',
        'title_singular' => 'ব্যয় বিভাগ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'incomeCategory' => [
        'title'          => 'আয়ের বিভাগসমূহ',
        'title_singular' => 'আয়ের বিভাগ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'expense' => [
        'title'          => 'খরচ',
        'title_singular' => 'ব্যয়',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'expense_category'        => 'Expense Category',
            'expense_category_helper' => ' ',
            'entry_date'              => 'Entry Date',
            'entry_date_helper'       => ' ',
            'amount'                  => 'Amount',
            'amount_helper'           => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'income' => [
        'title'          => 'আয়',
        'title_singular' => 'আয়',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'income_category'        => 'Income Category',
            'income_category_helper' => ' ',
            'entry_date'             => 'Entry Date',
            'entry_date_helper'      => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'description'            => 'Description',
            'description_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'expenseReport' => [
        'title'          => 'মাসিক প্রতিবেদন',
        'title_singular' => 'মাসিক প্রতিবেদন',
        'reports'        => [
            'title'             => 'প্রতিবেদন',
            'title_singular'    => 'প্রতিবেদন',
            'incomeReport'      => 'আয় রিপোর্ট',
            'incomeByCategory'  => 'বিভাগ অনুসারে আয়',
            'expenseByCategory' => 'বিভাগ অনুসারে ব্যয়',
            'income'            => 'আয়',
            'expense'           => 'ব্যয়',
            'profit'            => 'মুনাফা',
        ],
    ],
    'contactManagement' => [
        'title'          => 'Contact management',
        'title_singular' => 'Contact management',
    ],
    'contactCompany' => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'company_name'           => 'Company name',
            'company_name_helper'    => ' ',
            'company_address'        => 'Address',
            'company_address_helper' => ' ',
            'company_website'        => 'Website',
            'company_website_helper' => ' ',
            'company_email'          => 'Email',
            'company_email_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'contactContact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => ' ',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => ' ',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => ' ',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => ' ',
            'contact_email'             => 'Email',
            'contact_email_helper'      => ' ',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => ' ',
            'contact_address'           => 'Address',
            'contact_address_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated At',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted At',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
    ],
    'viewOrder' => [
        'title'          => 'View Order',
        'title_singular' => 'View Order',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'order_by'                => 'Order By',
            'order_by_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'order_related_by'        => 'Order Related By',
            'order_related_by_helper' => ' ',
            'product'                 => 'Product',
            'product_helper'          => ' ',
            'total_price'             => 'Total Price',
            'total_price_helper'      => ' ',
            'quantity'                => 'Quantity',
            'quantity_helper'         => ' ',
            'delevery_date'           => 'Delevery Date',
            'delevery_date_helper'    => ' ',
            'order_status'            => 'Order Status',
            'order_status_helper'     => ' ',
            'order_number'            => 'Order Number',
            'order_number_helper'     => ' ',
            'user_name'               => 'User Name',
            'user_name_helper'        => ' ',
            'user_email'              => 'User Email',
            'user_email_helper'       => ' ',
            'user_phone'              => 'User Phone',
            'user_phone_helper'       => ' ',
            'user_state'              => 'User State',
            'user_state_helper'       => ' ',
            'user_city'               => 'User City',
            'user_city_helper'        => ' ',
            'user_pincode'            => 'User Pincode',
            'user_pincode_helper'     => ' ',
            'user_address'            => 'User Address',
            'user_address_helper'     => ' ',
        ],
    ],
    'color' => [
        'title'          => 'Color Of Product',
        'title_singular' => 'Color Of Product',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'add_color'         => 'Add Color',
            'add_color_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Brand',
        'title_singular' => 'Brand',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'updateOrder' => [
        'title'          => 'Update Order',
        'title_singular' => 'Update Order',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'order_number'        => 'Order Number',
            'order_number_helper' => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'message'             => 'Message',
            'message_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'shipment' => [
        'title'          => 'Shipment',
        'title_singular' => 'Shipment',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'order_number'        => 'Order Number',
            'order_number_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'manageReturnsRefund' => [
        'title'          => 'Manage Returns Refunds',
        'title_singular' => 'Manage Returns Refund',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'product_by'            => 'Product By',
            'product_by_helper'     => ' ',
            'product'               => 'Product',
            'product_helper'        => ' ',
            'order_by'              => 'Order By',
            'order_by_helper'       => ' ',
            'cancled_status'        => 'Cancled Status',
            'cancled_status_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'inventoryManagement' => [
        'title'          => 'Inventory Management',
        'title_singular' => 'Inventory Management',
    ],
    'stock' => [
        'title'          => 'Stocks',
        'title_singular' => 'Stock',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'quantity'              => 'Quantity',
            'quantity_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'select_product'        => 'Select Product',
            'select_product_helper' => ' ',
        ],
    ],
    'customerManagement' => [
        'title'          => 'Customer Management',
        'title_singular' => 'Customer Management',
    ],
    'productReview' => [
        'title'          => 'Product Review',
        'title_singular' => 'Product Review',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'product_name'        => 'Product Name',
            'product_name_helper' => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'message'             => 'Message',
            'message_helper'      => ' ',
            'stars'               => 'Stars',
            'stars_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'query' => [
        'title'          => 'Queries',
        'title_singular' => 'Query',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'promotionsAndDiscount' => [
        'title'          => 'Promotions And Discounts',
        'title_singular' => 'Promotions And Discount',
    ],
    'coupon' => [
        'title'          => 'Coupons',
        'title_singular' => 'Coupon',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'select_product'        => 'Select Product',
            'select_product_helper' => ' ',
            'discount'              => 'Discount (%)',
            'discount_helper'       => ' ',
            'valid_from'            => 'Valid From',
            'valid_from_helper'     => ' ',
            'valid_to'              => 'Valid To',
            'valid_to_helper'       => ' ',
            'offer_banner'          => 'Offer Banner',
            'offer_banner_helper'   => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'featuredProduct' => [
        'title'          => 'Featured Products',
        'title_singular' => 'Featured Product',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'product_name'               => 'Product Name',
            'product_name_helper'        => ' ',
            'product_title'              => 'Product Title',
            'product_title_helper'       => ' ',
            'product_discription'        => 'Product Discription',
            'product_discription_helper' => ' ',
            'product_image'              => 'Product Image',
            'product_image_helper'       => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'websetting' => [
        'title'          => 'Websetting',
        'title_singular' => 'Websetting',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'fav_icon'                => 'Fav Icon',
            'fav_icon_helper'         => ' ',
            'logo'                    => 'Header Logo',
            'logo_helper'             => ' ',
            'footer_logo'             => 'Footer Logo',
            'footer_logo_helper'      => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_discription'        => 'Meta Discription',
            'meta_discription_helper' => ' ',
            'mera_keyword'            => 'Mera Keyword',
            'mera_keyword_helper'     => ' ',
            'sitemap'                 => 'Sitemap',
            'sitemap_helper'          => ' ',
            'banner_1'                => 'Banner 1',
            'banner_1_helper'         => ' ',
            'banner_2'                => 'Banner 2',
            'banner_2_helper'         => ' ',
            'banner_3'                => 'Banner 3',
            'banner_3_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'master' => [
        'title'          => 'Master',
        'title_singular' => 'Master',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'phone'              => 'Phone',
            'phone_helper'       => ' ',
            'state'              => 'State',
            'state_helper'       => ' ',
            'city'               => 'City',
            'city_helper'        => ' ',
            'pincode'            => 'Pincode',
            'pincode_helper'     => ' ',
            'cradit_line'        => 'Cradit Line Intrest in (%)',
            'cradit_line_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],

];
