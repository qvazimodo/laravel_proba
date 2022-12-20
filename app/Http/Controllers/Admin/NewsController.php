<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::query()->paginate(5);


        return view('admin.index')->with('news', $news);
    }

    public function create(Request $request) {


        $news = new News();



        return view('admin.create', [
            'news'=> $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $tableNameCategory = (new Category())->getTable();


            $this->validate($request, [
                'title' => 'required|min:3|max:20',
                'text' => 'required|min:3',
                'isPrivate' => 'sometimes|in:1',
                'category_id' => "exists:{$tableNameCategory},id"
            ], [], [
                'title' => 'Заголовок новости',
                'text' => 'Текст новости',
                'category_id' => "Категория новости"
            ]);

            $data = array_merge($request->all(),["isPrivate" => isset($request->isPrivate)]);

            $news = new News();

            $news->fill($data);

            $news->save();



            return redirect()->route('admin.news.index')->with('success', 'Новость добавлена успешно!');


    }
    public function edit(News $news) {
    return view('admin.create', [
        'news' => $news,
        'categories' => Category::all()
    ]);
}

    public function update(Request $request, News $news) {

        $news->fill($request->all());
        $news->isPrivate = isset($request->isPrivate);
        $news->save();
        return redirect()->route('admin.news.index')->with('success', 'Новость изменена успешно!');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена успешно!');
    }




}
