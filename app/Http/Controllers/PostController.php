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

    }


    public function index()
    {
        $posts = Post::latest()->paginate(6);
        $postsEN = Post::latest()->where('title_en' , '<>' , null)->paginate(6);
        $postsFR = Post::latest()->where('title_fr' , '<>' , null)->paginate(6);

        return view('admin.posts.index',compact('posts','postsFR','postsEN'));

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
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);

        $image = $imageFR = $imageEN = '';


        $image = $request->file('image')->store('posts/ar','public');

        if(!empty($request->file('image_en'))) {
            $imageEN = $request->file('image_en')->store('posts/en','public');
        }

        if(!empty($request->file('image_fr'))) {
            $imageFR = $request->file('image_fr')->store('posts/fr','public');
        }

        $post = Category::find($request->category)->posts()->create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'slug' => Str::words($this->slug($request->title,'-'),5),
            'slug_en' => Str::words(Str::slug($request->title_en,'-'),5),
            'slug_fr' => Str::words(Str::slug($request->title_fr,'-'),5),
            'category_id' => $request->category,
            'content' => $request['content'],
            'content_fr' => $request['content_fr'],
            'content_en' => $request['content_en'],
            'created_by' => Auth::id(),
            'is_published' => ($request->is_published == null) ? null : 'on' ,
            'image' => $image,
            'image_en' => $imageEN ? $imageEN : $image,
            'image_fr' => $imageFR ? $imageFR : $image
        ]);

        $post -> tags()->attach($request->tags);

        return redirect()->to('admin/posts')->with([
            'success' => 'تم إضافة المنشور بنجاح'
        ]);

    }


    public function show(Post $post)
    {
        return redirect()->to('posts/' . $post->slug());
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
            'title' => 'required|min:5|unique:posts,title,' . $post->id,
            'category' => 'required',
            'content' => 'required|min:20',

            'image'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);


        $image = $imageFR = $imageEN = '';

        if(!empty($request->file('image'))) {
            $image = $request->file('image')->store('posts/ar/','public');
        }

        if(!empty($request->file('image_en'))) {
            $imageEN = $request->file('image_en')->store('posts/en/','public');
        }

        if(!empty($request->file('image_fr'))) {
            $imageFR = $request->file('image_fr')->store('posts/fr/','public');
        }



             $post->update([
                'title' => $request->title,
                'title_fr' => $request->title_fr,
                'title_en' => $request->title_en,
                'slug' => Str::words($this->slug($request->title,'-'),5),
                'slug_en' => Str::words($this->slug($request->title_en,'-'),5),
                'slug_fr' => Str::words($this->slug($request->title_fr,'-'),5),
                'category_id' => $request->category,
                'content' => $request['content'],
                'content_fr' => $request['content_fr'],
                'content_en' => $request['content_en'],
                'created_by' => Auth::id(),
                'is_published' => ($request->is_published == null) ? null : 'on' ,
                'image' => $image ? $image : $post -> image,
                'image_en' => $imageEN ? $imageEN : $post -> image_en,
                'image_fr' => $imageFR ? $imageFR : $post -> image_fr
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

    public function uploadImage(Request $request) {

        if($request -> hasFile('upload')) {
            $image = $request->file('upload')->store('posts/images','public');
            return response()->json(['filename' => $image , 'uploaded' => 1 , 'url' => asset('storage/' . $image)]);
        }

    }



}
