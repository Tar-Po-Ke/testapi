<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if($user->id) {
            return response()->json(['success' => true, 'user' => $user]);
        }

        return response()->json(['error' => true, 'error_msg' => 'Registration Fail !']);
    }
}