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
                                <a href="{{ route('customer.profile') }}" class="nav-link text-light {{ Request::is('my-profile-edit')?'btn btn-primary rounded-0':'' }}">My Profile</a>
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
	            <div class="col-lg-9 col-md-9 offset-lg-1 offset-md-1">

                    <div class="card rounded-0 shadow-lg">
                        <div class="card-header">
                            <h4 class="font-weight-bold lead">Edit My Profile</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('my.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Full Name</label>
                                        <input type="text" value="{{ $Profile->name }}" name="name" class="form-control @error('name') is-invalid @enderror rounded-0" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>E-mail</label>
                                        <input type="text" value="{{ $Profile->email }}" class="form-control rounded-0" disabled>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Mobile</label>
                                        <input type="text" value="{{ $Profile->mobile }}" class="form-control rounded-0" disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control rounded-0 @error('gender') is-invalid @enderror" required>
                                            <option value="">Select One</option>
                                            <option value="1" {{ $Profile->gender==1?'selected':'' }}>Male</option>
                                            <option value="2" {{ $Profile->gender==2?'selected':'' }}>Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Address</label>
                                        <input type="text" value="{{ $Profile->address }}" name="address" class="form-control @error('address') is-invalid @enderror rounded-0" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4">
                                        <label>Profile</label>
                                        <input type="file" name="profile" class="form-control border-0" >
                                        @error('profile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-0">Update Profile</button>
                            </form>

                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
