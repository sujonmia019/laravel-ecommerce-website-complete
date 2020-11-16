<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send_mail(Request $request) {
         // validator
         $request->validate([
            'fast_name'    => 'required',
            'email'        => 'required',
            'message'      => 'required'
        ]);

        // contact store
       $Send = Contact::insert([
            'fname'     =>  $request->fast_name,
            'mobile'    =>  $request->phone,
            'email'     =>  $request->email,
            'message'   =>  $request->message,
            'created_at'=>  Carbon::now()
        ]);

        Mail::send('frontend.mail.email',[
            'fname'  => $request->fast_name,
            'mobile' => $request->phone,
            'email' => $request->email,
            'msg'  => $request->message
        ],function($mail)use($request){
            $mail->from('sujonbdjoin019@gmail.com','Furniture Shop BD');
            $mail->to($request->email)->subject('Thanks for you contact');
        });

        // confirm message
        if($Send){
            $notification = array(
                'message'   =>  'your message successfully sent!',
                'alert-type'=>  'success'
            );
            return redirect()->route('contact.us')->with($notification);
        }

    }

    public function view() {
        $Contact = Contact::orderby('id', 'DESC')->get();
        return view('backend.contact.index', compact('Contact'));
    }

    // customer mail view and sent
    public function send($id) {
        $View = Contact::findOrFail($id);
        return view('backend.contact.view', compact('View'));
    }

    // customer mail delete
    public function delete($id) {
        $Delete = Contact::find($id)->delete();
        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'Customer Mail Deleted Successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('contact.view')->with($notification);
    }

}
