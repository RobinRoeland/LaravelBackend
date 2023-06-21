<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Faq;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        return view('main.welcome');
    }

    public function index()
    {
        return view('main.index');
    }

    public function about()
    {
        return view('main.about');
    }

    public function news()
    {
        $news = News::all();//->sortBy('publishing_date', SORT_DESC);
        return view('main.news', ['news' => $news]);
    }

    public function faq()
    {
        $faqs = Faq::all()->sortBy('categorie',);
        return view('main.faq', ['faqs' => $faqs]);
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function addContact()
    {
        return view('main.index');
    }
}
