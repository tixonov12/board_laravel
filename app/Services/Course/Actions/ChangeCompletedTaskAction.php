<?php

namespace App\Services\Course\Actions;

use App\Models\Course;
use App\Services\Course\Enums\ChangeCompletedTaskEnum;
use Illuminate\Support\Facades\Auth;

class ChangeCompletedTaskAction
{
    public function __invoke(Course $course, ChangeCompletedTaskEnum $type): Course
    {
        $userCourse = Auth::user()->courses()->firstWhere('course_id', $course->id);

        $change = $type === ChangeCompletedTaskEnum::ADD ? 1 : -1;
        $newValue = max(0, min($userCourse->total_tasks, $userCourse->completed_tasks + $change));

        $userCourse->pivot->update(['completed_tasks' => $newValue]);

        return $userCourse;
    }
}
