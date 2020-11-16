@extends('frontend.layout.frontend_master')
@section('frontend_content')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center font-weight-bold">
			Shopping Cart
		</h2>
	</section>

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
        @if (session('success'))
        <span class="alert alert-danger">{{ session('success') }}</span>
        @endif
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="">
						<table class="table text-center table-responsive">
							<thead class="bg-success text-light">
								<th class="text-center">Product</th>
								<th class="text-center">Size</th>
								<th class="text-center">Color</th>
								<th class="text-center">Price</th>
								<th width="15%" class="text-center">Quantity</th>
								<th class="text-center">Total</th>
								<th class="text-center">Action</th>
                            </thead>

                            @foreach (Cart::getContent() as $item)
                            <tbody>
								<td class="d-flex border-none align-items-center">
									<div class="how-itemcart1">
                                        <img src="{{ asset('public/backend/img/product_image/'.$item->attributes->image) }}" alt="product-image">
                                    </div>
                                    <div>
                                        {{ $item->name }}
                                    </div>
								</td>
								<td>{{ $item->attributes->size }}</td>
								<td>{{ $item->attributes->color }}</td>
								<td>Tk {{ $item->price }}</td>
								<td class="text-center ">
                                    <form action="{{ route('update.cart') }}" method="POST">
                                        @csrf
                                        <div class="dsfs d-lg-flex">

                                            <input type="number" class="form-control form-control-sm" min="1" name="update_qty" value="{{ $item->quantity }}">

                                            <input type="hidden" class="form-control form-control-sm" name="id" value="{{ $item->id }}">

                                            <button type="submit" class="ml-lg-2 btn btn-sm btn-outline-success">Update</button>

                                        </div>
                                    </form>
								</td>
                                <td>TK {{ $item->price*$item->quantity }}</td>
                                <td><a href="{{ route('remove.cart',$item->id) }}" class="btn btn-sm text-dark"><i class="fa fa-trash-alt"></i></a></td>
                            </tbody>
                            @endforeach

						</table>
					</div>
				</div>

                <div class="container">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <div class="float-right">
                                <table class="table">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>TK {{ Cart::getSubTotal() }}</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid #ccc;">
                                        <td>Shipping</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>TK {{ Cart::getTotal() }}</td>
                                    </tr>
                                </table>
                                <div class="">
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    @if ($user == !NULL && session('shipping_id')['id'] == NULL)
                                        <a href="{{ route('checkout.index') }}"  class="btn btn-md btn-outline-success btn-block rounded-0">Checkout</a>
                                    @elseif($user == !NULL && session('shipping_id')['id'] != NULL)
                                        <a href="{{ route('customer.payment') }}" class="btn btn-md btn-outline-success btn-block rounded-0">Checkout</a>
                                    @else
                                        <a href="{{ route('customer.login') }}" class="btn btn-md btn-outline-success btn-block rounded-0">Checkout</a>
                                    @endif

                                    <a href="{{ route('product.list') }}" class="btn btn-md btn-success btn-block rounded-0">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                    </div>
                </div>

			</div>
		</div>
	</form>

@endsection
