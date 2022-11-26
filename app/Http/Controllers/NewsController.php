<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(4);

       return view('news.index')->with('news', $news);
    }

    public function show(News $news)
    {
        //$news = DB::table('news')->find($id);
        //$news = News::query()->find($id);

        return view('news.one')->with('news', $news);
    }

    public function save($id)
    {
        return response()->json(News::query()->find($id))
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
