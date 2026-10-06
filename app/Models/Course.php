<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $guarded = ['id'];

    protected function completedTasks(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->pivot?->completed_tasks ?? 0,
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('completed_tasks');
    }
}
