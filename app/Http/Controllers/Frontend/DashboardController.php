<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\order;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
 
class DashboardController extends Controller
{
    // dashboard
    public function dashboard(){
        $Setting = Setting::find(1);
        $Profile = Auth::user();

        return view('frontend.customer-dashboard', compact('Setting','Profile'));
    }

    // customer profile
    public function customerprofile(){
        $Setting = Setting::find(1);
        $Profile = Auth::user();
        return view('frontend/customer-profile/index',compact('Setting','Profile'));
    }

    // customer profile edit
    public function customerProfileEdit(){
        $Setting = Setting::find(1);
        $Profile = Auth::user();
        return view('frontend/customer-profile/edit',compact('Setting','Profile'));
    }

    // customer profile update
    public function myProfileUpdate(Request $request) {
        $id = Auth::user()->id;
        $request->validate([
            'name'    =>  'required',
            'gender'  =>  'required',
            'address' =>  'required',
            'profile' =>  'required'
        ]);

        $Photo = Auth::user()->image;
        if($Photo){
            unlink(public_path('frontend/images/customer/'.$Photo));
        }

        // image upload
        if($request->file('profile')){
            $img = $request->file('profile');
            $image_name = uniqid().time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(120, 120)->save(public_path('frontend/images/customer/'.$image_name));
        }

        $Update = User::findOrFail($id)->update([
            'name'    => $request->name,
            'gender'  => $request->gender,
            'address' => $request->address,
            'image'   => $image_name
        ]);

        if($Update){
            $notification = array(
                'message'   => 'Profile Updated Successfull.',
                'alert-type'=>  'success'
            );

            return redirect()->route('customer.profile')->with($notification);
        }
    }

    // password change index
    public function customerPassChange(){
        $Setting = Setting::find(1);
        return view('frontend/customer-profile/change-pass', compact('Setting'));
    }

    // password update
    public function myPassChange(Request $request){
        $user = Auth::user();
        $request->validate([
            'old_password'      =>  'required|min:8',
            'new_password'      =>  'required|min:8',
            'confirm_password'  =>  'required_with:new_password|same:new_password|min:8'
        ]);

        $oldPass = $request->old_password;
        $newPass = $request->new_password;

        if(Hash::check($oldPass, $user->password) == true){
            $update = User::findOrFail($user->id)->update([
                'password'  => Hash::make($newPass)
            ]);

            if($update){
                $notification = array(
                    'message'   => 'Password Change Successfull.',
                    'alert-type'=>  'success'
                );
                Auth::logout();
                return redirect()->route('customer.login')->with($notification);
            }

        }
        else{
            $notification = array(
                'message'   => 'Old password does not match !',
                'alert-type'=>  'error'
            );
            return redirect()->route('customer.pass.change')->with($notification);
        }
    }

    // Order List 
    public function orderList(){
        $Setting = Setting::find(1);
        $Order = order::with('payment')->orderby('id','DESC')->get();
        return view('frontend.customer-profile.order-list', compact('Setting','Order'));
    }

    // Order Details 
    public function orderDetails($id){
        $OrderDetails = order::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if($OrderDetails == false){
            $notification = array(
                'message'   =>  'Do not try to be over smart!',
                'alert-type'    =>  'error'
            );
            return redirect()->route('order.list')->with($notification);
        }
        else{
            $Setting = Setting::find(1);
            $OrderDetails = order::with('payment','shipping','order_details')->where('id', $id)->where('user_id', Auth::user()->id)->first();
            return view('frontend.customer-profile.order-details', compact('OrderDetails','Setting'));
        }
    }

    // Order Print 
    public function orderprint($id){
        $Setting = Setting::find(1);
        $OrderDetails = order::with('payment','shipping','order_details')->where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('frontend.customer-profile.order-print', compact('OrderDetails','Setting'));
    }

}
