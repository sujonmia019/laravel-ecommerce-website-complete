@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">User List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">All User</h3>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 d-flex justify-content-between">User List
                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">User Create</a>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($User as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                                @if ($value->role==1)
                                    Admin
                                @elseif($value->role==2)
                                    User
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <form action="{{route('user.destroy', $value->id)}}" method="POST" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete?')"><i class="fa fa-trash-alt"></i></button>
                                </form>

                                <a href="{{route('user.edit', $value->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
