<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Quality;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->hasProfile()
            ->hasProjects(8)
            ->hasQualities(4)
            ->hasTools(6)
            ->create();
    }
}