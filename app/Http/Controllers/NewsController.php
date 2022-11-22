<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = DB::table('news')->find($id);
        return view('news.one')->with('news', $news);
    }

    public function save($id)
    {
        return response()->json(DB::table('news')->find($id))
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('news.one')->with('news', $news->getNewsId($id));
    }
}
