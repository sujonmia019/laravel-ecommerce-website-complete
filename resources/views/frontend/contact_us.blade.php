@extends('frontend.layout.frontend_master')
@section('frontend_content')


	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl0 txt-center font-weight-bold">Contact Us</h2>
                </div>
            </div>
        </div>
	</section>

    <!-- Content page -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="call_us py-4 border px-4">
                            <p class="mb-2 text-success"><i class="fas fa-mobile-alt"></i> Call Us:</p>
                            <h5>+88{{ $Setting->phone }}</h5>
                        </div>
                        <div class="email py-4 border px-4">
                            <p class="mb-2 text-success"><i class="far fa-envelope"></i> Email Address:</p>
                            <h5>{{ $Setting->email }}</h5>
                        </div>
                        <div class="location py-4 border px-4">
                            <p class="mb-2 text-success"><i class="fas fa-map-marker-alt"></i> Store Location:</p>
                            <h5>{{ $Setting->address }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_info">
                        <form action="{{ route('send.mail') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label>Full Name<span class="text-danger font-weight-bold">*</span></label>
                                    <input type="text" name="fast_name" class="form-control rounded-0" required>
                                    @error('fast_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control rounded-0" maxlength="11">
                                </div>
                                <div class="form-group col-lg-6 col-md-6">
                                    <label>E-mail<span class="text-danger font-weight-bold">*</span></label>
                                    <input type="email" name="email" class="form-control rounded-0" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Message<span class="text-danger font-weight-bold">*</span></label>
                                    <textarea name="message" class="form-control" rows="6"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send" class="btn btn-block btn-primary rounded-0" style="cursor: pointer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection
