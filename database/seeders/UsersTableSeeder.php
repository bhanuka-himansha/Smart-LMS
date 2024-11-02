<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Zuse Web Team',
                'epfno' => NULL,
                'first_name' => NULL,
                'last_name' => NULL,
                'username' => NULL,
                'department_id' => NULL,
                'email' => 'web@zuse.lk',
                'email_verified_at' => NULL,
                'gender' => NULL,
                'position' => NULL,
                'mobile' => NULL,
                'password' => '$2y$10$xSua3KTzmXnHMI/B4sjxoOD5Y/0GAvKBeFEPwyHTSIBePHxptE/E6',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => NULL,
                'updated_by' => NULL,
                'created_at' => '2023-08-28 06:43:11',
                'updated_at' => '2023-08-28 06:43:11',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Sandev Dullewa',
                'epfno' => NULL,
                'first_name' => NULL,
                'last_name' => NULL,
                'username' => NULL,
                'department_id' => 1,
                'email' => 'sandev.net@gmail.com',
                'email_verified_at' => NULL,
                'gender' => NULL,
                'position' => 'Software Engineer',
                'mobile' => NULL,
                'password' => '$2y$10$xSua3KTzmXnHMI/B4sjxoOD5Y/0GAvKBeFEPwyHTSIBePHxptE/E6',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-03-20 15:28:13',
                'updated_at' => '2024-03-20 15:28:13',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Yuneth Samarakoon',
                'epfno' => '2000044',
                'first_name' => 'Yuneth',
                'last_name' => 'Samarakoon',
                'username' => 'yunethsamarakoon',
                'department_id' => 1,
                'email' => 'yuneths@zuse.lk',
                'email_verified_at' => NULL,
                'gender' => 'male',
                'position' => 'Business Analyst',
                'mobile' => '0705516833',
                'password' => '$2y$10$qNyOpcgG896ne86VX89Vde/rwlR.H9F.iydbS.bJgeccWE4iFtaP6',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-05-08 17:51:41',
                'updated_at' => '2024-05-08 17:51:41',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Manoj Fernando',
                'epfno' => '2000065',
                'first_name' => 'Manoj',
                'last_name' => 'Fernando',
                'username' => 'manojfernando',
                'department_id' => 1,
                'email' => 'manojfernando708@gmail.com',
                'email_verified_at' => NULL,
                'gender' => 'female',
                'position' => 'Business Analyst',
                'mobile' => '772696425',
                'password' => '$2y$10$4Zmw52OqB8QV8U62naaeQ.NmBv70O2v7nGIE5QSO4Oj7Z2vTdvmWe',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-05-08 17:51:41',
                'updated_at' => '2024-05-08 17:51:41',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Avedha De Costa',
                'epfno' => '2000091',
                'first_name' => 'Avedha',
                'last_name' => 'De Costa',
                'username' => 'avedhadecosta',
                'department_id' => 1,
                'email' => 'avedhac@zuse.lk',
                'email_verified_at' => NULL,
                'gender' => 'female',
                'position' => 'Business Analyst',
                'mobile' => '0776419389',
                'password' => '$2y$10$LM8WGfN1C4QtIS6aw0YX6eIrGYRDsF5GqgzReBWAXrjAr0FcEvx8e',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-05-08 17:51:41',
                'updated_at' => '2024-05-08 17:51:41',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Jerome Perera',
                'epfno' => 'ZUSEGM',
                'first_name' => 'Jerome',
                'last_name' => 'Perera',
                'username' => 'jay',
                'department_id' => 1,
                'email' => 'gm@zuse.lk',
                'email_verified_at' => NULL,
                'gender' => 'male',
                'position' => 'General Manager',
                'mobile' => '0776419380',
                'password' => '$2y$10$LM8WGfN1C4QtIS6aw0YX6eIrGYRDsF5GqgzReBWAXrjAr0FcEvx8e',
                'remember_token' => NULL,
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-05-08 17:51:41',
                'updated_at' => '2024-05-08 17:51:41',
            ),
        ));


    }
}
