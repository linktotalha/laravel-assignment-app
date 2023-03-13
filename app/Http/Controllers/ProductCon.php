<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Mediaable;
use App\Models\Category;
use App\Models\Image;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class ProductCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'user_id'=>Auth::id()
        ]);

        foreach($request->category as $category){
            $product->categories()->attach($category);
        }


        // multiple images
        foreach($request->image as $image){
            $imageName = time().Str::random(4)."_".$image->extension();
            $image->move(public_path('images'),$imageName);
            $image = Image::create(['image' => $imageName]);
            $product->images()->attach($image);
        }

        
        return response()->json(["message"=>"Data added Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('categories','images')->get();
        $categories = Category::all();
        return response()->json(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $product->update([
            'name'->$request->edit_name,
            'price'=>$request->edit_price,
            'desc'->$request->edit_desc
        ]);

        foreach($request->category as $cat){
            $product->categories()->sync($cat);
        }
        // $pro_cat = ProductCategory::where('product_id',$product->id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        foreach($product->images()->get() as $image){
            if(File::exists(public_path('images/').$image->image)){
                File::delete(public_path('images/').$image->image);
            }
        }
        $product->categories()->detach();
        $product->images()->detach();
        $product->delete();
        return response()->json(['message'=>"Data deleted successfully"]);
    }

    public function getAllProducts(){
        return  DataTables::of(Product::query())->make(true);
    }
}
