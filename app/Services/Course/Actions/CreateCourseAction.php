<?php

namespace App\Services\Course\Actions;

use App\Http\Requests\Course\CreateCourseDto;
use App\Models\Course;

class CreateCourseAction
{
    public function __invoke(CreateCourseDto $dto): Course
    {
        return Course::create([
            'name' => $dto->name,
            'total_tasks' => $dto->totalTasks ?? 0,
        ]);
    }
}
