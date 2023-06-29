<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\important;
use App\Models\notes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = user::factory(20)->create();

        foreach ($users as $user) {
            important::factory()->create([
                'user_id' => $user->id
            ]);
        }

        foreach ($users as $user) {
            notes::factory()->create([
                'user_id' =>$user->id
            ]);
        }
    }
}
