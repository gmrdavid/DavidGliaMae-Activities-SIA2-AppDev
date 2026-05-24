<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@hulyanas.com',
        'password' => bcrypt('admin123'),
        'is_admin' => true,
    ]);
}
}
