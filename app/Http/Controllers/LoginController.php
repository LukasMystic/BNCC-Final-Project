<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            if ($remember) {
                $cookie = cookie('remember_me', true, config('session.remember_me_lifetime') / 60);
                return Auth::user()->name == "admin" ? redirect()->route('admin.home')->cookie($cookie) : redirect()->route('home')->cookie($cookie);
            }
    
            return Auth::user()->name == "admin" ? redirect()->route('admin.home') : redirect()->route('home');
        }
    
        return redirect()->back()->withErrors([
            'error' => 'Invalid Credentials!'
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
