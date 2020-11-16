@extends('frontend.layout.frontend_master')
@section('frontend_content')


	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl0 txt-center font-weight-bold">Customer Order List</h2>
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
                            <li class="nav-list">
                                <a href="{{ route('order.list') }}" class="nav-link text-light {{ Request::is('customer/order')?'btn btn-primary rounded-0':'' }}">My Order</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('customer.pass.change') }}" class="nav-link text-dark {{ Request::is('change-password')?'btn btn-primary rounded-0':'' }}">Change Password</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('logout') }}" class="nav-link text-dark" onclick="event.preventDefault();
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
                            <table class="table table-bordered table-sm text-center border-dark">
                                <thead>
                                    <th>Order NO</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if ($Order->count() == 0)
                                        <tr>
                                            <td colspan="6">Please any product added now</td>
                                        </tr>
                                    @else
                                        @foreach ($Order as $item)
                                            <tr>
                                                <td># {{ $item->order_number }}</td>
                                                <td>{{ $item->order_total }}</td>
                                                <td>
                                                    {{ ucwords($item->payment->method)}}
                                                    @if ($item->payment->method == 'bkash')
                                                    Transection No: {{ $item->payment->transaction_no }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-primary font-weight-normal">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger font-weight-normal">Unpproved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <form action="{{ route('order.details',$item->id) }}" method="POST">
                                                            @csrf
                                                            <button title="Details" class="btn btn-sm btn-primary"><i class=" fa fa-eye"></i></button>
                                                        </form>
    
                                                        <a href="{{ route('order.print',$item->id) }}" class="btn btn-sm btn-info" title="Print"><i class=" fa fa-print"></i></a>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
