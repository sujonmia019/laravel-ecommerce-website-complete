<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\order;
use App\Model\OrderDetail;
use App\Model\Payment;
use App\Model\Setting;
use App\Model\Shipping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Cart;

class CheckoutController extends Controller
{
    // login form
    public function customerlogin(){
        $Setting = Setting::find(1);
        return view('frontend.customer-login', compact('Setting'));
    }

    // Email Verify
    public function verify(){
        $Setting = Setting::find(1);
        return view('frontend.cunstomer-verify', compact('Setting'));
    }

    // register form
    public function customerreg(){
        $Setting = Setting::find(1);
        return view('frontend.customer-reg', compact('Setting'));
    }

    // customer register
    public function signupstore(Request $request) {
        $request->validate([
            'name'              => 'required|max:30',
            'email'             => 'required|unique:users,email',
            'mobile'            => 'required|unique:users,mobile|digits:11',
            'password'          => 'required|min:8',
            'confirm_password'  => 'required_with:password|same:password|min:8'
        ]);

        $Code = rand(0000, 9999);
        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'usertype' => 'customer',
            'mobile'=> $request->mobile,
            'password'  => Hash::make($request->password),
            'status'    => '0',
            'code'  => $Code
        ]);

        Mail::send('frontend.mail.customer',[
            'name'  => $request->name,
            'email' => $request->email,
            'code'  => $Code
        ],function($mail)use($request){
            $mail->from('sujonbdjoin019@gmail.com','Furniture Shop BD');
            $mail->to($request->email)->subject('Please verify your email address');
        });

        return redirect()->route('customer.verify')->with('message', 'Your have successfull sign up, verify your eamil');

    }

    // customer login
    public function signin(Request $request) {
        $request->validate([
            'email'      => 'required',
            'password'   => 'required|min:8',
        ]);

        return redirect()->back();
    }

    // Email Verify
    public function verifystore(Request $request){
        $request->validate([
            'email' =>  'required',
            'code'  =>  'required',
        ]);

        $CheckEmail = User::where('email',$request->email)->
        where('code',$request->code)->first();

        if($CheckEmail){
            $CheckEmail->status = '1';
            $CheckEmail->save();
            $notification = array(
                'message'   =>  'Your have succesfull varified. please login',
                'alert-type'   =>  'success'
            );
            return redirect()->route('customer.login')->with($notification);
        }
        else{
            $notification = array(
                'message'   =>  'Sorry! your email or varification code does not match',
                'alert-type'   =>  'error'
            );
            return redirect()->route('customer.verify')->with($notification);
        }
    }

    // checkout page
    public function checkout(){
        $Setting = Setting::find(1);
        return view('frontend.checkout', compact('Setting'));
    }

    // checkout store
    public function checkOutStore(Request $request){
       $request->validate([
            'name'          =>  'required',
            'city'          =>  'required',
            'state'         =>  'required',
            'postal_code'   =>  'required',
            'mobile'        =>  'required|digits:11|unique:shippings,mobile',
            'address'       =>  'required'
       ]);

        $Store = Shipping::create([
            'user_id'   =>  Auth::user()->id,
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'city'      =>  $request->city,
            'state'     =>  $request->state,
            'zip_code'  =>  $request->postal_code,
            'mobile'    =>  $request->mobile,
            'address'   =>  $request->address
        ]);

        if($Store){
            Session::put('shipping_id',[
                'id'    =>  $Store->id
            ]);
            
            $notification = array(
                'message'       =>  'Shpping infomation added successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('customer.payment')->with($notification);
        }
    }

    // customer payment method
    public function payment() {
        $Setting = Setting::find(1);
        return view('frontend.payment', compact('Setting'));
    }

    // payment store
    public function paymentStore(Request $request){
        if($request->payment_method == 'bkash' && $request->transection == NULL){
            return redirect()->back()->with('message', 'Please enter your transection number');
        }
        else{

        
            $request->validate([
                'payment_method'    =>  'required'
            ]);
            
            $Payment = Payment::create([
                'method'    =>  $request->payment_method,
                'transaction_no'    =>  $request->transection
            ]);
            $order_data = order::orderby('id','DESC')->first();
            if($order_data == NULL){
                $firstReg = '0';
                $order_no = $firstReg + 1;
            }else{
                $order_data = order::orderby('id','DESC')->first()->order_number;
                $order_no = $order_data + 1;
            }
            $shiping_id = session::get('shipping_id')['id'];
            $Orders = order::create([
                'user_id'   =>  Auth::user()->id,
                'shipping_id'   =>  $shiping_id,
                'payment_id'    =>  $Payment->id,
                'order_number'  =>  $order_no,
                'order_total'   =>  $request->order_total,
                'status'        =>  0
            ]);
            $Contents = Cart::getContent();
            foreach($Contents as $item){
                OrderDetail::create([
                    'order_id'  =>  $Orders->id,
                    'product_id'    =>  $item->id,
                    'color_id'      =>  $item->attributes->color_id,
                    'size_id'       =>  $item->attributes->size_id,
                    'quantity'      =>  $item->quantity
                ]);
            }
            
            Cart::clear();
            return redirect()->route('order.list');
        }
    }


}

