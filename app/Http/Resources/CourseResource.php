<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Course */
class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'total_tasks' => $this->total_tasks,
            'completed_tasks' => $this->whenPivotLoaded('course_user', fn() => $this->pivot->completed_tasks),
            'has_course' => $this->whenHas('has_course', fn() => $this->has_course),
        ];
    }
}
