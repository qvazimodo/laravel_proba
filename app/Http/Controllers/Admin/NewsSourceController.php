<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $sources = NewsSource::query()->paginate(10);

        return view('admin.news_sources')->with('sources', $sources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create():View
    {
        $source = new NewsSource();



        return view('admin.news_source_create', [
            'source' => $source
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'source' => 'required|min:3|max:100',
        ], [], [
            'source' => 'Название источника новостей',

        ]);

        $data_request = $request->all();
        //dd($data['source']);
        $xml = XmlParser::load($data_request['source']);

        $data_xml = $xml->parse([
            'name' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],

        ]);

       // dd($data_xml['name'],$data_xml['link'],$data_xml['description'],$data_xml['image']);

        $data = [
          'source' =>  $data_request['source'],
          'name' =>   $data_xml['name'],
          'link' =>   $data_xml['link'],
          'avatar' => !(Str::contains($data_xml['image'], 'http')) ? ($data_xml['link'] . Str::after($data_xml['image'],'http:/')) : $data_xml['image'],
        ];
//dd($data);
        $source = new NewsSource();
        $source->fill($data);


        $result = $source->save();
        if ($result) {
            return redirect()->route('admin.sources.index')->with('success', 'Источник новости изменен успешно!');
        } else {
            return redirect()->route('admin.sources.index')->with('error', 'Ошибка изменения источника новости');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\NewsSource $source
     * @return \Illuminate\View\View
     */
    public function edit(NewsSource $source): View
    {
        return view('admin.news_source_create', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsSource $source
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, NewsSource $source)
    {
      //  $tableNameCategory = (new NewsSource())->getTable();

        $this->validate($request, [
            'source' => 'required|min:3|max:100',
        ], [], [
            'source' => 'Название источника новостей',
        ]);

        $source->fill($request->all());

       // $source->save();

        $result = $source->save();
        if ($result) {
            return redirect()->route('admin.sources.index')->with('success', 'Источник новости изменен успешно!');
        } else {
            return redirect()->route('admin.sources.index')->with('error', 'Ошибка изменения источника новости');
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\NewsSource $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NewsSource $source)
    {
        $source->delete();
        return redirect()->route('admin.sources.index')->with('success', 'Источник новости удален успешно!');
    }
}
