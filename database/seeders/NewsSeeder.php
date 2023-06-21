<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'New products available',
            'content' => 'Added some interesting products',
            'publishing_date' => Carbon::parse('2023-06-17'),
        ]);
        News::create([
            'title' => 'Progress laravel project',
            'content' => 'Updated the layouts to enable profile view',
            'publishing_date' => Carbon::parse('2023-06-14'),
        ]);
   }
}
