<?php

namespace App\Http\Controllers;

use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;
use App\Services\Course\Actions\ChangeCompletedTaskAction;
use App\Services\Course\Actions\JoinCourseAction;
use App\Services\Course\Actions\LeaveCourseAction;
use App\Services\Course\Enums\ChangeCompletedTaskEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function index(): CourseCollection
    {
        $courses = Auth::user()->courses()
            ->orderByDesc('course_user.created_at')
            ->cursorPaginate(6);

        return new CourseCollection($courses);
    }

    public function completeTask(
        Course                    $course,
        ChangeCompletedTaskAction $changeCompletedTaskAction,
    ): JsonResponse
    {
        $userCourse = $changeCompletedTaskAction($course, ChangeCompletedTaskEnum::ADD);

        return response()->json(new CourseResource($userCourse));
    }

    public function uncompleteTask(
        Course                    $course,
        ChangeCompletedTaskAction $changeCompletedTaskAction,
    )
    {
        $userCourse = $changeCompletedTaskAction($course, ChangeCompletedTaskEnum::REMOVE);

        return response()->json(new CourseResource($userCourse));
    }

    public function join(
        Course           $course,
        JoinCourseAction $joinCourseAction,
    ): JsonResponse
    {
        $user = Auth::user();

        if ($user->hasCourse($course->id)) {
            return response()->json(['message' => 'Course already added'], 409);
        }

        $joinCourseAction($user, $course->id);

        return response()->json(new CourseResource($course));
    }

    public function leave(
        Course            $course,
        LeaveCourseAction $leaveCourseAction,
    ): JsonResponse
    {
        $user = Auth::user();

        if (!$user->hasCourse($course->id)) {
            return response()->json(['message' => 'Not enrolled in this course'], 404);
        }

        $leaveCourseAction($user, $course->id);

        return response()->json([], 204);
    }
}
