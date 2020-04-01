<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    function __construct()

    {

        $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','addPost']]);

        $this->middleware('permission:slider-create', ['only' => ['add','addPost']]);

        $this->middleware('permission:slider-edit', ['only' => ['edit','editPost']]);

        $this->middleware('permission:slider-delete', ['only' => ['delete']]);

    }

    public function index() {
        $sliders = Slider::orderBy('sort')->paginate(8);

        return view('admin.slider.all', compact('sliders'));
    }

    public function add() {
        return view('admin.slider.add');
    }

    public function addPost(Request $request) {
        $messages = [
            'image.dimensions' => 'The image dimension should be 1680x750 px',
        ];

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'title' => 'required|max:191',
            'sub_title' => 'required|max:191',
            'sort' => 'required|integer|min:1'
        ]);

        // resize

        $image_path='uploads/'.$request->image->store('slider');

        $img = Image::make($image_path);

        $img->resize(1920, 650);

        $img->save(public_path($image_path), 70);




        $slider = new Slider();

        $slider->sort = $request->sort;
        $slider->image =$image_path;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->save();

        $request->session()->flash('success','Slider Create successfully');


        return redirect()->route('all.slider');
    }

    public function edit($id) {

        $slider=Slider::find($id);


        return view('admin.slider.edit', compact('slider'));
    }

    public function editPost($id,Request $request) {

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'title' => 'required|max:191',
            'sub_title' => 'required|max:191',
            'sort' => 'required|integer|min:1'
        ]);

        $slider = Slider::find($id);

        if ($request->image) {


            unlink($slider->image);

            // resize

            $image_path='uploads/'.$request->image->store('slider');

            $img = Image::make($image_path);

            $img->resize(1920, 650);

            $img->save(public_path($image_path), 70);

            $slider->image =$image_path;
        }


        $slider->sort = $request->sort;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->save();

        $request->session()->flash('success','Slider Update Successfully');

        return redirect()->route('all.slider');
    }

    public function delete(Request $request,$id) {
        $slider = Slider::find($id);
        unlink($slider->image);

        $slider->delete();

        $request->session()->flash('success','Slider Delete successfully');

        return redirect()->back();
    }


}
