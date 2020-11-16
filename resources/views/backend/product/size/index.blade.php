@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Product Size List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Size List
                        <a href="{{ route('size.create') }}" class="btn btn-sm btn-primary">Create Size</a>
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
                            @foreach($Size as $value)
                                @php
                                    $size = App\Model\ProductSize::where('size_id', $value->id)->count();
                                @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->name}}</td>
                                <td class="d-flex justify-content-center">
                                    @if ($size<1)
                                        <form action="{{route('size.destroy', $value->id)}}" method="POST" class="mr-1">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    @endif
                                    <a href="{{ route('size.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
