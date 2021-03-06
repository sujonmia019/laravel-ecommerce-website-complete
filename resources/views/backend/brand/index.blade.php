@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Brand List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Brand List
                        <a href="{{ route('brand.create') }}" class="btn btn-sm btn-primary">Create Brand</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="contact" class="table table-bordered text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($Brand as $value)
                            @php
                                $brand_id = App\Model\Product::where('brand_id',$value->id)->count();
                            @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->name}}</td>
                                <td class="d-flex justify-content-center">
                                    @if ($brand_id<1)
                                    <form action="{{route('brand.destroy', $value->id)}}" method="POST" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    @endif

                                    <a href="{{ route('brand.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
