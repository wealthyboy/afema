<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::factory()->count(1)->create();
    }
}
