<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('departments')->delete();

        \DB::table('departments')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Zuse Technologies',
                'organization_id' => 1,
                'created_at' => '2024-02-05 12:19:33',
                'updated_at' => '2024-02-05 12:19:33',
            ),
        ));


    }
}
