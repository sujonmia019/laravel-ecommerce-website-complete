@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Setting</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Theme Setting</h3>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header pt-4">
                    <h5 class="m-0">Setting</h5>
                </div>
                <div class="card-body">
                   <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_logo" value="{{ $logos->logo }}" class="form-control">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="phone" class="form-control form-control-sm" required>
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control form-control-sm" required>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" required>
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control form-control-sm" required>
                            @error('facebook')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" name="twitter" class="form-control form-control-sm" required>
                            @error('twitter')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" name="youtube" class="form-control form-control-sm" required>
                            @error('youtube')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Linkdin</label>
                            <input type="text" name="linkdin" class="form-control form-control-sm" required>
                            @error('linkdin')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Site Logo</label><br>
                            <input type="file" name="logo"><br>
                            @error('logo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="4" class="form-control" required></textarea>
                            @error('linkdin')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
