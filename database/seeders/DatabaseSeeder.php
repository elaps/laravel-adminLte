<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Track;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserLesson;
use App\Models\UserTrack;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => '11111111',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => '11111111',
        ]);
        Company::factory(5)->create();
        Module::factory(50)->create();
        Track::factory(100)->create();

        Lesson::factory(200)->create();
        UserTrack::factory(5)->create();
        UserLesson::factory(20)->create();
    }
}
