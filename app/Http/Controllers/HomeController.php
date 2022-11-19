<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function save(News $news)
    {
        $data = $news->getNews()[1];
        $news = $data;
        $pdf = PDF::loadView('news.one', $news);
        return $pdf->download('1234.pdf');
    }
    public function ssave(NewsCategory $categories)
    {
        Storage::disk('local')->put('categories.json', json_encode($categories->getCategories(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        return view('index');
    }
}
