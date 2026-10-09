<?php

namespace App\Http\Requests\Course;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdateCourseDto extends Data
{
    public function __construct(
        public string $name,
        #[Min(0)]
        public ?int   $totalTasks = 0,
    )
    {
    }
}
