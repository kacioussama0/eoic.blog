<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Image;

class PostController extends Controller
{

    public function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }


    public function __construct() {

            $this -> middleware('auth');
        $this->middleware('permission:posts-create', ['only' => ['create']]);
        $this->middleware('permission:posts-edit',   ['only' => ['edit']]);
        $this->middleware('permission:posts-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:posts-delete',   ['only' => ['destroy']]);
    }


    public function index()
    {
        $posts = Post::OrderByDesc('created_at')->paginate(6);
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        if(empty($categories)) {
            return redirect()->route('categories.index');
        }

        $tags = Tag::all();

        return view('admin.posts.create',compact('categories','tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|unique:posts',
            'category' => 'required',
            'content' => 'required|min:20',
            'image'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp'
                ])->max(1024 * 4)
            ]
        ]);



        $image = $request->file('image')->store('posts','public');

        $post = Category::find($request->category)->posts()->create([
        'title' => $request->title,
        'slug' => Str::limit($this->slug($request->title,'-'),40,'') . '-' . date('d-m-Y-H-i'),
        'category_id' => $request->category,
            'content' => $request['content'],
            'created_by' => Auth::id(),
            'is_published' => ($request->is_published == null) ? null : 'on' ,
            'image' => $image
        ]);

        $post -> tags()->attach($request->tags);


        return redirect()->to('admin/posts')->with([
            'success' => 'تم إضافة المنشور بنجاح'
        ]);

    }


    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('categories','post','tags'));

    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'content' => 'required|min:20',
            'image'=> File::types([
                'jpg','gif','png','webp'
            ])->max(1024 * 4)
        ]);


        if(!empty($request->file('image'))) {

            Storage::disk()->delete('public/' . $post->image);
            $image = $request->file('image')->store('posts','public');

            $updated = $post->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request['content'],
                'is_published' => ($request->is_published == null) ? null : 'on' ,
                'image' => $image
            ]);


            $post -> tags()->sync($request->tags);



            return redirect()->to('admin/posts')->with([
                'success' => 'تم تعديل المنشور بنجاح'
            ]);
        }


        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'content' => $request['content'],
            'is_published' => ($request->is_published == null) ? null : 'on' ,
        ]);

        $post -> tags()->sync($request->tags);


        return redirect()->to('admin/posts')->with(
          [
              'success' => 'تم تعديل المقال بنجاح'
          ]
        );

    }



    public function junk()
    {

         $trashedPosts = Post::onlyTrashed()->paginate(6);
         return view('admin.posts.trashed',compact('trashedPosts'));
    }


    public function restoredTrashed($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();

        $post -> restore();


        return redirect()->to('admin/posts')->with(
            ['success' => 'تم الإسترجاع بنجاح']
        );
    }


    public function deleteTrashed($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post -> forceDelete();

        return redirect()->back()->with([
            'success' => 'تم حذف المقال بنجاح'
        ]);
    }


    public function destroy(Post $post)
    {
        $post -> delete();
        return redirect()->back()->with([
            'success' => 'تم حذف المقال بنجاح'
        ]);
    }



}
