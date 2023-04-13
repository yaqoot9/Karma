<?php

namespace App\Http\Controllers\pyment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use App\Models\order;

class PaypalController extends Controller
{
   public function create($order_id){
    $order=order::findOrFail($order_id);
    $client=app('paypal.client');

$request = new OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
                     "intent" => "CAPTURE",
                     "purchase_units" => [[
                         "reference_id" => $order->id,
                         "amount" => [
                             "value" => $order->amount,
                             "currency_code" => "USD"
                         ]
                     ]],
                     "application_context" => [
                          "cancel_url" => route('paypal.cancel',$order_id),
                          "return_url" => route('paypal.return',$order_id)
                     ]
                 ];


try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    if($response->statusCode==201){
        foreach($response->result->links as $link)
        {
            if($link->rel=='approve')
            return redirect()->away($link->href);
        }
    }

    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
   }


   public function callback(Request $request,$orderid){
    $client=app('paypal.client');
    $order=order::findOrFail($orderid);
    $token=$request->query('token');
    $request = new OrdersCaptureRequest($token);
$request->prefer('return=representation');
try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);

    if($response->statusCode==201 && $response->result->status=='COMPLETED'){
        $order->update(
            [
                'status'=>'completed'
            ]
            );
            return redirect()->route('front.index')->with('success','Order completed successfully!');
    }
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
   }

   public function cancel($orderid){
    $order=order::findOrFail($orderid);
    $order->update([
     'status'=>'canceld',
    ]);
    return redirect()->route('front.index')->with('success','order canceld');
   }
}
