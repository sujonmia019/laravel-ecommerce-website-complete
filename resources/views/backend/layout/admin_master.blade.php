<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->

    <title>ShopBD E-commerce Admin Panel</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="{{asset('public/backend/css/ionicons.css')}}">
    <link href="{{asset('public/backend/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="{{asset('public/backend/css/perfect-scrollbar.min.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/starlight.min.css') }}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Laravel</a></div>
    <div class="sl-sideleft">

      @php
          $Route = Route::current()->getName();
      @endphp

      
      <div class="sl-sideleft-menu">

        <a href="{{route('home')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fas fa-home"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <label class="sidebar-label">User</label>
        @if (Auth::user()->role == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                <i class="fas fa-user-tie"></i>
                <span class="menu-item-label">User Manage</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="{{$Route==('user.index')?'active':''}} nav-link">User View</a>
            </li>
          </ul>
        @endif
        

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fas fa-user-friends"></i>
                <span class="menu-item-label">Customer Manage</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item">
                <a href="{{route('customer.index')}}" class="nav-link">Active Customer</a>
            </li>
            <li class="nav-item">
                <a href="{{route('draft.view')}}" class="nav-link">Draft Customer</a>
            </li>
        </ul>

        <label class="sidebar-label">Product</label>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fas fa-tags"></i>
                <span class="menu-item-label">Category Manage</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="{{$Route==('category.index')?'active':''}} nav-link">Category</a>
            </li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="far fa-address-card"></i>
                <span class="menu-item-label">Brand Manage</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item">
                <a href="{{route('brand.index')}}" class="{{$Route==('brand.index')?'active':''}} nav-link">Brand</a>
            </li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fab fa-product-hunt"></i>
                <span class="menu-item-label">Product Manage</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item">
                <a href="{{ route('color.index') }}" class="{{$Route==('color.index')?'active':''}} nav-link">Color</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('size.index') }}" class="{{$Route==('size.index')?'active':''}} nav-link">Size</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.index') }}" class="{{$Route==('product.index')?'active':''}} nav-link">Product Create</a>
            </li>
        </ul>

        <label class="sidebar-label">Order Manage</label>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
              <i class="fab fa-product-hunt"></i>
              <span class="menu-item-label">Order Manage</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
      </a>
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
              <a href="{{ route('order.pending') }}" class="nav-link">Pending Order</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('order.approved') }}" class="nav-link">Approved Order</a>
          </li>
      </ul>

        

        <label class="sidebar-label">Website Setting</label>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
              <i class="far fa-address-card"></i>
              <span class="menu-item-label">Contact Manage</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
              <a href="{{route('contact.view')}}" class="{{$Route==('contact.view')?'active':''}} nav-link">Contact</a>
          </li>
      </ul>

      <a href="{{ route('setting') }}" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-cog"></i>
            <span class="menu-item-label">Settings</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('slider.index') }}" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="fas fa-sliders-h"></i>
            <span class="menu-item-label">Slider</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

        <label class="sidebar-label">Profile</label>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fas fa-user-circle"></i>
            <span class="menu-item-label">Profile Manage</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('profile.index')}}" class="{{$Route==('profile.index')?'active':''}} nav-link">Your Profile</a>
          </li>
        </ul>

        <label class="sidebar-label">Logout</label>
            <a href="{{ route('logout') }}" class="sl-menu-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <div class="sl-menu-item">
              <i class="icon ion-power"></i>
              <span class="menu-item-label">Logout</span> 
            </div>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
              @csrf
            </form>
          
        

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><span class="hidden-md-down">{{ucwords(Auth::user()->name)}}</span></span>
            @if (Auth::user()->image)
                <img src="{{asset('public/backend/img/user_profile/'.Auth::user()->image)}}" class="rounded-circle wd-32"alt="">
            @else
                <img src="{{asset('public/backend/img/user_profile/default.png')}}" class="rounded-circle wd-32"alt="">
            @endif
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                    @php
                       $id = Auth::user()->id;
                    @endphp
                <li><a href="{{ route('profile.edit', $id) }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href="{{ route('change.password') }}"><span class="iconify icon" data-icon="carbon:password" data-inline="false"></span> Change Password</a></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST"     style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="far fa-bell"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{asset('public/backend/')}}/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('public/backend/')}}/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>

          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

   @yield('admin_content')

    <script src="{{asset('public/backend/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/backend/js/select2.min.js')}}"></script>
    <script src="{{asset('public/backend/js/popper.js')}}"></script>
    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('public/backend/js/starlight.js')}}"></script>
    <script>
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

        // Sweetlaert
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var link = $(this).attr('action');
            swal({
              title: "Are You Sure Delete?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.form = link;
                swal("Your File Has Been Deleted Successfull!", {
                    title: "Deleted?",
                  icon: "success",
                });
              }
            });
        });

        // datatable
        $('#contact').DataTable();

        $('.select2').select2();

      })(jQuery);

    </script>
    @stack('swetalertjs')
  </body>
</html>
