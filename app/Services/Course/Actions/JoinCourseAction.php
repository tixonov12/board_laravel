<?php

namespace App\Services\Course\Actions;

use App\Models\User;

class JoinCourseAction
{
    public function __invoke(User $user, int $courseId): void
    {
        $user->courses()->attach($courseId);
    }
}
