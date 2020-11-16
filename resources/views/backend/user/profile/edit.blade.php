@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Edit Profile</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Edit Profile</h3>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <span class="badge badge-success font-weight-normal">
                            @if ($Profile->role==1)
                                Admin
                            @else
                                User
                            @endif
                        </span>
                        <div class="profile text-center">
                            @if ($Profile->image)
                                <img src="{{asset('public/backend/img/user_profile/'.$Profile->image)}}" class="rounded-circle" width="120px" height="120px" alt="">
                            @else
                                <img src="{{asset('public/backend/img/user_profile/default.png')}}" class="rounded-circle" width="120px" height="120px" alt="">
                            @endif
                        </div>
                        <div class="mt-2 text-center">
                            <h5 class="m-0">{{ ucwords($Profile->name) }}</h5>
                        </div>
                        <div class="info text-center mt-2">
                            <p>
                                @if ($Profile->address)
                                    {{ ucwords($Profile->address) }}
                                @else
                                    Undefind
                                @endif
                            </p>
                        </div>
                        <table class="table table-responsive">
                            <tr class="d-flex justify-content-between">
                                <td>Phone :</td>
                                <td>
                                    @if ($Profile->mobile)
                                        {{ $Profile->mobile }}
                                    @else
                                        Undefind
                                    @endif
                                </td>
                            </tr>
                            <tr class="d-flex justify-content-between">
                                <td>Email :</td>
                                <td>
                                    @if ($Profile->email)
                                        {{ $Profile->email }}
                                    @else
                                        Undefind
                                    @endif
                                </td>
                            </tr>
                            <tr class="d-flex justify-content-between">
                                <td>Gender :</td>
                                <td>
                                    @if ($Profile->gender==1)
                                        Male
                                    @elseif($Profile->gender==2)
                                        Female
                                    @else
                                        Undefind
                                    @endif
                                </td>
                            </tr>
                        </table>
                        @php
                            $id = Auth::user()->id;
                        @endphp
                        <a href="{{ route('profile.index') }}" class="btn btn-primary btn-md btn-block">Your Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @php
                            $id = Auth::user()->id;
                        @endphp
                        <form action="{{route('profile.update', $id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-lg-4 form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="{{ $Profile->name }}" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>E-mail</label>
                                    <input type="email" value="{{ $Profile->email }}" class="form-control" disabled>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $Profile->address }}" required>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label>Gender</label>
                                    <select name="gender" class="custom-select form-control" required>
                                        <option value="">Choose One</option>
                                        <option value="1" {{ $Profile->gender==1?'selected':'' }}>Male</option>
                                        <option value="2" {{ $Profile->gender==2?'selected':'' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" value="{{ $Profile->mobile }}" class="form-control" minlength="11" required>
                                    @error('mobile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Profile Photo</label><br>
                                    <input type="file" name="profile_photo" class="form-control py-2"><br>
                                    @error('profile_photo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Profile" class="btn btn-sm btn-primary">
                            </div>

                           </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
