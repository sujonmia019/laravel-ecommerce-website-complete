<!DOCTYPE html>
<html>
<head>
    <title>Customer Invoice</title>
    <style type="text/css">
        table.myTable tr td{
            padding: 10px !important;
        }
    </style>
</head>
<body style="font-family: arial;">
    
    <table class="myTable" border="1" style="text-align: center; margin: auto;" width="900px">
        <tr>
            <td width="30%"><img src="{{ asset('public/frontend/images/logo/'.$Setting->logo) }}" alt=""></td>
            <td width="40%">
                <h4 style="margin-bottom: 10px;"><strong>ShopBD</strong></h4>
                <span><strong>Mobile No:</strong> {{ $Setting->phone }}</span><br>
                <span><strong>E-mail:</strong> {{ $Setting->email }}</span>
            </td>
            <td width="30%">
                <strong>Order NO:</strong> # {{ $OrderDetails->order_number }}
            </td>
        </tr>
        <tr style="text-center">
            <td><strong>Billing info:</strong></td>
            <td colspan="2" style="text-align:left">
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>Name:</strong> <span>{{$OrderDetails->shipping->name }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>E-mail:</strong> <span>{{$OrderDetails->shipping->email }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>Mobile:</strong> <span>{{$OrderDetails->shipping->mobile }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>City:</strong> <span>{{$OrderDetails->shipping->city }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>State:</strong> <span>{{$OrderDetails->shipping->state }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>Zip Code:</strong> <span>{{$OrderDetails->shipping->zip_code }}</span></p>
                <p style="width: 50%;float: left;margin-bottom: 0;"><strong>Address:</strong> <span>{{$OrderDetails->shipping->address }}</span></p>
            </td>
        </tr>
        <tr>
            <td><strong>Payment</strong></td>
            <td colspan="2" style="text-align:left">
                {{ ucwords($OrderDetails->payment->method)}}
                @if ($OrderDetails->payment->method == 'bkash')
                Transection No: {{ $OrderDetails->payment->transaction_no }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>Order Details</strong></td>
        </tr>
        <tr>
            <td><strong>Product Name & image</strong></td>
            <td><strong>Color & Size</strong></td>
            <td><strong>Quantity & Price</strong></td>
        </tr>

        @foreach ($OrderDetails->order_details as $item)
            <tr>
                <td class="d-flex justify-content-center text-left border-0">
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
                <td colspan="2" style="text-align:right"><strong>Grand Total</strong></td>
                <td>{{ $OrderDetails->order_total }} TK</td>
            </tr>
        @endforeach
        
    </table>
</body>
</html>