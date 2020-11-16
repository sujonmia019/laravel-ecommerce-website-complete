@extends('backend.layout.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <span class="breadcrumb-item active">Pending Order</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 d-flex justify-content-between">Pending Order List</h5>
                </div>
                <div class="card-body">
                    <table id="contact" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order NO</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($Pending as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td># {{ $item->order_number }}</td>
                                    <td>{{ $item->order_total }} TK</td>
                                    <td>
                                        {{ ucwords($item->payment->method)}}
                                        @if ($item->payment->method == 'bkash')
                                        Transection No: {{ $item->payment->transaction_no }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-primary font-weight-normal">Approved</span>
                                        @else
                                            <span class="badge badge-danger font-weight-normal">Unpproved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button title="Approved" onclick="approve({{  $item->id }})" class="btn btn-sm btn-primary"><i class=" fa fa-check"></i></button>

                                        <form id="delete-form-{{ $item->id }}" action="{{ route('approve.order', $item->id) }}" method="POST">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('swetalertjs')
    <script>
        function approve(id){
            swal({
                title: "Are You Sure Approved?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-form-'+id).submit();
                    }
            });
        }

        $('#productTable').dataTable();
    </script>
@endpush