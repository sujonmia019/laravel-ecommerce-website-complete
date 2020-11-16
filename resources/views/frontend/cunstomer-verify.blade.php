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
	                {{-- Confirm message  --}}

	                <div class="card rounded-0 shadow-lg">
	                    <div class="card-header">
	                        <h4 class="m-0 text-center">Email Verify</h4>
	                    </div>
	                    <div class="card-body">
	                        <form action="{{ route('verify.store') }}" method="POST">
	                            @csrf
	                            <div class="form-group">
	                                <label>E-mail</label>
	                                <input type="email" name="email"
	                                    class="form-control rounded-0 @error('email') is-invalid @enderror"
	                                    placeholder="Email" required>
	                                @error('email')
	                                <span class="text-danger">{{ $message }}</span>
	                                @enderror
	                            </div>
	                            <div class="form-group">
	                                <label>Verify Code</label>
	                                <input type="text" name="code"
	                                    class="form-control rounded-0 @error('code') is-invalid @enderror"
	                                    placeholder="Code" required>
	                                @error('code')
	                                <span class="text-danger">{{ $message }}</span>
	                                @enderror
	                            </div>
	                            <div class="form-group">
	                                <input type="submit" value="Submit" class="btn btn-primary rounded-0">
	                            </div>
	                        </form>
	                    </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
