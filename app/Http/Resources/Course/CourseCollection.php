<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Course */
class CourseCollection extends ResourceCollection
{
    public $collects = CourseResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }

    public function paginationInformation(Request $request, array $paginated): array
    {
        return [
            'meta' => [
                'next_cursor' => $paginated['next_cursor'] ?? null,
            ],
        ];
    }
}
