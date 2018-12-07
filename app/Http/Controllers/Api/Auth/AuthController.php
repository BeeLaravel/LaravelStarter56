<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\Auth\RegisterFormRequest;

class AuthController extends Controller {
    public function register(RegisterFormRequest $request) {
	    $user = new User;
	    $user->email = $request->email;
	    $user->name = $request->name;
	    $user->password = bcrypt($request->password);
	    $user->save();

	    return response([
	        'status' => 'success',
	        'data' => $user
	    ], 200);
	}
}
