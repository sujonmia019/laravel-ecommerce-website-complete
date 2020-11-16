<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $Profile = User::find($id);
        return view('backend.user.profile.index', compact('Profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Profile = User::find($id);
        return view('backend.user.profile.edit', compact('Profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validator
        $request->validate([
            'address'       =>  'required',
            'gender'        =>  'required',
            'mobile'        =>  'unique:users,mobile|max:11',
        ]);
        $Photo = Auth::user()->image;
        if($Photo){
            unlink(public_path('backend/img/user_profile/'.$Photo));
        }
        // image upload
        if ($request->hasFile('profile_photo')) {
            $img = $request->file('profile_photo');
            $image_name = $request->name.'-'.uniqid().time().'.'.$img->getClientOriginalExtension();
            $Upload = Image::make($img)->resize(120, 120)->save(public_path('backend/img/user_profile/'.$image_name));
        }

        // update profile
        $Update = User::find($id)->update([
            'name'           => $request->name,
            'mobile'         => $request->mobile,
            'gender'         => $request->gender,
            'image'          => $image_name,
            'address'        => $request->address,
            'updated_at'     => Carbon::now()
        ]);

        // Confirm Message
        if($Update && $Upload) {
            $notification = array(
                'message' => 'User Profile Updated Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('profile.index')->with($notification);
    }

    /**
    * Change Password
    **/
    public function password(){
        return view('backend.user.profile.password');
    }

    public function change(Request $request){
        $id = Auth::user()->id;
        $password = Auth::user()->password;

        $request->validate([
            'old_password'       =>  'required|min:8',
            'new_password'       =>  'required|min:8',
            'confirm_password'   =>  'required_with:new_password|same:new_password|min:8'
        ]);


        // input value
    	$old_pass = $request->old_password;
    	$new_pass = $request->new_password;
        $con_pass = $request->confirm_password;

        if(Hash::check($old_pass, $password)==true){
            $update = User::find($id)->update([
                'password'  =>  Hash::make($new_pass)
            ]);

            // Confirm Message
            if($update) {
                $notification = array(
                    'message' => 'Password Change Successfully!',
                    'alert-type' => 'success'
                );
            }
            Auth::logout();
	    	return redirect()->route('login')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Old Password does not match!',
                'alert-type' => 'error'
            );
            return redirect()->route('change.password')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
