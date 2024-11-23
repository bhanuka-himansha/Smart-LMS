<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quizzes')->delete();
        
        \DB::table('quizzes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Test Quiz',
                'course_id' => 1,
                'created_at' => '2024-02-06 17:05:04',
                'updated_at' => '2024-02-06 17:05:04',
            ),
        ));
        
        
    }
}