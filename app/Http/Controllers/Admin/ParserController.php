<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{


    public function index()
    {
        //TODO добавить несколько источников в виде массива
        $xml = XmlParser::load('https://lenta.ru/rss');

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url,category]'],
        ]);


        foreach($data['news'] as $news){
            $category = Category::firstOrCreate(
                ['name' => $news['category']],
                ['slug' => Str::slug($news['category'])]
            );
            $source = NewsSource::firstOrCreate(
                ['source' => $news['link']]
            );
            $id_category = Category::query()->select('id')->where('name', '=', $category->name)->get()->first()->id;
            $id_source = NewsSource::query()->select('id')->where('source', '=', $source->source)->get()->first()->id;

            News::query()->firstOrCreate(
                ['title'=> $news['title']],
                ['text' => $news['description'],
                    'isPrivate' => false,
                    'category_id' => $id_category,
                    'news_source_id' => $id_source,
                    'image' => $news['enclosure::url'],
                ]
            );


        }


        return redirect()->route('admin.news.index')->with('success', 'Новость добавлена успешно!');


        //TODO сохранить данные о новых новостях в БД
    }
}
