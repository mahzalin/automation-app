<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('panel.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $inputs = $request->all();

        if (!empty(User::query()->where('email', $inputs['email'])->first())) {

            return view('panel.auth.register')
                ->with('message', 'Email exist');
        }

        $user = User::query()->create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
        ]);

        $accessToken = $user->createToken('AuthToken')->accessToken;

        $user->update([
            'token' => $accessToken->token,
        ]);

        setcookie("access_token", $accessToken->token);

        return redirect('/automation')->withCookie(cookie()->forever('access_token', $accessToken->token));
    }
}
