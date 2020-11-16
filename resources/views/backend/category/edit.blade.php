@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Category Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Update Category</h3>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Edit Category
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list-ul"></i> Category List</a>
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

                    <form action="{{ route('category.update', $Edit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category" value="{{ $Edit->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
