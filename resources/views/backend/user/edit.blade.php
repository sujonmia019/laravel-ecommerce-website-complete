@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Edit User</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Update User</h3>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Edit User
                        <a href="{{route('user.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i> Go Back User List</a>
                    </h5>
                </div>
                <div class="card-body">
                   <form action="{{route('user.update', $Edit->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="col-lg-4 form-group">
                            <label>User Role</label>
                            <select name="role" class="custom-select form-control" required>
                                <option value="">Choose One</option>
                                <option value="1" {{$Edit->usertype==1?'selected':''}}>Admin</option>
                                <option value="2" {{$Edit->usertype==2?'selected':''}}>User</option>
                            </select>
                            @error('role')
                        `       <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Full Name</label>
                        <input type="text" name="name" value="{{$Edit->name}}" class="form-control" required>
                            @error('name')
                        `       <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="{{$Edit->email}}" class="form-control" required>
                            @error('email')
                        `       <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Update User" class="btn btn-sm btn-primary">
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
