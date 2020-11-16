<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    //active customer
    public function index(){
        $Customer = User::latest()->where('usertype', 'customer')->where('status', '1')->get();
        return view('backend.customer.index', compact('Customer'));
    }

    //draft customer
    public function view(){
        $Customer = User::latest()->where('usertype', 'customer')->where('status', '0')->get();
        return view('backend.customer.draft-customer', compact('Customer'));
    }

    // draft customer delete
    public function draftdelete($id){
        $Draft = User::findOrFail($id);
        if(file_exists('public/backend/img/customer/'. $Draft->image) AND !empty($Draft->image) ){
            unlink(public_path('backend/img/customer/'.$Draft->image));
        }
        $Draft->delete();
        $notification = array(
            'message'   =>  'Draft Customer Deleted Successfull.',
            'alert-type'=>  'success'
        );
        return redirect()->route('draft.view')->with($notification);

    }


}
