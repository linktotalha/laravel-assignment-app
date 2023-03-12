<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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
        // Mail::to('admin@admin.com')->send(new NotificationMail());

        return response([
           "user"=>$user,
           "accessToken"=>$accessToken
        ]);
    }
    public function getSingleCategory($id){
        $category = Category::find($id);
        if($category){
            return response()->json(['category'=>$category]);
        }else {
            return response()->json(['category'=>'No Category found']);
        }
    }
    public function getAllCategories(){
        $categories = Category::paginate(10);
        if($categories){
            return response()->json(['categories'=>$categories]);
        }else {
            return response()->json(['categories'=>'No Categories found']);
        }   
    }
    public function getSingleProduct($id){
        $product = Product::with('images','categories')->find($id);
        if($product){
            return response()->json(['product'=>$product]);
        }else {
            return response()->json(['product'=>'No Category found']);
        }
    }
    public function getAllProducts(){
        $products = Product::with('images','categories')->paginate(10);
        if($products){
            return response()->json(['products'=>$products]);
        }else {
            return response()->json(['products'=>'No Products found']);
        }
    }
}
