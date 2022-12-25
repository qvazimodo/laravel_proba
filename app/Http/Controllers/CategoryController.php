<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;


class CategoryController extends Controller
{
    public function index() {
        $category =Category::query()->paginate(20);
        return view('news.categories')
            ->with('categories', $category);
    }

    public function show($slug) {
        $category = Category::query()->where('slug',$slug)->first();

        $news = Category::query()->where('slug',$slug)->first()->news();



        return view('news.category')
            ->with('news', $news)
            ->with('category', $category->name);

    }

    public function save($slug)
    {
        $category = Category::query()->where('slug',$slug)->first();

        return response()->json(News::query()->where('category_id','=', $category->id)->get())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }
}
