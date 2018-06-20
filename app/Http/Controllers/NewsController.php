<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\NewsRequest;
use App\News;
use Carbon\Carbon;
use File;
use App;

class NewsController extends Controller
{
    public function showAll()
    {
        $news = News::latest('date')->paginate(3);
        if (App::isLocale('en')) {
            foreach ($news as $new) {
                $new->format_date = $new->date;
                $new->short_text = $new->text_en;
            }
        } else {
            foreach ($news as $new) {
                $new->format_date = $new->date;
                $new->short_text = $new->text_ru;
            }
        }

        return view('news.showAll', ['newsAll' => $news]);
    }

    public function show($id)
    {
        $new = News::findOrFail($id);
        $new->format_date = $new->date;

        return view('news.show', ['new' => $new]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $news = new News();
        $news->user_id = $request->user_id;
        $news->date = Carbon::now();
        $news->title_ru = $request->title_ru;
        $news->title_en = $request->title_en;
        $news->text_ru = $request->text_ru;
        $news->text_en = $request->text_en;
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/news/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $news->image = $imagePath . $imageName;
        }
        $news->save();

        return redirect()->route('newsAll')->with('message', __('news.added_news'));
    }

    public function edit($id)
    {
        $new = News::find($id);

        return view('news.edit', ['new' => $new]);
    }

    public function update(NewsRequest $request, $id)
    {
        $new = News::find($id);
        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/news/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
            //удаление старого изображения из каталога
            File::delete($request->image);
        }
        $new->update($input);

        return redirect()->route('new', $id);
    }

    public function delete($id)
    {
        $news = News::find($id)->delete();

        return back();
    }

    public function showDeleted()
    {
        $news = News::latest('deleted_at')->onlyTrashed()->paginate(3);
        foreach ($news as $new) {
            $new->format_date = $new->date;
        }

        return view('news.showDeleted', ['newsAll' => $news]);
    }

    public function restore($id)
    {
        $news = News::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function forceDelete($id)
    {
        $news = News::onlyTrashed()->find($id)->forcedelete();

        return back();
    }
}
