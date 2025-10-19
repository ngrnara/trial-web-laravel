<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // 1. Ambil password asli (ini adalah 'pwd')
    $passwordAsli = $data['password'];

    // 2. Buat 'salt_value' (nilai salt, berbeda tiap user)
    $salt = Str::random(16); 

    // 3. Buat 'pwd_enkrip' (nilai pwd yang dienkrip)
    $passwordEnkripsi = Crypt::encryptString($passwordAsli);

    // 4. Buat 'hash_value' (hasil hashing dari password)
    //    Kita anggap ini 'hash_dari_enkripsi' sesuai tabelmu
    $hashDariPassword = hash('sha256', $passwordAsli); 

    // 5. Buat 'final_hash' (hasil hashing dari pwd + salt)
    $finalHash = Hash::make($passwordAsli . $salt);

    // Simpan semua data ke database
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // Kolom password Bawaan Laravel (wajib diisi agar tidak error)
        'password' => Hash::make($passwordAsli), 

        // === Kolom-kolom untuk Challenge ===
        'password_asli' => $passwordAsli,
        'password_enkripsi' => $passwordEnkripsi,
        'hash_dari_enkripsi' => $hashDariPassword,
        'salt_value' => $salt,
        'final_hash' => $finalHash,
        ]);
    }
    public function register(Request $request)
{
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    // $this->guard()->login($user); // <-- INI DIA YANG DI-NONAKTIFKAN

    if ($response = $this->registered($request, $user)) {
        return $response;
    }

    // Arahkan ke halaman login dengan pesan sukses
    return redirect('/login')->with('status', 'Registrasi berhasil! Silakan login.');
}
}
