<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use Validator;

class frontendController extends Controller
{
    public function categoryList()
    {
        $categories = Category::all();
        return view('frontend.categories-list', compact('categories'));
    }

    public function categoryproducts($id)
    {
        $cat_pro = Category::find($id)->products;
        return view('frontend.category-products', compact('cat_pro'));
    }
    public function productdetails($id)
    {
        $product = Product::with('images', 'categories')->find($id);
        return view('frontend.product-detail', compact('product'));
    }
    public function addcomment(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        Comment::create([
            'comment' => $req->comment,
            'user_id' => Auth::id(),
            'product_id' => $req->pro_id,
        ]);
        return response()->json(['message' => 'Comment Added Successfully']);
    }
    public function showComments($id)
    {
        $comments = Comment::with('users')->where('product_id', $id)->get();


        return response()->json(['comments'=>$comments]);
    }
}
