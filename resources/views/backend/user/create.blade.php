@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Add User</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Add User</h3>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">User Create
                        <a href="{{route('user.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i> Go Back User List</a>
                    </h5>
                </div>
                <div class="card-body">
                   <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-lg-4 form-group">
                            <label>User Role</label>
                            <select name="role" class="custom-select form-control" required>
                                <option value="">Choose One</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" minlength="8" required>
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" minlength="8" required>
                            @error('confirm_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add User" class="btn btn-sm btn-primary">
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
