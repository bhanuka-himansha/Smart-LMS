<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('role_permission')->delete();

        \DB::table('role_permission')->insert(
            array(
                0 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create content',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                1 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create course',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                2 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create department',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                3 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create organization',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                4 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create progress',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                5 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create question',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                6 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create quiz',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                7 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create role',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                8 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create user',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                9 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete content',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                10 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete course',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                11 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete department',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                12 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete organization',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                13 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete progress',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                14 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete question',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                15 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete quiz',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                16 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete role',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                17 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete user',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                18 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit content',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                19 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit course',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                20 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit department',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                21 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit organization',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                22 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit progress',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                23 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit question',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                24 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit quiz',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                25 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit role',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                26 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit user',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                27 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'navigate user',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                28 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view content',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                29 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view course',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                30 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view department',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                31 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view organization',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                32 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view progress',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                33 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view question',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                34 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view quiz',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                35 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view role',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                36 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view user',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                37 =>
                    array(
                        'role_id' => 2,
                        'permission_slug' => 'view role',
                        'created_at' => '2023-08-28 14:29:24',
                        'updated_at' => '2023-08-28 14:29:24',
                    ),
                38 =>
                    array(
                        'role_id' => 2,
                        'permission_slug' => 'view user',
                        'created_at' => '2023-08-28 14:29:24',
                        'updated_at' => '2023-08-28 14:29:24',
                    ),
                39 =>
                    array(
                        'role_id' => 3,
                        'permission_slug' => 'navigate user',
                        'created_at' => '2023-08-28 14:29:42',
                        'updated_at' => '2023-08-28 14:29:42',
                    ),
                40 =>
                    array(
                        'role_id' => 3,
                        'permission_slug' => 'view role',
                        'created_at' => '2023-08-28 14:29:42',
                        'updated_at' => '2023-08-28 14:29:42',
                    ),
                41 =>
                    array(
                        'role_id' => 3,
                        'permission_slug' => 'view user',
                        'created_at' => '2023-08-28 14:29:42',
                        'updated_at' => '2023-08-28 14:29:42',
                    ),
                42 =>
                    array(
                        'role_id' => 4,
                        'permission_slug' => 'view role',
                        'created_at' => '2023-08-28 14:30:00',
                        'updated_at' => '2023-08-28 14:30:00',
                    ),
                43 =>
                    array(
                        'role_id' => 4,
                        'permission_slug' => 'view user',
                        'created_at' => '2023-08-28 14:30:00',
                        'updated_at' => '2023-08-28 14:30:00',
                    ),
                44 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'view zoom meeting',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                45 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'create zoom meeting',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                46 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'edit zoom meeting',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
                47 =>
                    array(
                        'role_id' => 1,
                        'permission_slug' => 'delete zoom meeting',
                        'created_at' => '2024-02-06 11:07:24',
                        'updated_at' => '2024-02-06 11:07:24',
                    ),
            )
        );


    }
}
