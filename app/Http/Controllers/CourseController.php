<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CreateCourseDto;
use App\Http\Requests\Course\UpdateCourseDto;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;
use App\Services\Course\Actions\CreateCourseAction;
use App\Services\Course\Actions\UpdateCourseAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(): CourseCollection
    {
        $courses = Course::withExists(['users as has_course' => fn($q) => $q->where('users.id', Auth::id())])
            ->latest()
            ->cursorPaginate(16);

        return new CourseCollection($courses);
    }

    public function store(
        CreateCourseDto    $dto,
        CreateCourseAction $createCourseAction,
    ): JsonResponse
    {
        $course = $createCourseAction($dto);

        return response()->json(new CourseResource($course), 201);
    }

    public function update(
        Course             $course,
        UpdateCourseDto    $dto,
        UpdateCourseAction $updateCourseAction,
    ): JsonResponse
    {
        $updateCourseAction($course, $dto);

        return response()->json(new CourseResource($course));
    }

    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json([], 204);
    }

    public function show(Course $course): JsonResponse
    {
        return response()->json(new CourseResource($course));
    }
}
