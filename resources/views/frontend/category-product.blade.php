@extends('frontend.layout.frontend_master')
@section('frontend_content')


	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('public/frontend')}}/images/bg-01.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl0 txt-center font-weight-bold">Category Product</h2>
                </div>
            </div>
        </div>
	</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('product.list') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">All Products</a>
                @foreach ($Category as $item)
                <a href="{{ route('category.product', $item->category_id) }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">{{ $item->category->name }}</a>
                @endforeach
            </div>
            
        </div>

        <div class="row isotope-grid">

            @foreach ($Product as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{asset('public/backend/img/product_image/'.$item->image)}}" alt="IMG-PRODUCT">

                            <a href="{{ route('product.details',$item->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                {{-- js-show-modal1 --}}
                                Add to Card
                            </a>
                        </div>

                        <div class="block2-txt flex-w p-t-14">
                            <div class="block2-txt-child1 text-center">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 d-block">
                                    {{ $item->name }}
                                </a>

                                <span class="stext-105 cl3">
                                    TK {{ $item->price }}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>








@endsection
