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
                    <div class="account-nav">
                        <ul class="navber">
                            <li class="nav-list">
                                <a href="{{ route('customer.profile') }}" class="nav-link text-light {{ Request::is('my-profile')?'btn btn-primary rounded-0':'' }}">Profile</a>
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

                    <div class="card rounded-0 shadow-lg" style="width: 400px;">
                        <div class="card-body">
                            <span class="badge badge-success font-weight-normal">{{ ucwords($Profile->usertype) }}</span>

                            <div class="img text-center">
                                @if ($Profile->image)
                                    <img width="100" height="100" class="rounded-circle" src="{{asset('public/frontend/images/customer/'.$Profile->image)}}" >
                                @else
                                    <img width="100" height="100" class="rounded-circle" src="{{asset('public/backend/img/user_profile/default.png')}}" >
                                @endif

                                <h4 class="mt-3">{{ ucwords($Profile->name) }}</h4>
                            </div>

                            <div class="info mt-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Mobile:</td>
                                        <td>{{ $Profile->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td>{{ $Profile->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>
                                            @if ($Profile->gender == 1)
                                                {{ 'Male' }}
                                            @elseif($Profile->gender == 2)
                                            {{ 'Female' }}
                                            @else
                                                {{ 'Undifaind' }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="edit-profile">
                                <a href="{{ route('my.profile.edit') }}" class="btn btn-block btn-primary rounded-0">Edit Profile</a>
                            </div>

                        </div>
                    </div>

	            </div>
	        </div>
	    </div>
    </section>

@endsection
