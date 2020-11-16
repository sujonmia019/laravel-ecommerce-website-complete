@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Single Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="m-0">Product Details</h3>
        </div>
        <div class="col-lg-12 col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Product
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list-ul"></i> Product List</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td class="w-50">Product Name</td>
                            <td class="w-50">{{ $Product->name }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Category</td>
                            <td class="w-50">{{ $Product->category->name }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Brand</td>
                            <td class="w-50">{{ $Product->brand->name }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Product Color</td>
                            <td class="w-50">
                                @foreach ($Color as $value)
                                    {{ $value->color->name }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Product Size</td>
                            <td class="w-50">
                                @foreach ($Size as $value)
                                    {{ $value->size->name }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Short Description</td>
                            <td class="w-50">{{ $Product->short_desc }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Long Description</td>
                            <td class="w-50">{{ $Product->long_desc }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Product Price</td>
                            <td class="w-50">{{ $Product->price }}</td>
                        </tr>
                        <tr>
                            <td class="w-50">Product image</td>
                            <td class="w-50">
                                <img width="70px" height="70px" src="{{ asset('public/backend/img/product_image/'.$Product->image) }}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Product Gallery</td>
                            <td class="w-50">
                                <div class="image">
                                    @foreach ($Multi_image as $image)
                                        <img width="70px" height="70px" class="mb-2 border border-secondary" src="{{ asset('public/backend/img/product_image/sub_image/'.$image->sub_image) }}" alt="">
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
