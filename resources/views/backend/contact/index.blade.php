@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Contact List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">All Contact</h3>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 d-flex justify-content-between">Contact List
                </h5>
            </div>
            <div class="card-body">
                <table id="contact" class="table table-bordered text-center table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($Contact as $value)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$value->fname}}</td>
                            <td>
                                @if ($value->mobile)
                                    {{$value->mobile}}
                                @else
                                    NULL
                                @endif
                            </td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->message}}</td>
                            <td>
                                <a id="delete" href="{{ route('contact.delete', $value->id) }}" class="btn btn-sm btn-danger">Delete</a>

                                <a href="{{ route('contact.send', $value->id) }}" class="btn btn-sm btn-primary">view</a>
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
