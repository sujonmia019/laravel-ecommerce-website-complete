<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Model\order;
use App\Model\Setting;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //pending order
    public function orderPending(){
        $Pending = order::orderby('id','DESC')->where('status',0)->get();
        return view('backend.order.pending',compact('Pending'));
    }

    //approved order
    public function orderApproved(){
        $Approved = order::orderby('id','DESC')->where('status',1)->get();
        return view('backend.order.approved', compact('Approved'));
    }

    // Order Details 
    public function details($id){
        $OrderDetails = order::with('payment','shipping','order_details')->where('id', $id)->first();
        return view('backend.order.details', compact('OrderDetails'));
    }

    // approved order 
    public function approved($id){
        $Approve  = order::findOrFail($id)->update([
            'status'    =>  '1'
        ]);
        if($Approve){
            $notification = array(
                'message'   =>  'Order Approved!',
                'alert-type'    =>  'success'
            );

            return redirect()->route('order.pending')->with($notification);
        }

    }
}
