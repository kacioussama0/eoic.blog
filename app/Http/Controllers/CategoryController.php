<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct() {
        $this -> middleware('auth');

    }

    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $categoriesEN = Category::latest()->where('name_en','<>' , null)->paginate(5);
        $categoriesFR = Category::latest()->where('name_fr', '<>' , null)->paginate(5);
        return view('admin.categories.index',compact('categories','categoriesEN','categoriesFR'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:categories,name',
            'name_en' => 'required|min:3|max:40|unique:categories,name_en',
            'name_fr' => 'required|min:3|max:40|unique:categories,name_fr',
        ]);

        $category = new Category();
        $category -> name = $request -> name;
        $category -> name_en = $request -> name_en;
        $category -> name_fr = $request -> name_fr;
        $category->save();


        return redirect()->to('admin/categories')->with([
            'success'=> 'تم إضافة التصنيف بنجاح'
        ]);

    }

    public function show(Category $category)
    {
        return redirect()->to('category/'. $category -> name());
    }


    public function edit(Category $category) {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request , Category $category) {
        $request->validate([
            'name' => 'required|min:3|max:40|unique:categories,name,' . $category->id,
            'name_en' => 'required|min:3|max:40|unique:categories,name_en,' . $category->id,
            'name_fr' => 'required|min:3|max:40|unique:categories,name_fr,' . $category->id,
        ]);

        $category->update($request -> all());


        return redirect()->to('admin/categories')->with([
            'success'=> 'تم تعديل التصنيف بنجاح'
        ]);
    }




    public function destroy(Category $category)
    {
        if(count($category->posts)) {
            return redirect()->back()->with([
                'failed'=> 'لا يمكن حذف التصنيف يوجد مقالات داخله'
            ]);
        }
        $category -> delete();
        return redirect()->back()->with([
            'success'=> 'تم حذف التصنيف بنجاح'
        ]);
    }
}
