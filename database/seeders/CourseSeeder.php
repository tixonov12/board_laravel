<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Физическая культура и спорт. Заочное обучение. 1 Курс'],
            ['name' => 'Основы российской государственности (заочники)'],
            ['name' => 'Основы программирования (заоч)'],
            ['name' => 'Математический анализ ЗО Часть 1'],
            ['name' => 'История России (Преподаватель: А. И. Федулов)'],
            ['name' => 'Иностранный язык (для заочного отделения ИКИТ 1 и 2 курса)'],
            ['name' => 'Алгебра и геометрия (Алгебра). ЗО'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
