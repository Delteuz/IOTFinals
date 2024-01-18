<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BulbStatus;
use App\Models\ScheduleLights;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        ///////////////////////////////////////////
        // BulbStatus::create([
        //     'status' => 'OFF',
        // ]);

        /////////////////////////////////////////////////////
        ScheduleLights::create([
            'pinID' => 4,
            'setTo' => 'OFF',
            'schedule' => '2024-01-15 10:59:55',
        ]);
    }
}
