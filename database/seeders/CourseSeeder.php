<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Goal;
use App\Models\Lesson;
use App\Models\Methodology;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(20)->create();


        foreach ($courses as $course) {

            Requirement::factory(rand(3, 6))->create([
                'course_id' => $course->id
            ]);
            Methodology::factory(rand(3, 6))->create([
                'course_id' => $course->id
            ]);
            Goal::factory(rand(3, 6))->create([
                'course_id' => $course->id
            ]);
            Audience::factory(rand(3, 6))->create([
                'course_id' => $course->id,
            ]);
            $sections = Section::factory(rand(3, 6))->create([
                'course_id' => $course->id,
            ]);
            foreach ($sections as $section) {
                $lessons = Lesson::factory(rand(3, 6))->create([
                    'section_id' => $section->id,
                ]);
            }
        }
    }
}
