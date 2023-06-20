<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'naam' => 'theepot',
            'categorie' => 'servies',
            'omschrijving' => 'antieke theepot',
            'prijs' => 49,
            'image' => 'C:\Projects\Laravel_MyWebShop\public\storage\images\theepot.jpg',
            'user' => 2,
        ]);

        Product::create([
            'naam' => 'bord',
            'categorie' => 'servies',
            'omschrijving' => 'antiek bord',
            'prijs' => 39,
            'image' => 'C:\Projects\Laravel_MyWebShop\public\storage\images\bord.jpg',
            'user' => 2,
        ]);

        Product::create([
            'naam' => 'bordje',
            'categorie' => 'servies',
            'omschrijving' => 'antiek bordje, beetje kapot',
            'prijs' => 19,
            'image' => 'C:\Projects\Laravel_MyWebShop\public\storage\images\antiekbord.jpg',
            'user' => 2,
        ]);

        Product::create([
            'naam' => 'soepkom',
            'categorie' => 'servies',
            'omschrijving' => 'chinees soepkommetje',
            'prijs' => 29,
            'image' => 'C:\Projects\Laravel_MyWebShop\public\storage\images\soepkom.jpg',
            'user' => 2,
        ]);
    }
}
