<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Where action users after login.
     *
     * @var string
     */
    public function authenticated()
    {
        switch (Auth::user()->jabatan) { // jabatan ini dia ambil dari user yg sedang login dan memilih ke table jabatan
            case '1':
                return redirect()->route('home'); // ini untuk dia redirect kemana jikalau user dengan hak akses admin
                break;
            case '2':
                return redirect()->route('welcome'); // ini untuk dia redirect kemana jikalau user dengan hak akses pengguna
                break;
        }
        return redirect('/home'); // ini default jika value / nomor jabatan user tidak masuk ke salah satu yg diatas dia otomatis ke sini
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('welcome');
    }
}
