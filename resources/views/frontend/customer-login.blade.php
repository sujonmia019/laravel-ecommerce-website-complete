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
	            <div class="col-lg-4 col-md-4 col-sm-8 mx-lg-auto mx-md-auto">
	                <div class="card rounded-0 shadow-lg">
	                    <div class="card-header">
	                        <h4 class="m-0 text-center">Login</h4>
                        </div>
                        {{-- error message  --}}
                        <div class="bg-danger">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <ul class="m-0 text-white py-1">
                                        <li>{{$error}}</li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
	                    <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control rounded-0" placeholder="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control rounded-0" placeholder="password" required min="8">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Log in" class="btn btn-block btn-success rounded-0">
                                </div>
                                <div class="sing-up text-center mt-4">
                                    <span><i class="far fa-user"></i> No Account Yet ?</span>
                                    <a href="{{ route('customer.reg') }}">Registration</a>
                                </div>
                            </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    </div>
	</section>

@endsection
