<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(NewsCategory $category) {
        return view('news.categories')
            ->with('categories', $category->getCategories());
    }

    public function show(News $news, NewsCategory $category, $slug) {
        return view('news.category')
            ->with('news', $news->getNewsByCategorySlug($slug))
            ->with('category', $category->getCategoryNameBySlug($slug));
    }

    public function save(News $news,  $slug)
    {
        return response()->json($news->getNewsByCategorySlug($slug))
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
