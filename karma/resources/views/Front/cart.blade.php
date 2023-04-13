@extends('front.layout.master')

	@section('content')
   <!--================Cart Area =================-->
   <section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form method="post" action="{{Route('order')}}">
                    @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                        $total=0;
                       @endphp

                        @forelse($cart as $item)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/cart.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$item['name']}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{$item['price']}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input disabled type="text" name="qty" id="sst" maxlength="12" value="{{$item['quntity']}}" title="Quantity:"  class="input-text qty">

                                </div>
                            </td>
                            <td>
                                <h5>{{$item['price']*$item['quntity']}}</h5>
                            </td>
                              @php
                              $total+=$item['price']*$item['quntity'];
                              @endphp
                        </tr>
                       @empty

                       @endforelse


                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{$total}}</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>

                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <input type="hidden" name="amount" value="{{$total}}">
                                    <button class="primary-btn" type="submit">Proceed to checkout</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->


    @endsection

