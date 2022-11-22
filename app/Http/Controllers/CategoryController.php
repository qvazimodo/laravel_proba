<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(NewsCategory $category) {
        $category =DB::table('categories')->get();
        return view('news.categories')
            ->with('categories', $category);
    }

    public function show(News $news, NewsCategory $category, $slug) {
        $category = DB::table('categories')->where('slug', '=', $slug)->get();

        $news = DB::table('news')->where('category_id', '=', $category[0]->id)->get();


        return view('news.category')
            ->with('news', $news)
            ->with('category', $category[0]->name);
    }

    public function save(News $news,  $slug)
    {
        return response()->json($news->getNewsByCategorySlug($slug))
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
