<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EventParticipateReplyMail;
use App\Models\Event;
use App\Models\Member;
use App\Models\MemberPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    function __construct()

    {
        $this->middleware('permission:member-approved-list', ['only' => ['approvedMemberList']]);
        $this->middleware('permission:member-unapproved-list', ['only' => ['unapprovedMemberList','memberPaymentDetails']]);

        $this->middleware('permission:event-approved-list', ['only' => ['evenJoinApprovedParticipateList','evenParticipateReplyMail','eventDocumentDetails']]);
       $this->middleware('permission:event-unapproved-list', ['only' => ['evenJoinUnapprovedList','evenJoinApprovedParticipate','eventPaymentDetails']]);
    }


    public function addMemberForm()
    {
        return view('admin.member.add_new_member');
    }




    public function unapprovedMemberList()
    {
        $members=Member::orderBy('id')->where('is_member',2)->paginate(10);
        return view('admin.member.unapproved_member',compact('members'));
    }
    public function approvedMemberList()
    {
        $members=Member::orderBy('id')->where('is_member',1)->paginate(10);
        return view('admin.member.approved_member',compact('members'));
    }
    public function approvedMember($id,Request $request)
    {
        Member::where('id',$id)->update([
            'is_member'=>1,
        ]);
        $request->session()->flash('success','Member successfully Approved');
        return redirect()->back();
    }
    public function memberSuspend($id,Request $request)
    {
        Member::where('id',$id)->update([
            'is_member'=>2,
        ]);
        $request->session()->flash('success','Member Suspend Successful');
        return redirect()->back();
    }
    public function memberPaymentDetails(Request $request) {
        $memberPayment = MemberPayment::where('member_id', $request->id)->first()->toArray();
        $memberPayment['bank_cheque'] = asset($memberPayment['bank_cheque']);

        return response()->json($memberPayment);
    }



    public function evenJoinUnapprovedList()
    {

        $events = Event::with('members')->get();

        return view('admin.event_join.unapproved_list',compact('events'));
    }
    public function eventPaymentDetails(Request $request)
    {




        $event_member_payment=DB::table('event_member')
            ->where('member_id',$request->member_id)
            ->where('event_id',$request->event_id)
            ->where('exhibition_category',$request->ex_category)
            ->first();
        $event_member_payment->bank_cheque=$event_member_payment->bank_cheque ==null ? '' : asset($event_member_payment->bank_cheque);

        return response()->json($event_member_payment);
    }

    public function eventDocumentDetails(Request $request)
    {
        $event_document=DB::table('event_member')
            ->where('member_id',$request->member_id)
            ->where('event_id',$request->event_id)
            ->first();

        $event_document->abstract_doc_file=asset($event_document->abstract_doc_file);
        $event_document->presentation_ppt_file=asset($event_document->presentation_ppt_file);

        return response()->json($event_document);
    }

    public function eventMemberDetails(Request $request)
    {
        $member_details=DB::table('members')
            ->where('id',$request->member_id)
            ->first();

        $member_details->profile_image=asset($member_details->profile_image);


        return response()->json($member_details);
    }



    public function evenJoinApprovedParticipate($member,$event,$category)
    {

        if ($category == '0')
            $category = null;

        $result = DB::table('event_member')
            ->where('member_id',$member)
            ->where('event_id',$event)
            ->where('exhibition_category',$category)
            ->update([
                'payment_status'=>1
            ]);

        return redirect()->back()->with('success','Approve this Payment Event');
    }

    public function evenJoinApprovedParticipateList()
    {
        $events = Event::with('members')->paginate(10);
        return view('admin.event_join.approved_event', compact('events'));


    }
    public function evenParticipateReplyMail(Request $request)
    {

        $member=Member::find($request->member_id);
        $message=$request->message;


        Mail::to([$member->email])->send(new EventParticipateReplyMail($message));

        $request->session()->flash('success','Mail Send Successfully');

        return redirect()->back();
    }



}
