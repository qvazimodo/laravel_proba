<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', $news->getNews());
    }

    public function show($id, News $news)
    {
        return view('news.one')->with('news', $news->getNewsId($id));
    }

    public function save($id, News $news)
    {
        return response()->json($news->getNews()[$id])
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
