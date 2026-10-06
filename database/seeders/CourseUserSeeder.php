<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        Course::all()->each(function (Course $course) use ($users) {
            $course->users()->attach($users->pluck('id'));
        });
    }
}
