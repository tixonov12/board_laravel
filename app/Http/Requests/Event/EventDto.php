<?php

namespace App\Http\Requests\Event;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class EventDto extends Data
{
    public function __construct(
        public string  $title,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i')]
        public Carbon  $start,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i')]
        public ?Carbon $end,
        public ?string $color,
    )
    {
    }
}
