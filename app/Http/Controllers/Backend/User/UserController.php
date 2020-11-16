<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::latest()->get();
        return view('backend.user.index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validator
        $request->validate([
            'role'              =>  'required',
            'name'              =>  'required',
            'email'             =>  'required',
            'password'          =>  'required|min:8',
            'confirm_password'  =>  'required_with:password|same:password|min:8'
        ]);

        // User Store
        $User = User::insert([
            'usertype'  =>  '1',
            'role'      =>  $request->role,
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'created_at'=>  Carbon::now()
        ]);

        // Confirm Message
        if($User) {
            $notification = array(
                'message' => 'User Created Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('user.index')->with($notification);

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
        $Edit = User::find($id);
        return view('backend.user.edit', compact('Edit'));
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
            'role'              =>  'required',
            'name'              =>  'required',
            'email'             =>  'required|unique:users,email',
        ]);

        // User Update
        $Update = User::find($id)->update([
            'role'      =>  $request->role,
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'updated_at'=>  Carbon::now()
        ]);

        // Confirm Message
        if($Update) {
            $notification = array(
                'message' => 'User Update Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = User::find($id)->delete();

        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'User Deleted Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('user.index')->with($notification);
    }
}
