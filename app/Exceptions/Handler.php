<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Encryption\DecryptException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    public function render($request, Throwable $exception)
    {
        // Jika gagal dekripsi cookie (cookie session korup / APP_KEY beda)
        if ($exception instanceof DecryptException) {
            // bersihkan cookie session agar tidak terus memicu error
            $cookieName = config('session.cookie'); // biasanya "laravel_session"
            // redirect ke halaman awal / login dan hapus cookie via response
            return redirect()->route('login')
                     ->with('error', 'Sesi tidak valid, silakan login kembali.')
                     ->withCookie(cookie()->forget($cookieName));
        }

        // Jika CSRF token mismatch -> redirect ke login atau halaman awal
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('login')
                     ->with('error', 'Sesi habis. Silakan login ulang.');
        }

        return parent::render($request, $exception);
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
