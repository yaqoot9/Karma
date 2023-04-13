<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeContrller extends Controller
{

    public function index(){ return view('Front.index');}



    public function category(Request $req)
    {  $queryParams=$req->query();
        $categories=category::with('children')->whereNull('parent_id')->where('status',true)->get();
        $products=Product::query();
        if(isset($queryParams['category'])){
        $products=$products->where('category_id',$queryParams['category']);}
        $products=$products->where('status',true)->get();
        return view ('front.category',compact('categories','products'));
    }

    public function signin(){
        return view('Front.auth.signin');
    }


    public function signup(){
        return view('Front.auth.signup');
    }

    public function products($id){
        $products=Product::findOrFail($id);
       return view('Front.single-product',compact('products'));
    }
}
