<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
   public function index($id){
    $order=Order::findOrFail($id);
    return view ('Front.checkout',compact('order'));
   }
}
