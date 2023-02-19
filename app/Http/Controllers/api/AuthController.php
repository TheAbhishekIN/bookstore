<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('myApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User logged in successfully.'
            ];

            return response()->json([
                    'success' => true,
                    'data' => $success,
                    'message' => 'User logged in successfully.'
                ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.'
            ], 200);
        }

    }
}
