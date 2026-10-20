<?php

namespace App\Http\Resources\Course;

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
            'completed_tasks' => $this->completed_tasks,
            'has_course' => $this->has_course,
        ];
    }
}
