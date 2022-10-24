<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Str;
use App\User;
use Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request) {
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = User::findOrfail(Auth::user()->id);

            $user->token = bcrypt(Str::random(40));

            $user->save();
            
            return redirect('/home');
        } else {
            return redirect()->back()->with('error', 'Username atau password tidak sesuai');
        }
    }
}
