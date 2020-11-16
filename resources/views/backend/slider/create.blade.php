@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Slider</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Slider Create
                        <a href="{{ route('slider.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list-ul"></i> Go to slider List</a>
                    </h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Sub Hadding</label>
                            <input type="text" name="sub_hadding" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Hadding</label>
                            <input type="text" name="hadding" class="form-control form-control-sm" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Slider image</label><br>
                            <input type="file" name="image" required>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" name="status" value="1" class="mr-1" id="publish">
                            <label for="publish">Publish</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
