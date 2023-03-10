<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Mediaable;
use App\Models\Category;
use Validator;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    public function postCreate(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image'=>'required|max:2048',
            'desc'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }

        $product = Product::create([
            'name'=>$req->name,
            'price'=>$req->price,
            'desc'=>$req->desc,
            'user_id'=>Auth::id()
        ]);

        foreach($req->category as $category){
            $product->categories()->create([
                'category_id'=>$category
            ]);
        }
        

        // multiple images
        foreach($req->image as $image){
            $imageName = Str::random(4).time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $product->images()->create([
                'product_id'=>$product->id,
                'image'=>$imageName
            ]);
        }

        
        return response()->json(["message"=>"Data added Successfully"]);
    }

    public function list() {
        $products = Product::with('categories')->get();
        // dd($products[0]->categories->toArray());
        return response()->json(['data'=>$products]);
    }
    public function delete(Request $req) {
        $product = Product::find($req->id);
        foreach($product->images()->get() as $image){
            if(File::exists(public_path('images').$image->image)){
                File::delete(public_path('images').$image->image);
            }
        }
        $product->categories()->delete();
        $product->images()->delete();
        $product->delete();
        return response()->json(['message'=>"Data deleted successfully"]);
    }

    public function edit(Request $req){
        $product = Product::with('categories','images')->get();
        $categories = Category::all();
        return response()->json(['product'=>$product]);
    }

    public function postEdit(Request $req){
        $data = $req->all();
        $product = Product::find($req->edit_id);
        // return $product->categories()->get();
        if(isset($data['edit_category'])){
            $product->categories()->update($data['edit_category']);
        }
        return $product;
        // $category->update([
        //     'name'=>$req->edit_name,
        //     'desc'=>$req->edit_desc
        // ]);
        // return response()->json(['message'=>'Data updated successfully']);
    }
}
