<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'  =>  'required',
            'password'  =>  'required'
        ]);

        $ValidData = User::where('email', $request->email)->first();
        $PasswordCheck = Hash::check($request->password, @$ValidData->password);
        if($PasswordCheck == false){
            $notification = array(
                'message'   =>  'Your email or password dose not match!',
                'alert-type'=>  'error'
            );
            return redirect()->back()->with($notification);
        }
        elseif($ValidData->status=='0'){
            $notification = array(
                'message'   =>  'Sorry ! your are not varified yet',
                'alert-type'=>  'error'
            );
            return redirect()->route('customer.verify')->with($notification);
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('login');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
}
