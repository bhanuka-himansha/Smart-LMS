<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => '2023-08-28 13:50:55',
                'updated_at' => '2023-08-28 13:50:55',
            ),
            1 => 
            array (
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 2,
                'user_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 2,
                'user_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'role_id' => 3,
                'user_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}