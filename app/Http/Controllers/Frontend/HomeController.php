<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\CategoryGallery;
use App\Models\CategoryNews;
use App\Models\Contact;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function home()
    {

        $data['sliders']=Slider::orderBy('sort','asc')->get();
        $data['about']=About::with('images')->where('id',1)->first();

        $data['news']=News::orderBy('upload_date','desc')->where('category_id',1)->latest()->take(6)->get();
        $data['events']=Event::latest()->take(6)->get();
        $data['members']=Member::where('is_member',1)->latest()->take(4)->get();
        $data['galleries']=Gallery::latest()->take(8)->get();
        $data['technical_event_count']=Event::where('event_category_id',1)->count();
        $data['exhibition_event_count']=Event::where('event_category_id',2)->count();
        $data['field_event_count']=Event::where('event_category_id',3)->count();

        $data['foundry_member_count']=Member::where('is_member',1)->where('member_type_id',1)->count();
        $data['current_member_count']=Member::where('is_member',1)->where('member_type_id',2)->count();
        $data['student_member_count']=Member::where('is_member',1)->where('member_type_id',3)->count();
        $data['new_member_count']=Member::where('is_member',1)->where('member_type_id',4)->count();
        $data['non_member_count']=Member::where('is_member',0)->count();


        return view('frontend.home',$data);
    }

    public function about()
    {
        $about=About::with('images')->where('id',1)->first();
        return view('frontend.about',compact('about'));
    }

    public function news($id){

        $news_name=CategoryNews::findOrFail($id);
        $news=News::orderBy('upload_date','desc')->where('category_id',$id)->paginate(12);

        return view('frontend.news',compact('news','news_name'));
    }

    public function newsDetails($id)
    {
        $news=News::findOrFail($id);
        return view('frontend.single_news',compact('news'));
    }
    public function event($id){

        $event_name=EventCategory::findOrFail($id);
        $events=Event::where('event_category_id',$id)->paginate(12);

        return view('frontend.event',compact('events','event_name'));
    }

    public function eventDetails($id)
    {
        $event=Event::find($id);
        return view('frontend.single_event',compact('event'));
    }

    public function gallery($id)
    {
        $gallery_category=CategoryGallery::findOrFail($id);

        $galleries=Gallery::where('category_id',$id)->paginate(12);

        return view('frontend.gallery',compact('galleries','gallery_category'));
    }

    public function member($id)
    {
        if($id==5){
            $member_type=MemberType::findOrFail($id);
            $members=Member::where('is_member',0)->where('status',1)->paginate(16);

        }else{
            $member_type=MemberType::findOrFail($id);
            $members=Member::where('is_member',1)->where('member_type_id',$id)->where('status',1)->paginate(166);

        }

        return view('frontend.member',compact('members','member_type'));
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactMail(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|max:20',
            'subject' => 'required|max:50',
            'message' => 'required|max:500'
        ]);

        $data= [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Contact::create($data);

        Mail::to(['ctashiqkhan@gmail.com'])->send(new ContactMail($data));

        $request->session()->flash('success','Message Send Successfully');
        return redirect()->back();
    }
}
