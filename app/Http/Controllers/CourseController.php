<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\UpdateCourseDto;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Services\Course\Actions\UpdateCourseAction;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function update(
        Course             $course,
        UpdateCourseDto    $dto,
        UpdateCourseAction $updateCourseAction,
    ): JsonResponse
    {
        $updateCourseAction($course, $dto);

        return response()->json(new CourseResource($course));
    }

    public function show(Course $course): JsonResponse
    {
        return response()->json(new CourseResource($course));
    }
}
