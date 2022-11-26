<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminIndexController extends Controller
{

    public function create(Request $request, News $news) {

        if ($request->isMethod('post')) {
          $data = $request->all();
            dd($data);
            $news->fill($data);

            $news->save();

            //$id = $news->id;

            return redirect()->route('admin.create')->with('success', 'Новость добавлена успешно!');
            //return redirect()->route('news.show',$id)->with('success', 'Новость добавлена успешно!');
        }

        return view('admin.create', [
            'categories' => Category::all()
        ]);
    }

    public function test1()
    {
        return response()->download('1.jpg');
    }

    public function test2(News $news)
    {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
