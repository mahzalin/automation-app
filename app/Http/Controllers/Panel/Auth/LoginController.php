<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('panel.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if (empty($user) || !Hash::check($request->get('password'), $user->password)) {
            return view(
                'auth.login',
                [
                    'error' => 'User not found!',
                    'error_type' => 'danger',
                ]
            );
        }

        $accessToken = $user->createToken('AuthToken')->accessToken;

        $user->update([
            'token' => $accessToken->token,
        ]);

        setcookie("access_token", $accessToken->token);

        return redirect('/automation')->withCookie(cookie()->forever('access_token', $accessToken->token));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
