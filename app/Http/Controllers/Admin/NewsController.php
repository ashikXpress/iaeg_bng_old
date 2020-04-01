<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    function __construct()

    {

        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['basicNewsAll','NewsLetterAll','basicNewsSave','newsLetterSave']]);

        $this->middleware('permission:news-create', ['only' => ['basicNewsForm','newsLetterForm','basicNewsSave','newsLetterSave']]);

        $this->middleware('permission:news-edit', ['only' => ['editBasicNews','updateBasicNews','editNewsLetter','updateNewsLetter']]);

        $this->middleware('permission:news-delete', ['only' => ['deleteBasicNews','deleteNewsLetter']]);

    }

    public function basicNewsAll() {
        $news = News::orderBy('id','desc')->with('categoryName','userName')->where('category_id',1)->paginate(8);

        return view('admin.news.all_basic_news', compact('news'));

    }

    public function basicNewsForm() {

        return view('admin.news.add_basic_news');
    }

    public function basicNewsSave(Request $request) {


        $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'description' => 'required|max:7000',
            'image' => 'required|mimes:jpeg,png,jpeg',
            'date' => 'required',
        ]);

        $image_path='uploads/'.$request->image->store('basic_news');

        // resize
        $img = Image::make($image_path);

        $img->resize(360, 250);

        $img->save(public_path($image_path), 70);


        $news = new News();
        $news->image_or_file =$image_path;
        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->description = $request->description;
        $news->upload_date = $request->date;
        $news->user_id = Auth::id();

        $news->save();

        $request->session()->flash('success','Basic News Create successfully');


        return redirect()->route('all.basic.news');
    }

    public function editBasicNews($id) {

        $news=News::find($id);


        return view('admin.news.edit_basic_news', compact('news'));
    }

    public function updateBasicNews($id,Request $request) {

        $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'description' => 'required|max:7000',
            'image' => 'nullable|mimes:jpeg,png,jpeg',
            'date' => 'required',
        ]);

        $news = News::find($id);

        if ($request->image) {
            unlink($news->image_or_file);
            $image_path='uploads/'.$request->image->store('basic_news');

            // resize
            $img = Image::make($image_path);

            $img->resize(360, 250);

            $img->save(public_path($image_path), 70);

            $news->image_or_file = $image_path;

        }



        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->description = $request->description;
        $news->upload_date = $request->date;
        $news->user_id = Auth::id();
        $news->save();

        $request->session()->flash('success','Basic News Update Successfully');

        return redirect()->route('all.basic.news');
    }

    public function deleteBasicNews(Request $request,$id) {
        $news = News::find($id);
        unlink($news->image_or_file);

        $news->delete();

        $request->session()->flash('success','Basic News Delete successfully');

        return redirect()->back();
    }

    public function NewsLetterAll()
    {
        $news = News::orderBy('id','desc')->with('categoryName','userName')->where('category_id',2)->paginate(8);

        return view('admin.news.all_letter_news', compact('news'));

    }

    public function newsLetterForm() {

        return view('admin.news.add_letter_news');
    }

    public function newsLetterSave(Request $request) {


        $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'description' => 'required|max:7000',
            'file' => 'required|mimes:pdf',
            'date' => 'required',
        ]);

        $news = new News();
        $news->image_or_file = 'uploads/'.$request->file->store('news_letter');
        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->description = $request->description;
        $news->upload_date = $request->date;
        $news->user_id = Auth::id();

        $news->save();

        $request->session()->flash('success','News Letter Create successfully');


        return redirect()->route('all.news.letter');
    }
    public function editNewsLetter($id) {

        $news=News::find($id);


        return view('admin.news.edit_letter_news', compact('news'));
    }

    public function updateNewsLetter($id,Request $request) {

        $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'description' => 'required|max:7000',
            'file' => 'nullable|mimes:pdf',
            'date' => 'required',
        ]);

        $news = News::find($id);

        if ($request->file) {
            unlink($news->image_or_file);
            $news->image_or_file = 'uploads/'.$request->file->store('news_letter');

        }



        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->description = $request->description;
        $news->upload_date = $request->date;
        $news->user_id = Auth::id();
        $news->save();

        $request->session()->flash('success','News Letter Update Successfully');

        return redirect()->route('all.news.letter');
    }

    public function deleteNewsLetter(Request $request,$id) {
        $news = News::find($id);
        unlink($news->image_or_file);

        $news->delete();

        $request->session()->flash('success','News Letter Delete successfully');

        return redirect()->back();
    }


}
