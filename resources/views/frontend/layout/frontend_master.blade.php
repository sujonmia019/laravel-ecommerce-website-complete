<!DOCTYPE html>
<html lang="en">
<head>
	<title>Popularsoft E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('public/frontend')}}/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/main.css">
</head>
<body>

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<div class="left-top-bar font-weight-normal">
                            <ul class="m-0 p-0 d-flex justify-content-center align-items-center">
                                <li class="mr-2 text-light" style="font-size: 15px;"><i class="fas fa-phone-square-alt"></i> {{ $Setting->phone }}</li>
                                <li class="mr-2 text-light" style="font-size: 15px;"><i class="far fa-envelope"></i> {{ $Setting->email }}</li>
                            </ul>
						</div>
					</div>

					<div class="right-top-bar flex-w h-full">
						<ul class="social d-flex justify-content-center align-items-center">
	                        <li>
                                <a target="_blank" href="{{ $Setting->facebook }}"><i class="fab fa-facebook-square"></i></a>
                            </li>
	                        <li>
                                <a target="_blank" href="{{ $Setting->twitter }}"><i class="fab fa-twitter-square"></i></a>
                            </li>
	                        <li>
                                <a target="_blank" href="{{ $Setting->youtube }}"><i class="fab fa-youtube-square"></i></a>
                            </li>
	                        <li>
                                <a target="_blank" href="{{ $Setting->linkdin }}"><i class="fab fa-linkedin"></i></a>
                            </li>
	                    </ul>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{url('/')}}" class="logo">
						<img src="{{asset('public/frontend/images/logo/'.$Setting->logo)}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
	                        <li class="active-menu">
	                            <a href="{{url('/')}}">HOME</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('product.list') }}">SHOPS</a>
	                            {{-- <ul class="sub-menu">
	                                <li><a href="">Products</a></li>
	                                <li><a href="">Checkout</a></li>
	                                <li><a href="{{route('cart.page')}}">Cart</a></li>
	                            </ul> --}}
	                        </li>
	                        <li>
	                            <a href="">ABOUT US</a>
	                        </li>
	                        <li>
	                            <a href="{{route('contact.us')}}">CONTACT US</a>
	                        </li>
	                    </ul>
					</div>

                    <style>
                        .wrap-icon-header a.user-hover{
                            transition: .3s all !important;
                        }
                        .wrap-icon-header a.user-hover:hover{
                            color: #717fe0 !important;
                        }
                        div input.form-control:focus {
                            color: #495057;
                            background-color: #fff;
                            border-color: #80bdff;
                            outline: 0;
                            box-shadow: none;
                        }
                    </style>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
                        
                        @include('frontend.layout.search')

                        <ul class="main-menu">
                            <li>
                                @if (@Auth::user()->id !=NULL  && Auth::user()->usertype == 'customer')

                                <a class="text-dark user-hover" style="cursor: pointer;"><i class="fa fa-user-circle fa-lg"></i> Account</a>

                                <ul class="sub-menu">
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('customer.profile') }}">My Profile</a></li>
                                    <li><a href="{{ route('my.profile.edit') }}">Edit Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>

                                @else

                                <a class="text-dark user-hover" style="font-size: 20px; cursor: pointer;"><i class="fa fa-user-circle"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('customer.login') }}">Log in</a></li>
                                    <li><a href="{{ route('customer.reg') }}">Registration</a></li>
                                </ul>

                                @endif

                            </li>
                        </ul>
                        <div style="font-size: 20px;" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{  Cart::getTotalQuantity() }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{url('/')}}"><img src="{{asset('public/frontend/images/logo/'.$Setting->logo)}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
                
                @include('frontend.layout.search')

                <ul class="main-menu">
                    <li>
                        @if (@Auth::user()->id !=NULL && Auth::user()->usertype == 'customer')

                            <a class="text-dark user-hover" style="cursor: pointer;"><i class="fa fa-user-circle fa-lg"></i> Account</a>

                            <ul class="sub-menu">
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li><a href="{{ route('my.profile.edit') }}">Edit Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                            @else

                            <a class="text-dark user-hover" style="font-size: 20px; cursor: pointer;"><i class="fa fa-user-circle"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('customer.login') }}">Log in</a></li>
                                <li><a href="{{ route('customer.reg') }}">Registration</a></li>
                            </ul>

                        @endif
                    </li>
                </ul>
				<div style="font-size: 20px;" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{  Cart::getTotalQuantity() }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div id="helloa" class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div id="menu-mobile" class="menu-mobile">

			<ul class="main-menu-m">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>
					<a href="{{ route('product.list') }}">SHOPS</a>
					{{-- <ul class="sub-menu-m">
						<li><a href="">Products</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="{{route('cart.page')}}">Cart</a></li>
					</ul> --}}
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<li>
                    <a href="">ABOUT US</a>
                </li>
                <li>
                    <a href="{{route('contact.us')}}">CONTACT US</a>
                </li>
			</ul>
		</div>

		
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart pl-3 pr-3" style="width: 330px;">
			<div class="header-cart-title w-100 d-flex justify-content-between my-5" style="min-height: 0 !important; height: 0;">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="lh-10 font-weight-bold cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart" style="font-size: 25px;">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content js-pscroll">
				<ul class="header-cart-wrapitem w-full">
                    @if (Cart::getContent()->count()==0)
                        <span class="text-danger font-weight-bold">Product Cart Not Added</span>
                    @else
                    @foreach (Cart::getContent() as $item)
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('public/backend/img/product_image/'.$item->attributes->image) }}" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{ $item->name }}
                                </a>

                                <span class="header-cart-item-info">
                                    {{ $item->quantity }} x {{ $item->price }}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    @endif
				</ul>

				<div>
					<div class="header-cart-total w-full p-tb-40">
						Total: TK {{ Cart::getSubTotal() }}
					</div>

                    <div class="d-block">
                        <div class="header-cart-buttons d-flex justify-content-start align-items-end">
                            <div class="mr-2">
                                <a href="{{ route('show.cart') }}" class=" btn btn-md btn-outline-success rounded-5">
                                    View Cart
                                </a>
                            </div>

                            <div>
								@php
                                    $user = Auth::user();
                                @endphp
                                    
                                @if ($user == !NULL && session('shipping_id')['id'] == NULL)
                                	<a href="{{route('checkout.index')}}" class=" btn btn-md btn-success">
                                    Check Out</a>
								@elseif($user == !NULL && session('shipping_id')['id'] != NULL)
									<a href="{{route('checkout.index')}}" class=" btn btn-md btn-success">
                                    Check Out</a>
								@else
							    	<a href="{{route('customer.login')}}" class=" btn btn-md btn-success">
                                    Check Out</a>
                                @endif
                            </div>

                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>


    @yield('frontend_content')


	<!-- Footer -->
	<footer>
        <div class="footer_info py-5 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <div class="d-flex justify-content-center">
                            <div class="company">
                                <img src="{{ asset('public/frontend/images/logo/'.$Setting->logo) }}" alt="">
								<p class="text-light mt-2">{{ $Setting->description }}</p>
								<p class="mt-2 text-light font-weight-bold">Got Question? Call us 24/7</p>
								<span style="font-size: 22px; color: #F9C21E;" class="mt-2">+88{{ $Setting->phone }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <div class="d-flex justify-content-center">
                            <div class="company">
                                <h4 class="mb-3">Pages</h4>
                                <ul class="m-0 p-0">
                                    <li class="my-2"><a class="text-light" href="{{ url('/') }}">Home</a></li>
                                    <li class="my-2"><a class="text-light" href="">About</a></li>
                                    <li class="my-2"><a class="text-light" href="{{ route('contact.us') }}">Contact</a></li>
                                    <li class="my-2"><a class="text-light" href="">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="d-flex justify-content-center">
                            <div class="company">
								<h4 class="mb-3">Get In Tuch</h4>
                                <p class="text-light mb-2">{{$Setting->address}}</p>
								<a href="mailto:{{ $Setting->email }}" class="text-light">{{ $Setting->email }}</a>
                                <ul class="social mt-3">
                                    <li>
                                        <a target="_blank" href="{{ $Setting->facebook }}"><i class="fab fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $Setting->twitter }}"><i class="fab fa-twitter-square"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $Setting->youtube }}"><i class="fab fa-youtube-square"></i></a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $Setting->linkdin }}"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="d-flex justify-content-center">
                            <div class="company">
                                <h4 class="mb-3">Newsletter</h4>
                                <form accept="">
                                    <div class="form-group">
                                      <input type="email" class="form-control rounded-0" placeholder="E-mail">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-0">Subscribe</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--copyright-->
        <div class="copyright py-3">
            <p class="text-center text-dark">
                Copyright &copy; @php
                    echo date('Y')
                @endphp. Designed & Developed By Sujon Mia
            </p>
        </div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

    <script src="{{ asset('public/frontend') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/select2/select2.min.js"></script>
    <script src="{{ asset('public/frontend') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/slick/slick.min.js"></script>
	<script src="{{ asset('public/frontend') }}/js/slick-custom.js"></script>
	<script src="{{ asset('public/frontend') }}/vendor/parallax100/parallax100.js"></script>
    <script src="{{ asset('public/frontend') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/main.js"></script>

	<script>
        // toastr
        (function($) {

			@if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif

            // ==========
            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
            // ==========
            $('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});
		 
		

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});
            // ==========
            $('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
            // ==========
            $(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
            // ==========
            $('.js-pscroll').each(function(){
                $(this).css('position','relative');
                $(this).css('overflow','hidden');
                var ps = new PerfectScrollbar(this, {
                    wheelSpeed: 1,
                    scrollingThreshold: 1000,
                    wheelPropagation: false,
                });

                $(window).on('resize', function(){
                    ps.update();
                })
            });




        })(jQuery);
    </script>
    <script>
        $(document).ready(function(){
            $('#slug').keyup(function(){
                var slug = $(this).val();
                if(slug != ''){
                    $.ajax({
                        url: "{{ route('get.product') }}",
                        type: "GET",
                        data: {slug:slug},
                        success: function(data){
                            $('#productStatus').fadeIn();
                            $('#productStatus').html(data);
                        }
                    });
                }

            });
            
        });
        $(document).on('click','li', function(){
            $('#slug').val($(this).text());
            $('#productStatus').fadeOut();
        });
    </script>
	{{--  <script src="{{asset('public/frontend')}}/js/main.js"></script>  --}}

</body>
</html>
