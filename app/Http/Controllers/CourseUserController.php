<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Services\Course\Actions\ChangeCompletedTaskAction;
use App\Services\Course\Enums\ChangeCompletedTaskEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Auth::user()->courses()->latest()->get();

        return response()->json(CourseResource::collection($courses));
    }

    public function add(
        Course                    $course,
        ChangeCompletedTaskAction $changeCompletedTaskAction,
    ): JsonResponse
    {
        $userCourse = $changeCompletedTaskAction($course, ChangeCompletedTaskEnum::ADD);

        return response()->json(new CourseResource($userCourse));
    }

    public function remove(
        Course                    $course,
        ChangeCompletedTaskAction $changeCompletedTaskAction,
    )
    {
        $userCourse = $changeCompletedTaskAction($course, ChangeCompletedTaskEnum::REMOVE);

        return response()->json(new CourseResource($userCourse));
    }
}
