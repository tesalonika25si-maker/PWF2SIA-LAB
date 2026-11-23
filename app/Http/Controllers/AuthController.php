<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
		public function index()
		{
		    if (Auth::check()) {
		        return redirect()->route('dashboard');
		    }

		    return view('auth.login');
		}

        function login(Request $request)
        {
            $credentials = $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Data tambahan ini terpisah dari status autentikasi
                session(['last_login' => now()]);
            }
        }
        function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('auth.index');
        }
    }
