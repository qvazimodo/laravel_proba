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



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
}
