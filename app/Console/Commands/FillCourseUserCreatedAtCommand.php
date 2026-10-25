<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FillCourseUserCreatedAtCommand extends Command
{
    protected $signature = 'course-user:fill-created-at';

    protected $description = 'Fill created_at field for all course_user records with unique timestamps';

    public function handle(): int
    {
        $this->info('Starting to fill created_at for course_user records...');

        $records = DB::table('course_user')
            ->whereNull('created_at')
            ->orderBy('id')
            ->get(['id']);

        if ($records->isEmpty()) {
            $this->info('No records to update.');

            return self::SUCCESS;
        }

        $baseTime = now();
        $bar = $this->output->createProgressBar($records->count());
        $bar->start();

        DB::beginTransaction();

        try {
            foreach ($records as $index => $record) {
                DB::table('course_user')
                    ->where('id', $record->id)
                    ->update([
                        'created_at' => $baseTime->copy()->addSeconds($index + 1)
                    ]);

                $bar->advance();
            }

            DB::commit();
            $bar->finish();

            $this->newLine();
            $this->info("Successfully updated {$records->count()} records.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error updating records: ' . $e->getMessage());

            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}
