<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link) {

        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url,category]'],
        ]);


        foreach($data['news'] as $news){
            $category = Category::firstOrCreate(
                ['name' => !empty($news['category'])?$news['category']:$data['title']],
                ['slug' => Str::slug(!empty($news['category'])?$news['category']:$data['title'])],
            );

            $id_category = Category::query()->select('id')->where('name', '=', $category->name)->get()->first()->id;
            $id_source = NewsSource::query()->select('id')->where('name', '=', $data['title'])->get()->first()->id;


            News::query()->firstOrCreate(
                ['title'=> $news['title']],
                [
                    'text' => $news['description'],
                    'isPrivate' => false,
                    'category_id' => $id_category,
                    'news_source_id' => $id_source,
                    'image' => !empty($news['enclosure::url'])?$news['enclosure::url']:'',
                ]
            );
        }
    }
}
