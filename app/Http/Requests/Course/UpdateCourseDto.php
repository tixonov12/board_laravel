<?php

namespace App\Http\Requests\Course;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdateCourseDto extends Data
{
    public function __construct(
        public string $name,
        public ?int   $totalTasks,
    )
    {
    }
}
