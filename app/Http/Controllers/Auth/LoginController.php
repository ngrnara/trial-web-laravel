<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    protected $redirectTo = 'dashboard/admin';

    public function login(Request $request)
{
    $this->validateLogin($request);

    // 1. Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // 2. Jika user tidak ada, atau tidak punya salt/final_hash, gagal
    if (!$user || !$user->salt_value || !$user->final_hash) {
        return $this->sendFailedLoginResponse($request);
    }

    // 3. Ambil data yang diperlukan
    $passwordFromForm = $request->password;
    $saltFromDB = $user->salt_value;
    $finalHashFromDB = $user->final_hash;

    // 4. Verifikasi sesuai instruksi challenge (Poin 3)
    // Cek apakah (password_form + salt_db) cocok dengan final_hash_db
    if (Hash::check($passwordFromForm . $saltFromDB, $finalHashFromDB)) {
        
        // 5. Jika cocok, loginkan user
        Auth::login($user, $request->boolean('remember'));
        return $this->sendLoginResponse($request);
    }

    // 6. Jika tidak cocok, gagalkan login
    return $this->sendFailedLoginResponse($request);
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
