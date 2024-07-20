<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Toy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    // Display the home page with a list of toys
    public function index()
    {
        $toys = Toy::take(16)->orderBy('price', 'desc')->get();
        return view('index', compact('toys'));
    }

    // Display the menu page with paginated toys
    public function menu()
    {
        $toys = Toy::paginate(20);
        $categories = Category::all();
        return view('nav.menu', compact('toys', 'categories'));
    }

    // Display the about page
    public function about()
    {
        return view('nav.about');
    }

    // Display the login page
    public function login()
    {
        return view('auth.login');
    }

    // Display the registration page
    public function register()
    {
        return view('auth.register');
    }

    // Display the admin dashboard with all toys and categories
    public function admin()
    {
        $toys = Toy::all();
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }

    // Filter toys by category for the admin dashboard
    public function filter(Category $category)
    {
        $toys = $category->id ? Toy::where("category_id", $category->id)->get() : Toy::all();
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }

    // Handle user login with remember me functionality
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return Auth::user()->name == "admin" ? redirect()->route('admin.home') : redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'error' => 'Invalid Credentials!'
        ]);
    }
    
    // Filter toys by category for the user menu
    public function menuFilter(Category $category)
    {
        $toys = $category->id ? Toy::where("category_id", $category->id)->paginate(20) : Toy::paginate(20);
        $categories = Category::all();
        return view('nav.menu', compact('toys', 'categories'));
    }

    // Handle user registration
    public function userRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login');
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    // Search for toys by keyword
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $toys = Toy::where("name", "like", "%$keyword%")->get();
        return view('index', compact('toys'));
    }
}
