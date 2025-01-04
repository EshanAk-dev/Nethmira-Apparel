@extends('layouts.app')
@section('style')

@endsection

@section('content')

<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Checkout<span>Shop</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Checkout</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div style="text-align: center;">
		<h2 class="checkout-title" style="color: crimson;">Please login to your account or create a new account before placing the order.</h2>
	</div>

	<div class="page-content">
		<div class="checkout">
			<div class="container">
				<form action="" id="SubmitForm" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-9">
							<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
							<div class="row">
								<div class="col-sm-6">
									<label>First Name <span style="color: red;">*</span></label>
									<input type="text" name="first_name" value="{{ !empty(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<label>Last Name <span style="color: red;">*</span></label>
									<input type="text" name="last_name" value="{{ !empty(Auth::user()->last_name) ? Auth::user()->last_name : '' }}" class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->

							<label>Country <span style="color: red;">*</span></label>
							<input type="text" name="country" value="{{ !empty(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" required>

							<label>Street address <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="address_one" value="{{ !empty(Auth::user()->address_one) ? Auth::user()->address_one : '' }}" placeholder="House number and Street name" required>
							<input type="text" class="form-control" name="address_two" value="{{ !empty(Auth::user()->address_two) ? Auth::user()->address_two : '' }}" placeholder="Appartments, suite, unit etc ...">

							<div class="row">
								<div class="col-sm-6">
									<label>Town / City <span style="color: red;">*</span></label>
									<input type="text" name="city" value="{{ !empty(Auth::user()->city) ? Auth::user()->city : '' }}" class="form-control" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<label for="state">Province <span style="color: red;">*</span></label>
									<select name="state" id="state" class="form-control" required>
										<option value="">Select Province</option>
										<option value="Central" {{ (Auth::check() && Auth::user()->state == 'Central') ? 'selected' : '' }}>Central</option>
										<option value="Eastern" {{ (Auth::check() && Auth::user()->state == 'Eastern') ? 'selected' : '' }}>Eastern</option>
										<option value="Northern" {{ (Auth::check() && Auth::user()->state == 'Northern') ? 'selected' : '' }}>Northern</option>
										<option value="North Central" {{ (Auth::check() && Auth::user()->state == 'North Central') ? 'selected' : '' }}>North Central</option>
										<option value="North Western" {{ (Auth::check() && Auth::user()->state == 'North Western') ? 'selected' : '' }}>North Western</option>
										<option value="Sabaragamuwa" {{ (Auth::check() && Auth::user()->state == 'Sabaragamuwa') ? 'selected' : '' }}>Sabaragamuwa</option>
										<option value="Southern" {{ (Auth::check() && Auth::user()->state == 'Southern') ? 'selected' : '' }}>Southern</option>
										<option value="Uva" {{ (Auth::check() && Auth::user()->state == 'Uva') ? 'selected' : '' }}>Uva</option>
										<option value="Western" {{ (Auth::check() && Auth::user()->state == 'Western') ? 'selected' : '' }}>Western</option>
									</select>
								</div>
								<!-- End .col-sm-6 -->

							</div><!-- End .row -->

							<div class="row">
								<div class="col-sm-6">
									<label>Postcode / ZIP <span style="color: red;">*</span></label>
									<input type="text" name="postcode" value="{{ !empty(Auth::user()->postcode) ? Auth::user()->postcode : '' }}" class="form-control" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<label>Phone <span style="color: red;">*</span></label>
									<input type="tel" name="phone" value="{{ !empty(Auth::user()->phone) ? Auth::user()->phone : '' }}" class="form-control" required>
								</div><!-- End .col-sm-6 -->
							</div><!-- End .row -->

							<label>Email address <span style="color: red;">*</span></label>
							<input type="email" name="email" value="{{ !empty(Auth::user()->email) ? Auth::user()->email : '' }}" class="form-control" required>

							@if(empty(Auth::check()))
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="is_create" class="custom-control-input createAccount " id="checkout-create-acc">
								<label class="custom-control-label" for="checkout-create-acc">Create an account? (If you don't have an account)</label>
							</div><!-- End .custom-checkbox -->

							<div id="showPassword" style="display: none;">
								<label>Password <span style="color: red;">*</span></label>
								<input type="text" id="inputPassword" name="password" class="form-control">
							</div>
							@endif
							<label>Order notes (optional)</label>
							<textarea class="form-control" name="notes" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
						</div><!-- End .col-lg-9 -->
						<aside class="col-lg-3" style="margin-top: 45px;">
							<div class="summary">
								<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

								<table class="table table-summary">
									<thead>
										<tr>
											<th>Product</th>
											<th>Total</th>
										</tr>
									</thead>

									<tbody>
										@foreach(Cart::getContent() as $key => $cart)
										@php
										$getCartProduct = App\Models\ProductModel::getSingle($cart->id);
										@endphp
										<tr>
											<td><a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a></td>
											<td>Rs.{{ number_format($cart->price * $cart->quantity, 2) }}</td>
										</tr>
										@endforeach

										<tr class="summary-subtotal">
											<td>Subtotal:</td>
											<td>Rs.{{ number_format(Cart::getSubTotal(), 2) }}</td>
										</tr><!-- End .summary-subtotal -->

										<tr>
											<td colspan="2">
												<div class="cart-discount">
													<div class="input-group">
														<input type="text" id="getDiscountCode" name="discount_code" class="form-control" placeholder="discount code">
														<div class="input-group-append">
															<button style="height: 39px;" type="button" class="btn btn-outline-primary-2" id="ApplyDiscount" type="submit"><i class="icon-long-arrow-right"></i>
															</button>
														</div><!-- .End .input-group-append -->
													</div><!-- End .input-group -->
												</div><!-- End .cart-discount -->
											</td>
										</tr>

										<tr class="summary-discount">
											<td>Discount:</td>
											<td>Rs.<span id="getDiscountAmount">0.00</span></td>
										</tr>
										
										<tr class="summary-shipping">
											<td>Shipping:</td>
											<td>&nbsp;</td>
										</tr>
										
										@foreach($getShipping as $shipping)
										<tr class="summary-shipping-row">
											<td>
												<div class="custom-control custom-radio">
													<input type="radio" value="{{ $shipping->id }}" id="free-shipping{{ $shipping->id }}" name="shipping" data-price="{{ !empty($shipping->price) ? $shipping->price : 0 }}" class="custom-control-input getShippingCharge" required>
													<label class="custom-control-label" for="free-shipping{{ $shipping->id }}">{{ $shipping->name }}</label>
												</div><!-- End .custom-control -->
											</td>
											<td>
												@if(!empty($shipping->price))
												Rs.{{ number_format($shipping->price, 2) }}
												@endif
											</td>
										</tr><!-- End .summary-shipping-row -->
										@endforeach

										<tr class="summary-total">
											<td><strong>Total:</strong></td>
											<td><strong>Rs.<span id="getPayableTotal">{{ number_format(Cart::getSubTotal(), 2) }}</span></strong></td>
										</tr><!-- End .summary-total -->
									</tbody>
								</table><!-- End .table table-summary -->
								<input type="hidden" id="getShippingChargeTotal" value="0">
								<input type="hidden" id="PayableTotal" value="{{ Cart::getSubTotal() }}">
								<div class="accordion-summary" id="accordion-payment">

									<div class="custom-control custom-radio">
										<input type="radio" id="CashOnDelivery" value="cash" name="payment_method" class="custom-control-input" required>
										<label class="custom-control-label" for="CashOnDelivery">
											Cash on delivery
										</label>
									</div>
								</div><!-- End .accordion -->

								<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
									<span class="btn-text">Place Order</span>
									<span class="btn-hover-text">Proceed to Checkout</span>
								</button>
							</div><!-- End .summary -->
						</aside><!-- End .col-lg-3 -->
					</div><!-- End .row -->
				</form>
			</div><!-- End .container -->
		</div><!-- End .checkout -->
	</div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')
<script>
	$('body').delegate('.createAccount', 'change', function() {
		if (this.checked) {
			$('#showPassword').show();
			$('#inputPassword').prop('required', true);
		} else {
			$('#showPassword').hide();
			$('#inputPassword').prop('required', false);
		}
	});

	$('body').delegate('#SubmitForm', 'submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "{{ url('checkout/place_order') }}",
			data: new FormData(this),
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(data) {
				if (data.status == false) {
					alert(data.message);
				} else {
					window.location.href = data.redirect;
				}
			},
			error: function(data) {

			}
		})
	});

	$('body').delegate('.getShippingCharge', 'change', function() {
		var price = $(this).attr('data-price');
		var total = $('#PayableTotal').val();
		$('#getShippingChargeTotal').val(price);
		var final_total = parseFloat(price) + parseFloat(total);
		$('#getPayableTotal').html(final_total.toFixed(2));
	});

	$('body').delegate('#ApplyDiscount', 'click', function() {
		var discount_code = $('#getDiscountCode').val();

		$.ajax({
			type: "POST",
			url: "{{ url('checkout/apply_discount_code') }}",
			data: {
				discount_code: discount_code,
				"_token": "{{ csrf_token() }}",
			},
			dataType: "json",
			success: function(data) {
				$('#getDiscountAmount').html(data.discount_amount);

				var shipping = $('#getShippingChargeTotal').val();
				var final_total = parseFloat(shipping) + parseFloat(data.payable_total);

				$('#getPayableTotal').html(final_total.toFixed(2));
				$('#PayableTotal').val(data.payable_total);
				if (data.status == false) {
					alert(data.message);
				}
			},
			error: function(data) {

			}
		});
	});
</script>
@endsection