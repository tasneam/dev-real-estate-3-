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
                'title' => 'setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'main_menu_access',
            ],
            [
                'id'    => 23,
                'title' => 'social_link_create',
            ],
            [
                'id'    => 24,
                'title' => 'social_link_edit',
            ],
            [
                'id'    => 25,
                'title' => 'social_link_show',
            ],
            [
                'id'    => 26,
                'title' => 'social_link_delete',
            ],
            [
                'id'    => 27,
                'title' => 'social_link_access',
            ],
            [
                'id'    => 28,
                'title' => 'page_create',
            ],
            [
                'id'    => 29,
                'title' => 'page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'page_show',
            ],
            [
                'id'    => 31,
                'title' => 'page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'page_access',
            ],
            [
                'id'    => 33,
                'title' => 'city_create',
            ],
            [
                'id'    => 34,
                'title' => 'city_edit',
            ],
            [
                'id'    => 35,
                'title' => 'city_show',
            ],
            [
                'id'    => 36,
                'title' => 'city_delete',
            ],
            [
                'id'    => 37,
                'title' => 'city_access',
            ],
            [
                'id'    => 38,
                'title' => 'language_create',
            ],
            [
                'id'    => 39,
                'title' => 'language_edit',
            ],
            [
                'id'    => 40,
                'title' => 'language_show',
            ],
            [
                'id'    => 41,
                'title' => 'language_delete',
            ],
            [
                'id'    => 42,
                'title' => 'language_access',
            ],
            [
                'id'    => 43,
                'title' => 'realestate_create',
            ],
            [
                'id'    => 44,
                'title' => 'realestate_edit',
            ],
            [
                'id'    => 45,
                'title' => 'realestate_show',
            ],
            [
                'id'    => 46,
                'title' => 'realestate_delete',
            ],
            [
                'id'    => 47,
                'title' => 'realestate_access',
            ],
            [
                'id'    => 48,
                'title' => 'department_create',
            ],
            [
                'id'    => 49,
                'title' => 'department_edit',
            ],
            [
                'id'    => 50,
                'title' => 'department_show',
            ],
            [
                'id'    => 51,
                'title' => 'department_delete',
            ],
            [
                'id'    => 52,
                'title' => 'department_access',
            ],
            [
                'id'    => 53,
                'title' => 'university_create',
            ],
            [
                'id'    => 54,
                'title' => 'university_edit',
            ],
            [
                'id'    => 55,
                'title' => 'university_show',
            ],
            [
                'id'    => 56,
                'title' => 'university_delete',
            ],
            [
                'id'    => 57,
                'title' => 'university_access',
            ],
            [
                'id'    => 58,
                'title' => 'travel_create',
            ],
            [
                'id'    => 59,
                'title' => 'travel_edit',
            ],
            [
                'id'    => 60,
                'title' => 'travel_show',
            ],
            [
                'id'    => 61,
                'title' => 'travel_delete',
            ],
            [
                'id'    => 62,
                'title' => 'travel_access',
            ],
            [
                'id'    => 63,
                'title' => 'customer_data_create',
            ],
            [
                'id'    => 64,
                'title' => 'customer_data_edit',
            ],
            [
                'id'    => 65,
                'title' => 'customer_data_show',
            ],
            [
                'id'    => 66,
                'title' => 'customer_data_delete',
            ],
            [
                'id'    => 67,
                'title' => 'customer_data_access',
            ],
            [
                'id'    => 68,
                'title' => 'contact_us_create',
            ],
            [
                'id'    => 69,
                'title' => 'contact_us_edit',
            ],
            [
                'id'    => 70,
                'title' => 'contact_us_show',
            ],
            [
                'id'    => 71,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 72,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 73,
                'title' => 'item_create',
            ],
            [
                'id'    => 74,
                'title' => 'item_edit',
            ],
            [
                'id'    => 75,
                'title' => 'item_show',
            ],
            [
                'id'    => 76,
                'title' => 'item_delete',
            ],
            [
                'id'    => 77,
                'title' => 'item_access',
            ],
            [
                'id'    => 78,
                'title' => 'pageand_iteme_access',
            ],
            [
                'id'    => 79,
                'title' => 'form_data_access',
            ],
            [
                'id'    => 80,
                'title' => 'main_access',
            ],
            [
                'id'    => 81,
                'title' => 'slider_create',
            ],
            [
                'id'    => 82,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 83,
                'title' => 'slider_show',
            ],
            [
                'id'    => 84,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 85,
                'title' => 'slider_access',
            ],
            [
                'id'    => 86,
                'title' => 'service_create',
            ],
            [
                'id'    => 87,
                'title' => 'service_edit',
            ],
            [
                'id'    => 88,
                'title' => 'service_show',
            ],
            [
                'id'    => 89,
                'title' => 'service_delete',
            ],
            [
                'id'    => 90,
                'title' => 'service_access',
            ],
            [
                'id'    => 91,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
