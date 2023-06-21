<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\News;

class AdminController extends Controller
{
    public function users()
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $users = User::all();
            return view('admin.users', ['users' => $users]);
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function addUser()
    {
        if (auth::check() && auth()->user()->isAdmin()){
            return view('admin.addUser');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }  

    public function storeUser(Request $request)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $user = auth::user();

            //check of de minimale invoer correct aanwezig is
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            //user creeren in tabel
            $user = User::create(request(['name', 'email', 'password']));

            if ($request->has('isAdmin') == true) {
                Admin::addUser($user->id);
            }
        
            return redirect('/users');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }
 
    public function deleteUser($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            User::where('id', $id)->delete();
            return redirect('/users');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function toggleAdmin($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $user = User::find($id);
            if ($user->isAdmin()) {
                Admin::removeUser($id);
            }
            else {
                Admin::addUser($id);
            }
            return redirect('/users');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function addFaq()
    {
        if (auth::check() && auth()->user()->isAdmin()){
            return view('admin.addFaq');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function editFaq($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $faq = Faq::find($id);
            return view('admin.editFaq', compact('faq'));
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function updateFaq(Request $request)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $request->validate([
                'categorie' => 'required',
                'vraag' => 'required',
                'antwoord' => 'required',
            ]);
        
            $faq = Faq::find($request->id);
            $faq->categorie = $request->input('categorie');
            $faq->vraag = $request->input('vraag');
            $faq->antwoord = $request->input('antwoord');
            $faq->save();

            return redirect('/faq');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    } 

    public function storeFaq(Request $request)
    {
        if (auth::check() && auth()->user()->isAdmin()){

            //check of de minimale invoer correct aanwezig is
            $request->validate([
                'categorie' => 'required',
                'vraag' => 'required',
                'antwoord' => 'required'
            ]);

            //faq creeren in tabel
            $faq = Faq::create(request(['vraag', 'antwoord', 'categorie']));
            $faq->save();

            return redirect('/faq');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }
 
    public function deleteFaq($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            Faq::where('id', $id)->delete();

            return redirect('/faq');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function addNews()
    {
        if (auth::check() && auth()->user()->isAdmin()){
            return view('admin.addNews');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function editNews($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $news = News::find($id);
            return view('admin.editNews', compact('news'));
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }

    public function updateNews(Request $request)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'publishing_date' => 'required',
            ]);
        
            $news = News::find($request->id);
            $news->title = $request->input('title');
            $news->content = $request->input('content');
            $news->publishing_date = $request->input('publishing_date');
            if ($request->hasFile('filename')) {
                $news->image = $request->input('filename')->store('public/images'); }
            $news->save();

            return redirect('/news');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    } 

    public function storeNews(Request $request)
    {
        if (auth::check() && auth()->user()->isAdmin()){

            //check of de minimale invoer correct aanwezig is
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'publishing_date' => 'required'
            ]);

            //faq creeren in tabel
            $news = News::create(request(['title', 'content', 'publishing_date']));
            $news->save();

            return redirect('/news');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }
 
    public function deleteNews($id)
    {
        if (auth::check() && auth()->user()->isAdmin()){
            News::where('id', $id)->delete();

            return redirect('/news');
        }
        return redirect()->back()->withErrors('Error',"Unauthorized action!");
    }
}
