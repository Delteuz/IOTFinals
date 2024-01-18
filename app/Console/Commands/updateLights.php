<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class updateLights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:lights';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedule task table for the lights';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get today's date
        $today = Carbon::now()->toDateString();

        // Fetch all schedules for today
        $schedules = DB::table('schedule_lights')
            ->whereDate('schedule', $today)
            ->get();

        foreach ($schedules as $schedule) {
            // Update the light status
            DB::table('bulb_statuses')
                ->where('id', $schedule->pinID)
                ->update(['status' => $schedule->setTo]);
        }
        // Delete the scheduler on the specific pin
        DB::table('schedule_lights')
            ->whereDate('schedule', '<=', $today)
            ->update(['schedule' => NULL]);
    }
}
