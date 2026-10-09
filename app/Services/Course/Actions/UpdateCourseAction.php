<?php

namespace App\Services\Course\Actions;

use App\Http\Requests\Course\UpdateCourseDto;
use App\Models\Course;

class UpdateCourseAction
{
    public function __invoke(Course $course, UpdateCourseDto $dto): void
    {
        $course->update([
            'name' => $dto->name,
            'total_tasks' => $dto->totalTasks ?? 0,
        ]);
    }
}
