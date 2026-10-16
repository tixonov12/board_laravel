<?php

namespace App\Services\Course\Actions;

use App\Models\User;

class LeaveCourseAction
{
    public function __invoke(User $user, int $courseId): void
    {
        $user->courses()->detach($courseId);
    }
}
