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
        $posts = Post::latest()->paginate(12);


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
        // Start Post Validation

        $request->validate([

            'title' => 'required|min:5|max:255|unique:posts',
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

        // End Post Validation


        // Start Image Upload

        $image = $imageFR = $imageEN = '';

        $image = $request->file('image')->store('posts/ar','public');

        if(!empty($request->file('image_en'))) {
            $imageEN = $request->file('image_en')->store('posts/en','public');
        }

        if(!empty($request->file('image_fr'))) {
            $imageFR = $request->file('image_fr')->store('posts/fr','public');
        }

        // End Image Upload


        // Start Store Post To Database


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
            'created_at' => $request -> created_at,
            'is_published' => ($request->is_published == null) ? null : 'on' ,
            'image' => $image,
            'image_en' => $imageEN ? $imageEN : $image,
            'image_fr' => $imageFR ? $imageFR : $image
        ]);

        // End Store Post To Database


        // Start Attach Tags To Post

        $post -> tags()->attach($request->tags);

        // End Attach Tags To Post


        return redirect()->to('admin/posts')->with([
            'success' =>  __('forms.add-success')
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
        // Start Post Validation

        $request->validate([

            'title' => 'required|min:5|max:255|unique:posts,title,' . $post->id,
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

        // End Post Validation


        // Start Image Upload

        $image = $imageFR = $imageEN = '';

        if(!empty($request->file('image'))) {

            unlink(public_path("storage/" . $post->image));

            $image = $request->file('image')->store('posts/ar/','public');

            if($post -> image == $post -> image_en) {
                $imageEN = $image;
            }

            if($post -> image == $post -> image_fr) {
                $imageFR = $image;
            }

        }

        if(!empty($request->file('image_en'))) {

            if($post -> image_en != $post -> image) {
                unlink(public_path("storage/" . $post->image_en));
            }
            $imageEN = $request->file('image_en')->store('posts/en/','public');
        }

        if(!empty($request->file('image_fr'))) {

            if($post -> image_fr != $post -> image) {
                unlink(public_path("storage/" . $post->image_fr));
            }

            $imageFR = $request->file('image_fr')->store('posts/fr/','public');
        }

        // End Image Upload

        // Start Update Post To Database


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
            'created_at' => $request -> created_at,
            'is_published' => ($request->is_published == null) ? null : 'on' ,
            'image' => $image ? $image : $post -> image,
            'image_en' => $imageEN ? $imageEN : $post -> image_en,
            'image_fr' => $imageFR ? $imageFR : $post -> image_fr
        ]);

        // End Update Post To Database


        $post -> tags()->sync($request->tags);



        return redirect()->to('admin/posts')->with(
            [
                'success' =>  __('forms.edit-success')
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
            ['success' => __('forms.restore-success')]
        );
    }


    public function deleteTrashed($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();

        if(\Illuminate\Support\Facades\File::exists('storage/' . $post -> image) && $post -> image != null) {
            unlink(public_path("storage/" . $post->image));
        }

        if(\Illuminate\Support\Facades\File::exists('storage/' . $post -> image_en) && $post -> image_en != null) {
            unlink(public_path("storage/" . $post->image_en));
        }


        if(\Illuminate\Support\Facades\File::exists('storage/' . $post -> image_fr) && $post -> image_fr != null) {
            unlink(public_path("storage/" . $post->image_fr));

        }

        $post -> forceDelete();

        return redirect()->back()->with([
            'success' => __('forms.deleted-success')
        ]);
    }


    public function destroy(Post $post)
    {
        $post -> delete();
        return redirect()->back()->with([
            'success' => __('forms.deleted-success')
        ]);
    }

    public function uploadImage(Request $request) {

        if($request -> hasFile('upload')) {
            $image = $request->file('upload')->store('posts/images','public');
            return response()->json(['filename' => $image , 'uploaded' => 1 , 'url' => asset('storage/' . $image)]);
        }

        return  "";

    }

    public function filtering(Request $request) {



        $posts = Post::where('title','like','%' . $request->title . '%')->paginate(12);

        return view('admin.posts.index',compact('posts'));


    }





}
