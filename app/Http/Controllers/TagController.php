<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::orderByDesc('created_at')->paginate(6);
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


    public function edit(Tag $tag)
    {
        //
    }


    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        $tag -> delete();

        return redirect() -> back();
    }
}
