<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function create() {
        return view('categories.create');
    }

    public function postCreate(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'desc'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }

        Category::create([
            'name'=>$req->name,
            'desc'=>$req->desc,
            'user_id'=>Auth::id()
        ]);
        return response()->json(['message'=>"Data created successfully"]);
    }
    public function list() {
        $categories = Category::all();
        return response()->json(['data'=>$categories]);
    }

    public function delete(Request $req){
        $category = Category::find($req->id);
        $category->delete();
        return response()->json(['message'=>"Data deleted successfully"]);
    }

    public function edit(Request $req) {
        $category = Category::find($req->id);
        return response()->json(['category'=>$category]);
    }
    public function postEdit(Request $req){
        $category = Category::find($req->edit_id);
        $category->update([
            'name'=>$req->edit_name,
            'desc'=>$req->edit_desc
        ]);
        return response()->json(['message'=>'Data updated successfully']);
    }
}
