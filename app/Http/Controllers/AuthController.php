<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller {
    
    public function auth(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'password' => 'required']);
        
        $user = User::where('email', $request->input('email'))->first();
        if((isset($user->id)) && Hash::check($request->input('password'), $user->password))
        {
            $apiToken = base64_encode(str_random(1028));
            User::where('email', $request->input('email'))->update(["api_token" => "$apiToken"]);
            return response()->json(['api_token' => $apiToken]);
        }
        else
        {
            return response()->json(['error' => 'Invalid username or Password']);
        }
    }
    
    public function user(Request $request)
    {
        $user = Auth::user();
        return $user;
    }
}
