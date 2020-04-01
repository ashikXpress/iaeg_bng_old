<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\News;
use App\Models\Slider;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    function __construct()

    {
        $this->middleware('permission:about', ['only' => ['aboutUpdate','aboutUpdateSubmit','aboutImageSubmit','aboutImageSubmit','aboutImageDelete','aboutImageUpdate']]);
        $this->middleware('permission:social-links', ['only' => ['socialLinks','socialLinksUpdate']]);

    }

    public function index()
    {

        $data['slider']=Slider::count();
        $data['news']=News::count();
        $data['gallery']=Gallery::count();
        $data['event']=Event::count();
        $data['member']=Member::where('is_member',1)->count();
        return view('admin.dashboard',$data);

   }

    public function aboutUpdate()
    {
        $about=About::findOrFail(1);
        $about_images=AboutImage::orderBy('id','desc')->paginate(3);
        return view('admin.about_text',compact('about','about_images'));
   }

    public function aboutUpdateSubmit(Request $request)
    {
        About::where('id',1)->update([
            'title'=>$request->title,
            'mission_vision_title'=>$request->mission_vision_title,
            'description'=>$request->description,
            'mission_vision_description'=>$request->mission_vision_description,
        ]);
        return redirect()->back()->with('success','Update About Text');
   }

    public function aboutImageSubmit(Request $request)
    {
        $rule=[
            'image'=>'required',
        ];
        $request->validate($rule);
        $image_path='uploads/'.$request->image->store('about');

        // resize

        $img = Image::make($image_path);

        $img->resize(550, 450);

        $img->save(public_path($image_path), 60);


        $about_image=new AboutImage();
        $about_image->about_id=1;
        $about_image->image=$image_path;
        $about_image->save();

        return redirect()->back()->with('success','About Image Upload Successful.');

   }

    public function aboutImageDelete($id)
    {
        $img=AboutImage::find($id);
        unlink($img->image);
        $img->delete();

        return redirect()->back()->with('success','About image delete successfully');
   }

    public function aboutImageUpdate(Request $request)
    {
        $rule=[
            'image'=>'required',
        ];
        $request->validate($rule);
        $image_path='uploads/'.$request->image->store('about');

        // resize

        $img = Image::make($image_path);

        $img->resize(550, 450);

        $img->save(public_path($image_path), 60);

        $about=AboutImage::find($request->update_image_id);

        unlink($about->image);
        $about->image=$image_path;
        $about->save();

        return redirect()->back()->with('success','About Image Updated Successfully');
   }

    public function socialLinks()
    {
        $links=SocialLink::find(1);

        return view('admin.social_links',compact('links'));
   }

    public function socialLinksUpdate($id,Request $request)
    {
        $this->validate($request,[
            'facebook'=>'required',
            'twitter'=>'required',
            'youtube'=>'required',
            'linkend'=>'required',
            'google_plus'=>'required',
            'instragram'=>'required',
        ]);
        SocialLink::find($id)->update($request->all());
        return redirect()->back()->with('success','Social Links Update Successfully');
   }
}
