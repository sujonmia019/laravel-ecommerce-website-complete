<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index() {
        $logos = DB::table('Settings')->find(1);
        return view('backend.layout.setting', compact('logos'));
    }

    public function store(Request $request) {
        $logo = $request->old_logo;
        if($logo){
            unlink(public_path('frontend/images/logo/').$logo);
        }


        if($request->hasFile('logo')){
            $img = $request->file('logo');
            $image = md5(uniqid()).'.'.strtolower($img->getClientOriginalExtension());
            $Upload = $img->move(public_path('frontend/images/logo/'),$image);
        }
        // store data
        $Store = DB::table('Settings')->where('id', 1)->update([
            'phone'     =>  $request->phone,
            'email'     =>  $request->email,
            'address'   =>  $request->address,
            'facebook'  =>  $request->facebook,
            'twitter'   =>  $request->twitter,
            'youtube'   =>  $request->youtube,
            'linkdin'   =>  $request->linkdin,
            'description' =>  $request->description,
            'logo'        =>  $image,
            'created_by'  =>  Auth::user()->id,
            'created_at'  =>  Carbon::now()
        ]);

        // Confirm Message
        if($Store && $Upload) {
            $notification = array(
                'message' => 'Data Save Successfull !',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('setting')->with($notification);

    }
}
