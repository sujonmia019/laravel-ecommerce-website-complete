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
                <div class="col-lg-2 col-md-2 mb-sm-3">
                    <div class="account-nav">
                        <ul class="navber">
                            <li class="nav-list">
                                <a href="{{ route('dashboard') }}" class="nav-link text-dark">Dashboard</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('order.list') }}" class="nav-link text-dark">My Order</a>
                            </li>
                            <li class="nav-list">
                                <a href="{{ route('customer.pass.change') }}" class="nav-link text-light {{ Request::is('change-password')?'btn btn-primary rounded-0':'' }}">Change Password</a>
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
	            <div class="col-lg-9 col-md-9 offset-lg-1 offset-md-1">

                    <div class="card rounded-0 shadow-lg">
                        <div class="card-header">
                            <h4 class="font-weight-bold lead">Change Password</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('my.password.change') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror rounded-0" required>
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror rounded-0" min="8" required>
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror rounded-0" min="8" required>
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-0">Change Password</button>
                            </form>

                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
