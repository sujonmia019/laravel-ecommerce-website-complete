@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Profile</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Your Profile</h3>
        </div>
        <div class="col-lg-4 mx-auto">
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
                    <table class="table">
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
                    <a href="{{ route('profile.edit',$id) }}" class="btn btn-primary btn-md btn-block">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
