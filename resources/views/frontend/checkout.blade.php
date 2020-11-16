@extends('frontend.layout.frontend_master')
@section('frontend_content')
	<!-- Title page -->

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-success" href="{{ url('/') }}"><i class=" fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-success" href="{{ route('show.cart') }}">Cart</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                      </nav>
                </div>
            </div>

			<div class="row mt-5">

                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="m-0 font-weight-bold">Shipping Address</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email (Optional)</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" required>
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="State" required>
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Zip / Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Postal Code" required>
                                        @error('postal_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile" required>
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
				</div>

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="m-0 font-weight-bold d-flex justify-content-between">Your Order
                                <span class="badge badge-primary">{{ Cart::getTotalQuantity() }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach (Cart::getContent() as $item)
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="product-img">
                                                <img class="rounded img-thumbnail" width="70px" height="70px" src="{{ asset('public/backend/img/product_image/' .$item->attributes->image) }}" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="pt-1">{{ Str::of($item->name)->limit(20) }} </h6>
                                                <p class="pt-1">{{ $item->quantity }} x {{ $item->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h5 class="m-0">Total: TK {{ Cart::getSubTotal() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>

@endsection
