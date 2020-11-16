@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Contact Mail</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Customer Mail</h3>
        </div>
        <div class="col-lg-6 col-sm-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Customer Sent Mail
                        <a href="{{ route('contact.view') }}" class="btn btn-sm btn-primary">Go to mail list</a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ $View->fname }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{ $View->mobile }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="{{ $View->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" rows="5" class="form-control">{{ $View->message }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-block btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
