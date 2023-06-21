<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.login');
    }

    public function store(Request $request)
    {
        $login = $request->only('email','password');
        if (auth::attempt($login, $request->has('remember')) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/index');
    }

    public function forgotPassword()
    {
        return view('sessions.resetPasswReq');
    }

    public function sendResetLink(Request $request)
    {
        // Hier moet een mail gestuurd worden met de reset link maar dit werkt enkel wanneer
        // een geldig email account geconfigureerd is in .env (SMTP-deel)
        return back()->with('success', 'A link will be sent to your email to reset your password.');
    }

    public function resetPassword(Request $request)
    {
        // na click op verzonden reset link, is email in $request beschikbaar
        return view('sessions.resetPassword')->with(['email' => $request->email ]);
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::find('email','=',$request->email);
        $user->password = $request->password;
        $user->save();
    }

    public function destroy()
    {
        auth::logout();
        
        return redirect()->to('/index');
    }
}
