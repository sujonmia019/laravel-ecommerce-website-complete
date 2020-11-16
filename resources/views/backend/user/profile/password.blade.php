@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Change Password</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Password</h3>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">User Create

                    </h5>
                </div>
                <div class="card-body">
                   <form action="{{ route('password') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label>Current Password</label>
                            <input type="password" name="old_password" class="form-control" minlength="8" required>
                            @error('old_password')
                                <span class="text-danger font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" minlength="8" required>
                            @error('new_password')
                                <span class="text-danger font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" minlength="8" required>
                            @error('confirm_password')
                                <span class="text-danger font-weight-bold">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Change" class="btn btn-sm btn-primary">
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
