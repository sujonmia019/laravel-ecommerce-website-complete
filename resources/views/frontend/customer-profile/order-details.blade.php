@extends('frontend.layout.frontend_master')
@section('frontend_content')


	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl0 txt-center font-weight-bold">Customer Order Details</h2>
                </div>
            </div>
        </div>
    </section>

	<!-- Content page -->
	<section style="padding: 80px 0;">
	    <div class="container">
	        <div class="row">
                <div class="col-lg-2 col-md-2">
                    
                    <div class="account-nav mt-5">
                        <ul class="navber">
                            <li class="nav-list mb-1">
                                <a href="{{ route('order.list') }}" class="nav-link text-light btn btn-sm btn-primary">My Order</a>
                            </li>
                            <li class="nav-list mb-1">
                                <a href="{{ route('customer.pass.change') }}" class="nav-link text-light btn btn-sm btn-primary">Change Password</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('logout') }}" class="nav-link text-light btn btn-sm btn-primary" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"></i> Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
	            <div class="col-lg-9 col-md-9 col-sm-4 offset-lg-1 offset-md-1">

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered text-center table-responsive">
                                <tr>
                                    <td width="30%"><img src="{{ asset('public/frontend/images/logo/'.$Setting->logo) }}" alt=""></td>
                                    <td width="40%">
                                        <h4><strong>ShopBD</strong></h4>
                                        <span><strong>Mobile No:</strong> {{ $Setting->phone }}</span><br>
                                        <span><strong>E-mail:</strong> {{ $Setting->email }}</span>
                                    </td>
                                    <td width="30%">
                                        <strong>Order NO:</strong> # {{ $OrderDetails->order_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Billing info:</strong></td>
                                    <td colspan="2" class="text-left">
                                        <strong>Name:</strong> <span>{{$OrderDetails->shipping->name }}</span>&nbsp;&nbsp;
                                        <strong>E-mail:</strong> <span>{{$OrderDetails->shipping->email }}</span>&nbsp;&nbsp;
                                        <strong>Mobile:</strong> <span>{{$OrderDetails->shipping->mobile }}</span>&nbsp;&nbsp;
                                        <strong>City:</strong> <span>{{$OrderDetails->shipping->city }}</span>&nbsp;&nbsp;
                                        <strong>State:</strong> <span>{{$OrderDetails->shipping->state }}</span>&nbsp;&nbsp;
                                        <strong>Zip Code:</strong> <span>{{$OrderDetails->shipping->zip_code }}</span>&nbsp;&nbsp;
                                        <strong>Address:</strong> <span>{{$OrderDetails->shipping->address }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Payment</strong></td>
                                    <td colspan="2" class="text-left">
                                        {{ ucwords($OrderDetails->payment->method)}}
                                        @if ($OrderDetails->payment->method == 'bkash')
                                        Transection No: {{ $OrderDetails->payment->transaction_no }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><h5 class="font-weight-bold">Order Details</h5></td>
                                </tr>
                                <tr>
                                    <td><strong>Product Name & image</strong></td>
                                    <td><strong>Color & Size</strong></td>
                                    <td><strong>Quantity & Price</strong></td>
                                </tr>

                                @foreach ($OrderDetails->order_details as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center text-left border-0">
                                            <img width="50px" height="55px" class="mr-1" src="{{ asset('public/backend/img/product_image/'.$item->product->image) }}" alt="">
                                            <span>{{ $item->product->name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $item->colors->name }}</span>&nbsp; & &nbsp; 
                                            <span>{{ $item->sizes->name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $item->quantity }} x {{ $item->product->price }} = {{ $item->quantity * $item->product->price }} TK</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right"><strong>Grand Total</strong></td>
                                        <td>{{ $OrderDetails->order_total }} TK</td>
                                    </tr>
                                @endforeach
                                
                            </table>
                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
