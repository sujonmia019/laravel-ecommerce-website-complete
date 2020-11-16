@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Active Customer</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Active Customer</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Customer as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->mobile }}</td>
                            <td>{{ $value->usertype }}</td>
                            <td>{{ Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
