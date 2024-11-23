<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contents')->delete();
        
        \DB::table('contents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_id' => 1,
                'title' => 'Getting Started with Laravel',
                'slug' => 'getting-started-with-laravel',
                'description' => '<div>&nbsp;<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;</div>',
                'images' => '["content\\/images\\/fl34yQl6WoLyIJ24KueuXIFLjOoM6nUytY9gc7AT.png","content\\/images\\/UfBtLcqjWn2RTtXSoGa4WwAgqLv0tStOhPD3rKNB.png","content\\/images\\/hqp3l14G0HyCpaGirLfBN1wwyg3DzknzRQMXVhKV.png"]',
                'video' => '"content\\/videos\\/qqUsd2DqXgYb4bzwHlHYo7Tu1yQm2O2fH3T49azr.mp4"',
                'created_at' => '2024-03-22 09:36:45',
                'updated_at' => '2024-05-22 12:32:45',
            ),
            1 => 
            array (
                'id' => 2,
                'course_id' => 1,
                'title' => 'Migrations and Models',
                'slug' => 'migrations-and-models',
                'description' => '<div>&nbsp; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. &nbsp;</div>',
                'images' => '["content\\/images\\/kHTFVUhGp92RSLqiZ5hdvdA1yTB25qpFb9PF7PQi.png","content\\/images\\/PaZ55qpvTjEXAplDeV2CXU4TYpZqK7iFSbE3BVRE.png","content\\/images\\/H3w5Qlm3i4a86Jr9SX0m1G2ijO68NtjMgAJtkqJw.png"]',
                'video' => '"content\\/videos\\/kRm1Qbuf6YazLLH7OR26pcEuCxGeTIMp8gbNy7Zn.mp4"',
                'created_at' => '2024-03-22 09:57:48',
                'updated_at' => '2024-05-22 12:33:30',
            ),
            2 => 
            array (
                'id' => 3,
                'course_id' => 1,
                'title' => 'Routes, Controllers and Views',
                'slug' => 'routes-controllers-and-views',
                'description' => '<div>&nbsp; <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. &nbsp;</div>',
                'images' => '["content\\/images\\/kLMOyF6ovGOBRvRs9YGj9I4YPK7u1vZ01KcxkqHi.png","content\\/images\\/2mxgO98qcWGbKzdBCR2hnqsCbKUzxBnPzJwjvCdI.png","content\\/images\\/smZJC3zlY1TOFu7Oq9dI6X3G3ttavRz5hoJLMABe.png"]',
                'video' => '"content\\/videos\\/IASvRhMIo9KoehCS7FrCJgFLU9qDbUHUPAn3rMBo.mp4"',
                'created_at' => '2024-03-22 09:58:29',
                'updated_at' => '2024-05-22 12:34:29',
            ),
        ));
        
        
    }
}