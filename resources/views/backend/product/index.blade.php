@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Product ist</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Product List
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create Product</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="contact" class="table table-bordered text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($Product as $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->category->name}}</td>
                                <td>{{$value->brand->name}}</td>
                                <td>
                                    <img src="{{ asset('public/backend/img/product_image/'. $value->image) }}" width="70px" height="70px">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('product.show', $value->id) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>

                                        <form action="{{route('product.destroy', $value->id)}}" method="POST" class="mr-1">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete?')"><i class="fa fa-trash-alt"></i></button>
                                        </form>

                                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
