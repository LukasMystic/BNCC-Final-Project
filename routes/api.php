<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Test
Route::get("test", function(){
    return response()->json([
        "message" => "Hello World"
    ]);
});

// Register
Route::post("register", function(Request $request) {
    try {
        $user = User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => bcrypt($request->input("password"))
        ]);
        $access_token = $user->createToken("user_token")->plainTextToken;
        return response()->json([
            "message" => "User has been created",
            "access_token" => $access_token,
            "data" => $user->name
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "message" => $e->getMessage()
        ], 500);

    } catch (\Exception $e) {
        return response()->json([
            "message" => $e->getMessage()
        ], 500);
    }
});
// Login
Route::post("login", function(Request $request) {
    $credentials = $request->only(["email", "password"]);
    if (auth()->attempt($credentials)) {
        $user = User::where("email", $request->input("email"))->first();
        $access_token = $user->createToken("user_token")->plainTextToken;
        return response()->json([
            "message" => "User has been logged in",
            "access_token" => $access_token,
            "data" => $user->name
        ]);
    }
    return response()->json([
        "message" => "Unauthorized"
    ], 401);
});

// Profile
Route::middleware("auth:sanctum")->get("profile", function(Request $request) {
    return response()->json([
        "message" => "Profile",
        "data" => auth()->user()->name
    ]);
});

// Loogut
Route::middleware("auth:sanctum")->post("logout", function(Request $request) {
    $request->user()->tokens()->delete();
    return response()->json([
        "message" => "User has been logged out"
    ]);
});
