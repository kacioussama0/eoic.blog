<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct() {
        $this -> middleware('auth');
        $this->middleware('permission:categories-create', ['only' => ['create']]);
        $this->middleware('permission:categories-edit',   ['only' => ['edit']]);
        $this->middleware('permission:categories-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:categories-delete',   ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::orderByDesc('created_at')->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:40|unique:categories,name'
        ]);

        $category = new Category();
        $category -> name = $request -> category_name;
        $category->save();


        return redirect()->back()->with([
            'success'=> 'تم إضافة التصنيف بنجاح'
        ]);

    }

    public function show(Category $category)
    {
        return redirect()->to('category/'. $category -> name);
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
