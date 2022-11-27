<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);

        return view('admin.category')->with('categories', $categories);
    }

    public function create(Request $request) {
        $category = new Category();



        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function store(Request $request) {


            $this->validate($request, [
                'name' => 'required|min:3|max:20',
                'slug' => 'required|min:3',
            ], [], [
                'name' => 'Название категории',
                'slug' => 'Псевдоним категории',
            ]);

            $data = $request->all();
            $category = new Category();
            $category->fill($data);


            $category->save();

            //$id = $news->id;

            return redirect()->route('admin.categories.create')->with('success', 'Категория добавлена успешно!');
            //return redirect()->route('news.show',$id)->with('success', 'Новость добавлена успешно!');



    }

    public function edit(Category $category) {
        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function update(Request $request,Category $category) {

        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Категория изменена успешно!');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена успешно!');
    }
}
