<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $category =DB::table('categories')->get();
        return view('news.categories')
            ->with('categories', $category);
    }

    public function show($slug) {
        $category = DB::table('categories')->where('slug', '=', $slug)->first();
        $news = DB::table('news')->where('category_id', '=', $category->id)->get();


        return view('news.category')
            ->with('news', $news)
            ->with('category', $category->name);
    }

    public function save($slug)
    {
        $category = DB::table('categories')->where('slug', '=', $slug)->first();

        return response()->json(DB::table('news')->where('category_id', '=', $category->id)->get())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
