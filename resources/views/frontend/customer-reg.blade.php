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
	            <div class="col-lg-6 col-md-6 col-sm-12 mx-lg-auto mx-md-auto">
	                <div class="card rounded-0 shadow-lg">

	                    <div class="card-header">
	                        <h4 class="m-0 text-center">Registration</h4>
	                    </div>
	                    <div class="card-body">
	                        <form action="{{ route('signup.store') }}" method="POST">
	                            @csrf
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control rounded-0"
                                        placeholder="full name" required >
                                    <span style="font-size: 11px; color: #666;"><i class="fas fa-exclamation-circle"></i> Maximum 30 charecters required.</span><br>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control rounded-0"
                                        placeholder="email" required >
                                    <span style="font-size: 11px; color: #666;"><i class="fas fa-exclamation-circle"></i> Valid email required.</span><br>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" class="form-control rounded-0"
                                        placeholder="mobile" required pattern="[0-9]{11}" >
                                        <span style="font-size: 11px; color: #666;"><i class="fas fa-exclamation-circle"></i> Maximum 11 charecters digits.</span>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control rounded-0"
                                        placeholder="password" required min="8" >
                                        <span style="font-size: 11px; color: #666;"><i class="fas fa-exclamation-circle"></i> Minimum 8 charecters required.</span><br>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control rounded-0"
                                        placeholder="confirm password" required min="8" >
                                        <span style="font-size: 11px; color: #666;"><i class="fas fa-exclamation-circle"></i> Minimum 8 charecters required.</span><br>
                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

	                            <div class="form-group">
	                                <input type="submit" value="Registration" class="btn btn-block btn-success rounded-0">
                                </div>

	                            <div class="sing-up text-center mt-4">
	                                <span><i class="far fa-user"></i> Have your account ?</span>
	                                <a href="{{ route('customer.login') }}">Login here</a>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

@endsection
