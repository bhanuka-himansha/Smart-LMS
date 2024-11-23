<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Test Course',
                'slug' => 'test-course',
                'category' => 'Art',
                'color' => 'green',
                'description' => '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;</div>',
                'thumbnails' => '"courses\\/thumbnails\\/ZfI0t6IG0tiM14KJFDhzbYMoLbJ0GQxsO0vuOwkk.png"',
                'video' => NULL,
                'objectives' => '[{"type":"objective","fields":{"name":"Eat"}},{"type":"objective","fields":{"name":"Sleep"}},{"type":"objective","fields":{"name":"Repeat"}}]',
                'type' => 'Free',
                'amount' => '0.00',
                'discount' => '0.00',
                'currency' => 'LKR',
                'status' => 1,
                'certificate' => '{
"version": "5.3.0",
"objects": []
}',
                'created_at' => '2024-02-06 17:04:46',
                'updated_at' => '2024-05-22 13:48:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Introduction to Art',
                'slug' => 'introduction-to-art',
                'category' => 'Art',
                'color' => 'purple',
                'description' => '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp;</div>',
                'thumbnails' => '"courses\\/thumbnails\\/doEHy32KXvl67ji6i6RMXPAQZLdpyHWqdytw93MO.png"',
                'video' => '"courses\\/videos\\/M5zweWqSQ3KXBnwVg0drh6ygPOgaqo9bFrPGIE8d.mp4"',
                'objectives' => '[{"type":"objective","fields":{"name":"Eat"}},{"type":"objective","fields":{"name":"Sleep"}},{"type":"objective","fields":{"name":"Repeat"}}]',
                'type' => 'Paid',
                'amount' => '0.00',
                'discount' => '0.00',
                'currency' => 'LKR',
                'status' => 2,
                'certificate' => '{
"version": "5.3.0",
"objects": []
}',
                'created_at' => '2024-02-06 17:04:46',
                'updated_at' => '2024-05-22 13:53:23',
            ),
        ));
        
        
    }
}