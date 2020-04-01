<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class GalleryController extends Controller
{
    function __construct()

    {

        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index','addPost']]);

        $this->middleware('permission:gallery-create', ['only' => ['add','addPost','galleryCategory','galleryCategorySave']]);

        $this->middleware('permission:gallery-edit', ['only' => ['editGallery','updateGallery']]);

        $this->middleware('permission:gallery-delete', ['only' => ['deleteGallery']]);

    }


    public function index() {
        $galleries = Gallery::with('categoryName')->paginate(8);

           return view('admin.gallery.all', compact('galleries'));

    }

    public function add() {
        $categories=CategoryGallery::all();
        return view('admin.gallery.add',compact('categories'));
    }

    public function addPost(Request $request) {


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'title' => 'required|max:191',
            'category' => 'required',
        ]);
        $image_path='uploads/'.$request->image->store('gallery');



        // resize


        $img = Image::make($image_path);

        $img->resize(360, 250);

        $img->save(public_path($image_path), 70);


        $gallery = new Gallery();
        $gallery->image = $image_path;
        $gallery->title = $request->title;
        $gallery->category_id = $request->category;
        $gallery->save();

        $request->session()->flash('success','Gallery Create successfully');


        return redirect()->route('all.gallery');
    }

    public function editGallery($id) {

        $gallery=Gallery::find($id);
        $categories=CategoryGallery::all();


        return view('admin.gallery.edit', compact('gallery','categories'));
    }

    public function updateGallery($id,Request $request) {

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'title' => 'required|max:191',
            'category' => 'required',
        ]);

        $gallery = Gallery::find($id);

        if ($request->image) {


            unlink($gallery->image);

            //$image_path='uploads/'.$request->image->store('gallery');

            $image_path='uploads/'.$request->image->store('gallery');


            // resize
            $img = Image::make($image_path);

            $img->resize(360, 250);

            $img->save(public_path($image_path), 70);
            $gallery->image =$image_path;

        }
        $gallery->title = $request->title;
        $gallery->category_id = $request->category;
        $gallery->save();

        $request->session()->flash('success','Gallery Update Successfully');

        return redirect()->route('all.gallery');
    }

    public function deleteGallery(Request $request,$id) {
        $gallery = Gallery::find($id);
        unlink($gallery->image);

        $gallery->delete();

        $request->session()->flash('success','Gallery Image Delete successfully');

        return redirect()->back();
    }

    public function galleryCategory()
    {
        return view('admin.category_gallery.add');
    }

    public function galleryCategorySave(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);
        CategoryGallery::create([
            'name'=>$request->name
        ]);
        $request->session()->flash('success','Gallery Category  Create successfully');
        return redirect()->back();
    }

}
