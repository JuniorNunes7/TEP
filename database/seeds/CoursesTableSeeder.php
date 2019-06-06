<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Matemática', 'História', 'Educação Física', 'Português', 'Biologia'
        ];

        foreach($courses as $course) {
            Course::create(['name' => $course]);
        }
    }
}
