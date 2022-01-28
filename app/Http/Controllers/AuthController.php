<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    // login view
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $ingat = (bool)$request->rememberMe;

        if (Auth::attempt([
            $field => $request->email,
            'password' => $request->password,
        ], $ingat)) {
            return redirect('/');
        }
        return redirect('/login')->with('status', 'password anda salah');
    }

    //register view
    public function register()
    {
        return view('auth.register');
    }

    //register
    public function postregister(Request $request)
    {
        if ($request->agreeterm == true) {
            $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($request->password == $request->password2) {

                $user = new User;
                $user->role = 'user';
                $user->username = $request->username; // mengambil dari requst name="nama
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(60);
                $user->save();

                $request->request->add(['user_id' => $user->id, 'nama' => $request->nama]);
                Profile::create($request->all());

                return redirect('/login');
            } else {
                return redirect('/register')->with('status', 'Password yang anda masukan tidak sama');
            }
        } else {
            return redirect('/register')->with('status1', 'Anda harus mecentang persyaratan terlebih dahulu');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
