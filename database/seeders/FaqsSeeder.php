<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Admin;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'vraag' => 'Hoe kan ik een product bekijken?',
            'antwoord' => 'Door naar de lijst van producten te gaan en op Detail te klikken',
            'categorie' => 'Product',
        ]);
        Faq::create([
            'vraag' => 'Waar kan ik mijn profiel bekijken?',
            'antwoord' => 'Wanneer je ingelogd bent kan je op Hi <usernaam> klikken',
            'categorie' => 'User',
        ]);
   }
}
