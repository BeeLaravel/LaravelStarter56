<?php
namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    use AuthenticatesUsers;

    protected $redirectTo = '/backend/links';
    protected $logoutRedirectTo = '/backend/login';

    public function __construct() {
        $this->middleware('guest:backend')->except('logout');
    }

    public function showLoginForm() {
        $style = [
            'body-class' => 'flex-row align-items-center',
        ];
        return view('backend.auth.login', compact('style'));
    }
    public function logout(Request $request) {
        $this->guard('backend')->logout();

        // $request->session()->invalidate();

        return redirect($this->logoutRedirectTo);
    }
    protected function guard() {
        return Auth::guard('backend');
    }
}
