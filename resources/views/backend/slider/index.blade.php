@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Slider</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Slider List
                        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-primary">Add New Slider</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="contact" class="table table-bordered text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Sub_Hadding</th>
                                <th class="text-center">Hadding</th>
                                <th class="text-center">is_Approved</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($Slider as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <img style="width: 70px;height: 70px;" src="{{ asset('public/frontend/images/slider/'.$item->image) }}" alt="">
                                </td>
                                <td>{{ Str::of($item->sub_hadding)->limit(50) }}</td>
                                <td>{{ $item->hadding }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">Approved</span>
                                    @else 
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div>
                                            <form action="{{route('slider.destroy', $item->id)}}" method="POST" class="mr-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete?')"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>

                                        <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-sm btn-primary mr-1" title="Slider Edit"><i class="fa fa-edit"></i></a>
    
                                        @if ($item->status == 1)
                                            <a href="{{ route('slider.pending', $item->id) }}" class="btn btn-sm btn-danger" title="Slider Pending"><i class="fa fa-arrow-down"></i></a>
                                        @else 
                                            <a href="{{ route('slider.approved', $item->id) }}" class="btn btn-sm btn-success" title="Slider Approved"><i class="fa fa-arrow-up"></i></a>
                                        @endif
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
