<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Member;
use App\Models\MemberPayment;
use App\Models\MemberType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MemberController extends Controller
{
    public function dashboard()
    {
        $technical=Event::where('event_category_id',1)->count();
        $exhibition=Event::where('event_category_id',2)->count();
        $field=Event::where('event_category_id',3)->count();

        return view('member.dashboard',compact('technical','exhibition','field'));

    }

    public function memberJoinForm()
    {
        $member_id=Auth::guard('member')->user()->is_member;
        if ($member_id==0){
            $member_types=MemberType::paginate(4);
            return view('member.member_join',compact('member_types'));
        }else{
            return redirect()->route('member.dashboard');
        }

    }

    public function memberJoin(Request $request)
    {

        $rules = [
            'amount' => 'required',
            'payment_method' => 'required',
            'member_type' => 'required',
        ];

        if ($request->payment_method == 'bkash' || $request->payment_method == 'rocket')
            $rules['TrxID'] = 'required';
        else if ($request->payment_method == 'bank')
            $rules['bank_cheque'] = 'required';

        $request->validate($rules);
        $bank_cheque=null;
        if($request->bank_cheque){
            $bank_cheque='uploads/'.$request->bank_cheque->store('member_cheque');

        }

        $member_id=Auth::guard('member')->user()->id;
        $member_payment=new MemberPayment();
        $member_payment->member_id=$member_id;
        $member_payment->payment_method=$request->payment_method;
        $member_payment->amount=$request->amount;
        $member_payment->TrxID=$request->TrxID;
        $member_payment->bank_cheque=$bank_cheque;
        $member_payment->save();

        Member::where('id',$member_id)->update([
            'is_member'=>2,
            'member_type_id'=>$request->member_type,
        ]);

        return redirect()->back()->with('success','Your membership payment approval is pending');

    }


    public function eventTechnical()
    {
        $events = Event::orderBy('id', 'desc')->where('event_category_id', 1)->paginate(10);
        return view('member.technical_event_list', compact('events'));
    }

    public function eventDetails($id)
    {
        $event=Event::findOrFail($id);
        return view('member.event_details',compact('event'));
    }



    public function eventExhibition()
    {
        $events = Event::orderBy('id', 'desc')->where('event_category_id', 2)->paginate(10);
        return view('member.exhibition_event_list', compact('events'));
    }

    public function eventField()
    {
        $events = Event::orderBy('id', 'desc')->where('event_category_id', 3)->paginate(10);
        return view('member.field_event_list', compact('events'));
    }

    public function eventTechnicalJoinForm($id)
    {
        $event = Event::find($id);
        if ($event->event_category_id == 1) {
            return view('member.technical_event_join');
        }else{
            return redirect()->route('member.dashboard');
        }

    }

    public function eventTechnicalJoinSubmit(Request $request)
    {
        $rules = [
            'paper_title' => 'required',
            'author_affiliation' => 'required',
            'corresponding_email' => 'required',
            'abstract_doc_file' => 'required|mimes:doc,docx',
            'presentation_ppt_file' => 'required|mimes:ppt,pptx',
            'amount' => 'required',
            'payment_method' => 'required',
        ];

        if ($request->payment_method == 'bkash' || $request->payment_method == 'rocket'){
            $rules['TrxID'] = 'required';
        }else if ($request->payment_method == 'bank'){
            $rules['bank_cheque'] = 'required';
        }



        $request->validate($rules);
        $bank_cheque=null;
        $member = auth::guard('member')->user();



    if (!$member->events->contains($request->event_id)){

        $abstract_doc_file='uploads/'.$request->abstract_doc_file->store('event_file');
        $presentation_ppt_file='uploads/'.$request->presentation_ppt_file->store('event_file');
        if($request->bank_cheque){
            $bank_cheque='uploads/'.$request->bank_check->store('event_file');

        }

        $member->events()->attach($request->event_id,[
            'paper_title' => $request->paper_title,
            'author_affiliation' => $request->author_affiliation,
            'corresponding_email' => $request->corresponding_email,
            'abstract_doc_file' => $abstract_doc_file,
            'presentation_ppt_file' => $presentation_ppt_file,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'TrxID' => $request->TrxID,
            'bank_cheque' =>$bank_cheque,
            'date' =>Carbon::now(),
        ]);
        $request->session()->flash('success', 'Wait till confirm your Payment');
    }else{
        $request->session()->flash('error', 'You are already participated this event');

    }




        return redirect()->back();

    }

    public function eventExhibitionJoinForm($id)
    {
        $event = Event::find($id);
        if ($event->event_category_id == 2) {
            return view('member.exhibition_event_join');
        }else{
            return redirect()->route('member.dashboard');
        }

    }

    public function eventExhibitionJoinSubmit(Request $request)
    {
        $rules = [
            'exhibition_category' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
        ];

        if ($request->payment_method == 'bkash' || $request->payment_method == 'rocket')
        {
            $rules['TrxID'] = 'required';
        }else if($request->payment_method == 'bank')
        {
            $rules['bank_cheque'] = 'required';
        }

        $request->validate($rules);
        $bank_cheque=null;
        $member = auth::guard('member')->user();


        $exist = DB::table('event_member')->where('event_id',$request->event_id)
            ->where('member_id',$member->id)
            ->where('exhibition_category',$request->exhibition_category)
            ->first();

        if ($exist) {
            $request->session()->flash('error', 'You are already participated this event');

        } else{

            if($request->bank_cheque){
                $bank_cheque='uploads/'.$request->bank_cheque->store('event_file');

            }
            $member->events()->attach($request->event_id,[
                'payment_method' => $request->payment_method,
                'amount' => $request->amount,
                'TrxID' => $request->TrxID,
                'bank_cheque' =>$bank_cheque,
                'exhibition_category' =>$request->exhibition_category,
                'date' =>Carbon::now(),
            ]);

            $request->session()->flash('success', 'Wait till confirm your Payment');

        }

        return redirect()->back();
    }

    public function eventFieldJoinForm($id)
    {
        $event = Event::find($id);
        if ($event->event_category_id == 3) {
            return view('member.field_event_join');
        }else{
            return redirect()->route('member.dashboard');
        }
    }

    public function eventFieldJoinSubmit(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'payment_method' => 'required',
        ];

        if ($request->payment_method == 'bkash' || $request->payment_method == 'rocket')
        {
            $rules['TrxID'] = 'required';
        }else if($request->payment_method == 'bank')
        {
            $rules['bank_cheque'] = 'required';
        }

        $request->validate($rules);
        $bank_cheque=null;
        $member = auth::guard('member')->user();


        if (!$member->events->contains($request->event_id)){
            if($request->bank_cheque){
                $bank_cheque='uploads/'.$request->bank_cheque->store('event_file');

            }
            $member->events()->attach($request->event_id,[
                'payment_method' => $request->payment_method,
                'amount' => $request->amount,
                'TrxID' => $request->TrxID,
                'bank_cheque' =>$bank_cheque,
                'date' =>Carbon::now(),
            ]);

            $request->session()->flash('success', 'Wait till confirm your Payment');

        }else{
            $request->session()->flash('error', 'You are already participated this event');

        }

        return redirect()->back();
    }
}
