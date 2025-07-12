<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('flat')]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);
    }
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        $login = $request->input('username');
        $user = User::where('email', $login)->orWhere('username', $login)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['username' => 'Invalid login credentials']);
        }

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
            Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
            Auth::loginUsingId($user->id);
            return redirect(route('home'));
        } else {
            return redirect()->back()->withErrors(['password' => 'Invalid login credentials']);
        }
    }
}
