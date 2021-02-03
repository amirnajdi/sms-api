<?php

namespace Database\Seeders;

use App\Models\SmsLog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for ($i = 1; $i <= 1000; $i++) {
            SmsLog::factory(10000)->create();
            dump('done part ' . $i);
        }
    }
}
