<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;

class ApiController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required | unique:users",
            "password"=>"required | min:6"
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()]);
        }

        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);
        $accessToken = $user->createToken('authToken')->plainTextToken;

        return response([
           "user"=>$user,
           "accessToken"=>$accessToken
        ]);
    }
}
