<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function forbidden()
    {
        return view('forbidden.forbidden');
    }
    public function index()
    {
        return view('cashier.home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(\Illuminate\Http\Request $request)
    {

        //validate the form
        $this->validate($request, [
            'email' =>  'required|email',
            'password' => 'required|min:4'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user()->role;
            if ($user == '1') {
                return \redirect()->route('admin.home');
            } else {
                return \redirect()->route('cashier.home');
            }
        } else {
            Auth::logout();
            return \redirect()->route('login')->withErrors(['email' => 'failed login']);
        }
    }
    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        return \redirect()->route('login');
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        return $user->name;
    }
}
