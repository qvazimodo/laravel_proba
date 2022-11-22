<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminIndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function create(Request $request, NewsCategory $category, News $news) {

        if ($request->isMethod('post')) {

         $data = [
                "title" => $request->title,
                "text" => $request->text,
                "isPrivate" => isset($request->isPrivate),
                "category_id" => (int)$request->category
            ];

           DB::table('news')->insert($data);

           $id = DB::table('news')->max('id');
            // $request->flash();
            return redirect()->route('news.show',$id);
        }

        return view('admin.create', [
            'categories' => $category->getCategories()
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
