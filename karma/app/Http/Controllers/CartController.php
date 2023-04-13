<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        if(auth()->check()){
            $cart=session()->get('cart');
           // dd($cart);
           if(!$cart){
            $cart=[];}
            return view('Front.cart',compact('cart'));}
        else
        return redirect()->route('signin');

    }

    public function add($id){
   $product=Product::findOrFail($id);
   $cart=session()->get('cart');
   if(!$cart){
    $cart=[];}


    if(array_key_exists($product->id,$cart)){
        $cart[$product->id]['quntity']++;
    }
    else{
        $cart[$product->id]=[
            'name'=>$product->name,
            'price'=>$product->price,
            'quntity'=>1,
            'image'=>$product->image,
            'id'=>$product->id
        ];
    }
    session()->put('cart',$cart);
    return redirect()->back()->with('success','product added to cart successfully!');
   }

}
