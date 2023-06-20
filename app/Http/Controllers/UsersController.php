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
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth::login($user);
        
        return redirect()->to('/about');
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

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->birthday = $request->birthday;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $user->avatar = file_get_contents($file->getRealPath());
        }
        $user->save();
        
        return redirect()->to('/about');
    }
 
    public function admin()
    {
        return view('admin');
    }
}
