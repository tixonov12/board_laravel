<?php

namespace App\Services\Course\Enums;

enum ChangeCompletedTaskEnum: string
{
    case ADD = 'add';
    case REMOVE = 'remove';
}
