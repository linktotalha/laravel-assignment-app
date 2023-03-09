<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Mediaable;
use Validator;

class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }

    public function postCreate(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'image'=>'required|max:2048',
            'desc'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }

        // return response()->json(["message"=>"hello"]);

        $product = Product::create([
            'name'=>$req->name,
            'price'=>$req->price,
            'desc'=>$req->desc,
            'user_id'=>Auth::id()
        ]);

        foreach($req->image as $image){
            $product->images()->create([
                'product_id'=>$product->id,
                'image'=>$image
            ]);
        }
    }
}
