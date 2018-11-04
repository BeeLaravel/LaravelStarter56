<?php

namespace App\Http\Controllers\Office\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/office';
    protected $logoutRedirectTo = '/office/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:office')->except('logout');
    }

    public function showLoginForm()
    {
        $style = [
            'body-class' => 'bg-white',
        ];
        return view('admin.auth.login_v3', compact('style'));
    }

    public function logout(Request $request)
    {
        $this->guard('office')->logout();

        $request->session()->invalidate();

        return redirect($this->logoutRedirectTo);
    }
    protected function guard()
    {
        return Auth::guard('office');
    }
}
