<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Attempt to log the user into the application.
     * Custom password fail response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function attemptLogin(Request $request){
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {
            if (\Hash::check($request->password, $user->password)) {
                return $this->guard()->attempt(
                    $this->credentials($request), $request->filled('remember')
                );
            }

            throw ValidationException::withMessages([
                'password' => ['Senha não coincide com o usuário.']
            ]);
        }
        
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
}
