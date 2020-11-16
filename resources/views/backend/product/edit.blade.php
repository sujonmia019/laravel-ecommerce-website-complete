@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Edit Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Edit Product</h3>
        </div>
        <div class="col-lg-12 col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Update Product
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list-ul"></i> Product List</a>
                    </h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('product.update',$Edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-lg-4">
                                <label>Product Name</label>
                                <input type="text" name="product_name" value="{{ $Edit->name }}" class="form-control @error('product_name') is-invalid @enderror" required>
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                    <option value="">Choose One</option>
                                    @foreach ($Category as $item)
                                        <option value="{{ $item->id }}" {{ ($Edit->category_id==$item->id)?'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Brand</label>
                                <select name="brand" class="form-control  @error('brand') is-invalid @enderror">
                                    <option value="">Choose One</option>
                                    @foreach ($Brand as $item)
                                        <option value="{{ $item->id }}" {{ ($Edit->brand_id==$item->id)?'selected':'' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label>Product Color</label>
                                <select name="color[]" class="form-control select2 w-100 @error('color') is-invalid @enderror" multiple required>
                                    @foreach ($Color as $item)
                                        <option value="{{ $item->id }}"
                                            @foreach ($Color_Array as $color)
                                                @if ($item->id==$color->color_id)
                                                    selected="selected"
                                                @endif
                                            @endforeach
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label>Product Size</label>
                                <select name="size[]" class="form-control select2 w-100 @error('size') is-invalid @enderror" multiple required>
                                    @foreach ($Size as $item)
                                        <option value="{{ $item->id }}"
                                            @foreach ($Size_Array as $size)
                                                @if ($item->id==$size->size_id)
                                                    selected="selected"
                                                @endif
                                            @endforeach
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Product Price</label>
                                <input type="text" name="product_price" value="{{ $Edit->price }}" class="form-control @error('product_price') is-invalid @enderror" required>
                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label>Short Description</label>
                                <textarea name="short_description" rows="4" class="form-control @error('short_description') is-invalid @enderror" required>{{ $Edit->short_desc }}</textarea>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Long Description</label>
                                <textarea name="long_description" rows="4" class="form-control @error('long_description') is-invalid @enderror" required>{{ $Edit->long_desc }}</textarea>
                                @error('long_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-2">
                                <label>Product image</label>
                                <input type="file" name="product_image" required>
                                @error('product_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2 text-center">
                                <img width="100px" height="100px" class="border border-secondary" src="{{ asset('public/backend/img/product_image/'.$Edit->image) }}" alt="">
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Sub image</label>
                                <input type="file" name="sub_image[]" multiple>
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="image text-center">
                                    @foreach ($multi_image as $item)
                                    <img width="100px" height="100px" class="mb-2 border border-secondary" src="{{ asset('public/backend/img/product_image/sub_image/'.$item->sub_image) }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
