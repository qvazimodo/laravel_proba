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

        if ($request->isMethod('post')) {

            $data = $request->all();

            $category->fill($data);


            $category->save();

            //$id = $news->id;

            return redirect()->route('admin.category.create')->with('success', 'Категория добавлена успешно!');
            //return redirect()->route('news.show',$id)->with('success', 'Новость добавлена успешно!');
        }

        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function edit(Category $category) {
        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function update(Request $request,Category $category) {

        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Категория изменена успешно!');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Категория удалена успешно!');
    }
}
