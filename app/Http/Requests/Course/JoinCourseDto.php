<?php

namespace App\Http\Requests\Course;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class JoinCourseDto extends Data
{
    public function __construct(
        public int $courseId,
    )
    {
    }
}
