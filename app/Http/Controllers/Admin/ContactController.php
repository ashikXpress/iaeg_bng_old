<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function __construct()

    {


        $this->middleware('permission:contact-mail-manage', ['only' => ['allContactMail','contactMailDelete','contactMailView','contactMailReply','contactMailReplySend']]);

    }


    public function allContactMail()
    {
      $mails=Contact::orderBy('id','desc')->simplePaginate(10);
      return view('admin.contact.all',compact('mails'));
   }

    public function contactMailDelete($id,Request $request)
    {
        Contact::findOrFail($id)->delete();
        $request->session()->flash('success','Mail delete successful');
        return redirect()->back();
   }

    public function contactMailView($id)
    {
        $mail=Contact::find($id);
        if ($mail->read_at==0){
            Contact::find($id)->update([
                'read_at'=>1
            ]);
        }


        return view('admin.contact.view',compact('mail'));
   }

    public function contactMailReply($id)
    {
        $mail=Contact::find($id);

        return view('admin.contact.reply',compact('mail'));
   }

    public function contactMailReplySend(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|max:50',
            'subject'=>'required|max:50',
            'message'=>'required|max:500',
        ]);
        $data=[
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];


        Mail::to(['ctashiqkhan@gmail.com'])->send(new ContactReplyMail($data));
        $request->session()->flash('success','Reply mail message successfully Send.');

        return redirect()->route('all.contact.mail');

    }

}
