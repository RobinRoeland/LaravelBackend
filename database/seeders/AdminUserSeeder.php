<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'email_verified_at' => now(),
            'password' => 'Password!321',
        ]);

        Admin::create([
            'user_id' => User::where('email', '=', 'admin@ehb.be')->first()->id,
        ]);
    }
}
