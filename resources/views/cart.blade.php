@extends('layouts.appecom')

@section('content')
<style>
    .btnn{
        padding: 7px!important;
    border: none;
    width: 200px;
    }
</style>
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('products') }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img style="width: 100px;" src="{{ $item->attributes->image }}" alt="">
                                    <h5>{{ $item->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ $item->price }}
                                </td>
                                <td class="shoping__cart__quantity">
                                     <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            
                                            <input type="text"  name="quantity" value="{{ $item->quantity }}">
                                        </div>
                                    </div>
                                </td>
                                <td>

                                      <input type="hidden" name="id" value="{{ $item->id}}" >
 <button type="submit" class="primary-btn cart-btn cart-btn-right btnn" >Upadate Cart</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    $110.00
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button id="sub" style="display: none"></button>
                                        
                                        <label for="sub" ><span class="close">x</span></label>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <button class="primary-btn cart-btn cart-btn-right btnn">Remove All Cart</button>
                </div>
                  </form>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>${{ Cart::getTotal() }}</span></li>
                        <li>Total <span>${{ Cart::getTotal() }}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection




@section('scripts')

<script>

    

</script>

@endsection












