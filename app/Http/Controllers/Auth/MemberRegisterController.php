<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MemberRegisterController extends Controller
{
    public function registerForm()
    {
        $member_types=MemberType::all();

        return view('auth.member_register',compact('member_types'));
    }

    public function register(Request $request)
    {


        $this->validate($request,[
            'first_name'=>'required|max:15',
            'middle_name'=>'required|max:15',
            'last_name'=>'required|max:15',
            'date_of_birth'=>'required|max:50',
            'email'=>'required|email|max:50|unique:members',
            'mobile_number'=>'required|max:20|unique:members',
            'contact_address'=>'required|max:100',
            'profile_image'=>'required|image|mimes:jpg,jpeg,png',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|min:6|max:100|same:password',
        ]);



        $image_path='uploads/'.$request->profile_image->store('profile_image');



        // resize

//        $img = Image::make($image_path);
//        dd($image_path);
//
//        $img->resize(260, 350);
//
//        $img->save(public_path($image_path), 70);
//


        $member=new Member();
        $member->first_name=$request->first_name;
        $member->middle_name=$request->middle_name;
        $member->last_name=$request->last_name;
        $member->date_of_birth=date('yy-m-d',strtotime($request->date_of_birth));
        $member->email=$request->email;
        $member->mobile_number=$request->mobile_number;
        $member->contact_address=$request->contact_address;
        $member->profile_image=$image_path;
        $member->password=bcrypt($request->password);
        $member->save();




            // Attempt to log the user in
            Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password,'status' =>1], $request->remember);

            // if successful, then redirect to their intended location
            $request->session()->flash('success','Registration and login successful');

            return redirect()->intended(route('member.dashboard'));


    }
}
