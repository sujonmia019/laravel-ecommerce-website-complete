@extends('frontend.layout.frontend_master')
@section('frontend_content')


	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl0 txt-center font-weight-bold">Customer Account</h2>
                </div>
            </div>
        </div>
    </section>

	<!-- Content page -->
	<section style="padding: 80px 0;">
	    <div class="container">
	        <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="profile text-center">
                        @if ($Profile->image)
                            <img width="100" height="100" class="rounded-circle" src="{{asset('public/frontend/images/customer/'.$Profile->image)}}" >
                        @else
                            <img width="100" height="100" class="rounded-circle" src="{{asset('public/backend/img/user_profile/default.png')}}" >
                        @endif
                        <h4 class="font-weight-bold mt-2">{{ ucwords($Profile->name) }}</h4>
                        <span class="mt-3">{{ $Profile->email }}</span>
                    </div>
                    <div class="account-nav mt-5">
                        <ul class="navber">
                            <li class="nav-list">
                                <a href="{{ route('dashboard') }}" class="nav-link text-light {{ Request::is('dashboard')?'btn btn-primary rounded-0':'' }}">Dashboard</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('order.list') }}" class="nav-link text-dark">My Order</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('customer.pass.change') }}" class="nav-link text-dark">Change Password</a>
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
                            <h1>Welcome!</h1>
                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
