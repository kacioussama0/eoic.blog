<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->paginate(6);
        return view('admin.tags.index',compact('tags'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50|unique:tags'
        ]);

        $tag = new Tag();

        $tag -> name = $request -> name;

        $tag -> save();

        return redirect() -> back()->with([
            'success' => 'تم إضافة الوسم بنجاح'
        ]);

    }

    public function update(Request $request, Tag $tag)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50|unique:tags'
        ]);

        $tag -> name = $request -> name;

        if($tag -> save()) {
            return redirect() -> back()->with([
                'success' => 'تم إضافة الوسم بنجاح'
            ]);
        }
    }

    public function destroy(Tag $tag)
    {
        $tag -> delete();
        return redirect() -> back()->with([
            'success' => 'تم حذف الوسم بنجاح'
        ]);
    }
}
