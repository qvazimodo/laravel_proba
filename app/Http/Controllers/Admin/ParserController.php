<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use App\Services\XMLParserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{


    //public function index(XMLParserService $parserService)
    public function index()
    {


      /* // $links = [
            'https://overclockers.ru/rss/all.rss',
            'https://lenta.ru/rss',
           'https://rssexport.rbc.ru/rbcnews/news/30/full.rss',
            'https://news.rambler.ru/rss/holiday/',

        ];*/

        $links = NewsSource::query()->select('source')->get();

        foreach ($links as $link) {

            NewsParsing::dispatch($link->source);

        }


        return view('admin.index')->with('news', News::query()->paginate(5));
    }
}
