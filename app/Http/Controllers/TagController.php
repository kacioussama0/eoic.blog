<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->paginate(6);
        $tagsEN = Tag::latest()->where('name_en' , '<>' , null)->paginate(6);
        $tagsFR = Tag::latest()->where('name_fr' , '<>' , null)->paginate(6);
        return view('admin.tags.index',compact('tags','tagsEN','tagsFR'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50|unique:tags,'  ,
            'name_en' => 'required|min:3|max:50|unique:tags',
            'name_fr' => 'required|min:3|max:50|unique:tags',
        ]);

        Tag::create($request->all());

        return redirect() -> to('admin/tags')->with([
            'success' => __('forms.add-success')
        ]);

    }

    public function edit(Tag $tag) {
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request -> validate([
            'name' => 'required|min:3|max:50|unique:tags',
            'name_en' => 'required|min:3|max:50|unique:tags',
            'name_fr' => 'required|min:3|max:50|unique:tags',
        ]);

        $tag->update($request->all());

        return redirect() -> to('admin/tags')->with([
            'success' => __('forms.edit-success')
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag -> delete();
        return redirect() -> back()->with([
            'success' => __('forms.deleted-success')
        ]);
    }
}
