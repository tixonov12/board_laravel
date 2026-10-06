<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Course::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->unsignedSmallInteger('completed_tasks')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};
