<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{  
    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        //check of de minimale invoer correct aanwezig is
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //user creeren in tabel
        $user = User::create(request(['name', 'email', 'password']));
        
        //meteen ook inloggen
        auth::login($user);
        
        return redirect()->to('/index');
    }

    public function profile()
    {
        $user = auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = auth::user();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = auth::user();

        //check of de minimale invoer correct aanwezig is
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //user updaten in tabel
        $user->name = $request->name;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->birthday = $request->birthday;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $user->avatar = file_get_contents($file->getRealPath());
        }
        $user->save();
        
        return redirect()->route('profile', [$user]);
        //return redirect()->to('/about');
    }
 }
