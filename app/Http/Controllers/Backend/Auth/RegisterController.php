<?php
namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\RBAC\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    use RegistersUsers;

    protected $redirectTo = '/backend/links';

    public function __construct() {
        $this->middleware('guest');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:rbac_users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistrationForm() {
        $style = [
            'body-class' => 'flex-row align-items-center',
        ];
        return view('backend.auth.register', compact('style'));
    }
}
