<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
{
    //dd($request->all(),session()->get('cart'));
$order=order::create([

    'user_id'=>auth()->user()->id,
    'amount'=>$request->amount,

]);
$items=[];
foreach(session()->get('cart') as $item){
    $items[]=[
        'product_id'=>$item['id'],
        'quentity'=>$item['quntity']
    ];
}

$order->item()->createMany($items);
session()->forget('cart');
return redirect ()->route('checkout',$order->id)->with('success','Oredr has been added successflly');

}
}
