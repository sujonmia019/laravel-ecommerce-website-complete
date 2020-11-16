@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Order details</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Order Details
                        <a href="{{ route('order.approved') }}" class="btn btn-sm btn-primary"><i class="fas fa-list-ul"></i> Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center table-responsive">
                        <tr>
                            <td colspan="3"><h5><strong>Order NO: # {{ $OrderDetails->order_number }}</strong></h5></td>
                        </tr>
                        <tr>
                            <td><strong>Billing info:</strong></td>
                            <td colspan="2" class="text-left">
                                <strong>Name:</strong> <span>{{$OrderDetails->shipping->name }}</span>&nbsp;&nbsp;
                                <strong>E-mail:</strong> <span>{{$OrderDetails->shipping->email }}</span>&nbsp;&nbsp;
                                <strong>Mobile:</strong> <span>{{$OrderDetails->shipping->mobile }}</span>&nbsp;&nbsp;<br>
                                <strong>City:</strong> <span>{{$OrderDetails->shipping->city }}</span>&nbsp;&nbsp;
                                <strong>State:</strong> <span>{{$OrderDetails->shipping->state }}</span>&nbsp;&nbsp;
                                <strong>Zip Code:</strong> <span>{{$OrderDetails->shipping->zip_code }}</span>&nbsp;&nbsp;
                                <strong>Address:</strong> <span>{{$OrderDetails->shipping->address }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Payment:</strong></td>
                            <td colspan="2" class="text-left">
                                {{ ucwords($OrderDetails->payment->method)}}
                                @if ($OrderDetails->payment->method == 'bkash')
                                Transection No: {{ $OrderDetails->payment->transaction_no }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><h5 class="font-weight-bold">Order Details</h5></td>
                        </tr>
                        <tr>
                            <td><strong>Product Name & image</strong></td>
                            <td><strong>Color & Size</strong></td>
                            <td><strong>Quantity & Price</strong></td>
                        </tr>

                        @foreach ($OrderDetails->order_details as $item)
                            <tr>
                                <td class="d-flex justify-content-center text-left border-0">
                                    <img width="50px" height="55px" class="mr-1" src="{{ asset('public/backend/img/product_image/'.$item->product->image) }}" alt="">
                                    <span>{{ $item->product->name }}</span>
                                </td>
                                <td>
                                    <span>{{ $item->colors->name }}</span>&nbsp; & &nbsp; 
                                    <span>{{ $item->sizes->name }}</span>
                                </td>
                                <td>
                                    <span>{{ $item->quantity }} x {{ $item->product->price }} = {{ $item->quantity * $item->product->price }} TK</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><strong>Grand Total</strong></td>
                                <td>{{ $OrderDetails->order_total }} TK</td>
                            </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
