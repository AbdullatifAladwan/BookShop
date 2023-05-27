
@extends('layouts.app')

@section('content')
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
    @if(session('success'))
          <h3 style="text-align: center;"> {{ session('success') }}</h1>
    @else
    
        <div class="billing_details">
            <div class="row">
            <form class="row contact_form" action="{{ route('stripe.payment') }}" method="post">
    <div class="col-lg-8">
        <h3>Billing Details</h3>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="first" name="name" value="{{auth()->user()->name}}" readonly>
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" readonly>
        </div>
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" id="Loction" name="Loction" placeholder="Location">
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="number" name="number" placeholder="Phone number">
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="add1" name="add1" placeholder="Address line">
        </div>
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
        </div>
        <div class="col-md-12 form-group mb-0">
            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
                <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                @foreach(Session::get('cartItems', []) as $item)
                    <li>
                        <a href="#">
                            {{ $item['name'] }}
                            <span class="middle">x {{ $item['quantity'] }}</span>
                            <span class="last">${{ $item['quantity'] * $item['price'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="list list_2">
                <li><a href="#">Total <span>${{ Session::get('subtotal') }}</span></a></li>
            </ul>
            <div class="payment_item" style="margin-left: 30px;">
                @csrf
                <script
                    src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button"
                    data-key="{{ config('services.stripe.publishable') }}"
                    data-amount="{{ Session::get('subtotal') * 100 }}"
                    data-name=""
                    data-description=""
                    data-locale="auto"
                    data-currency="usd"
                ></script>
            </div>
        </div>
    </div>
</form>

                    </div>

                    
                       
                    </div>
                </div>

    @endif
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!--================Blog Area =================-->


  @endsection
  
  @section('footer')
  @include('layouts.footer')
  @endsection