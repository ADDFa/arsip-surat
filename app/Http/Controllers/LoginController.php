<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (session('login')) return redirect()->back();
        return view('login');
    }

    public function entry(Request $request)
    {
        $credential = Credential::all()->where('username', '=', $request->username)->first();

        $infoLoginFail = [
            'status'    => 400,
            'message'   => 'Username atau Password Salah!'
        ];

        if (!$credential) return redirect('/')->with($infoLoginFail);
        if (!password_verify($request->password, $credential->password)) return redirect('/')->with($infoLoginFail);

        $user = User::all(['name', 'avatar', 'role', 'id'])->where('id', '=', $credential->user_id)->first()->toArray();
        $user += ['username' => $credential->username];

        $infoLoginSuceess = [
            'login' => true,
            'user'  => (object) $user
        ];

        $request->session()->put($infoLoginSuceess);
        return redirect('/beranda');
    }

    public function exit()
    {
        session()->flush();
        return redirect('/');
    }
}
