<?php

namespace App\Http\Controllers;
use App\Models\Faq;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        return view('main.welcome');
    }
    public function about()
    {
        return view('main.about');
    }
    public function news()
    {
        return view('main.news');
    }
    public function faq()
    {
        $faqs = Faq::all()->sortBy('categorie',);
        return view('main.faq', ['faqs' => $faqs]);
    }
    public function index()
    {
        return view('main.index');
    }
   //
}
