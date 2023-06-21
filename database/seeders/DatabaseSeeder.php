<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        $this->call(AdminUserSeeder::class);

        User::factory()->create([
             'name' => 'TestUser',
             'email' => 'test@ehb.be',
             'password' => 'Start123',
            ]);

        $this->call(ProductsSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
