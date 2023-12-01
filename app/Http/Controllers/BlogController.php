<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\News;
use App\Models\OrganizationMember;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index() {

        if(config('app.locale') == 'en') {
            $categories = Category::where('name_en' ,'<>', null)->latest();
            $cards = Card::where('is_published','1')->where('image_en','<>' , '')->latest()->get()->take(8);
            $magazines = Magazine::where('is_published','1')->where('book_en','<>' , '')->latest()->get();
            $slider_posts = Post::where('is_published','on')->where('title_en','<>', null)->latest()->take(10)->get();
            $last_posts = Post::where('is_published','on')->where('title_en','<>', null)->latest()->take(4)->get();
        }
        elseif(config('app.locale') == 'fr') {
            $categories = Category::where('name_fr' ,'<>', null)->latest();
            $cards = Card::where('is_published','1')->where('image_fr','<>' , '')->latest()->get()->take(8);
            $magazines = Magazine::where('is_published','1')->where('book_fr','<>' , '')->latest()->get();
            $slider_posts = Post::where('is_published','on')->where('title_fr','<>', '')->latest()->take(10)->get();
            $last_posts = Post::where('is_published','on')->where('title_fr','<>', '')->latest()->take(4)->get();
        }else {
            $categories = Category::where('name', '<>' , null)->latest();
            $cards = Card::where('is_published','1')->where('image','<>' , '')->latest()->get()->take(8);
            $magazines = Magazine::where('is_published','1')->where('book','<>' , null)->latest()->get();
            $slider_posts = Post::where('is_published','on')->latest()->take(10)->get();
            $last_posts = Post::where('is_published','on')->latest()->take(4)->get();
        }


        return view('home')->with('slider_posts',$slider_posts)
            ->with('last_posts',$last_posts)
            ->with('categories',Category::get()->take(12))
            ->with('magazines',$magazines)
            ->with('videos',Video::where('is_published','1')->latest()->take(3)->get())
            ->with('news_titles',News::where('is_published','1')->latest()->get()->take(10))
            ->with('cards',$cards)
            ->with('settings',Setting::first())
            ->with('tags',Tag::get()->take(11));
    }
    public function post($slug) {

        if(config('app.locale') == 'en') {
            $post = Post::where('slug_en',$slug)->first();
        }
        elseif(config('app.locale') == 'fr') {
            $post = Post::where('slug_fr',$slug)->first();
        }else {
            $post = Post::where('slug',$slug)->first();
        }


        if(!empty($post)) {
            if(!$post -> is_published && !auth()->user()) {
                abort(404);
            }
        }else {
            return  redirect() -> to('/')->with('settings',Setting::first());
        }

        $next_page = Post::where('id','>',$post -> id)->min('id');
        $prev_page = Post::where('id','<',$post -> id)->max('id');



        return view('post') ->with('settings',Setting::first())
            ->with('post',$post)
            ->with('tags',$post->tags)
            ->with('categories',Category::all())
            ->with('prev',Post::find($prev_page))
            ->with('tags',Tag::get()->take(11))
            ->with('next',Post::find($next_page));

    }

    public function category($title) {


        if(config('app.locale') == 'en') {
            $category = Category::where('name_en',$title)->first();
        }
        elseif(config('app.locale') == 'fr') {
            $category = Category::where('name_fr',$title)->first();
        }else {
            $category = Category::where('name',$title)->first();
        }





        if(empty($category) || !$title) {
            return  redirect() -> to('/');
        }


        if(config('app.locale') == 'en') {
            $posts = Post::where('category_id',$category->id)->where('title_en','<>',null)->latest()-> paginate(5);

        }
        elseif(config('app.locale') == 'fr') {
            $posts = Post::where('category_id',$category->id)->where('title_fr','<>',null)->latest()-> paginate(5);
        }else {
            $posts = Post::where('category_id',$category->id)->where('title','<>',null)->latest()-> paginate(5);
        }


        return view('category') ->with('settings',Setting::first())
            ->with('category',$category)
            ->with('posts',$posts)
            ->with('tags',Tag::get()->take(11))
            ->with('categories',Category::all());

    }


    public function tag($id) {


        $tag= Tag::find($id);

        $tags= Tag::all();

        if(empty($tag)) {
            abort(404);
        }

        $posts = $tag -> posts() -> latest() -> paginate(5);


        return view('tag') ->with('settings',Setting::first())
            ->with('tag',$tag)
            ->with('tags',$tags)
            ->with('categories',Category::all())
            ->with('posts',$posts);

    }

    public function search() {

        if(empty(request('result'))) {
            return  redirect ()->to('/');
        }

        $posts = Post::where('title','like','%' . request('result') . '%')->orWhere('content','like','%' . request('result') . '%')->get();

        return view('results')->with('posts',$posts)
            ->with('categories',Category::all())
            ->with('word',request('result'))
            ->with('tags',Tag::all())
            ->with('settings',Setting::first());
    }

    public function who() {
        return view('who')->with('settings',Setting::first())->with('members',OrganizationMember::orderBy('created_at')->orderBy('order')->get());
    }


    public function author($author) {
        if(auth()->check()) {
            if(auth()->user()->type == 'super_admin'){
                $user = User::find($author);
                if (empty($user)) {
                    abort(404);
                }
                $userPosts = $user->posts()->latest()->paginate(6);

                return view('author', compact('user', 'userPosts'));
            }
        }

        return abort(404);
    }

    public function projects() {
        $projects = Project::latest()->get();
        return view('projects')->with('settings',Setting::first())
            ->with('projects',$projects);
    }

    public function projectDonate($project) {
        $p = Project::find($project);

        if(!$p -> is_published) {
            abort(404);
        }

        return view('project-donation')->with('settings',Setting::first())
            ->with('project',$p);
    }

    public function change_language($locale) {
        try {
            if(array_key_exists($locale,config('locale.languages'))) {
                App::setLocale($locale);
                Lang::setLocale($locale);
                Session::put('locale',$locale);
                Carbon::setLocale($locale);
        }
            return redirect()->to('/');
    }catch (\Exception $exception) {
            return redirect()->back();
        }
    }


    public function members() {
        $members = OrganizationMember::all();
        return view('members',compact('members'));
    }

    public function share($slug) {


        if(!empty(Post::where('slug','=',$slug)->first())) {
        	$postAR = Post::where('slug','=',$slug)->first();
        	$posts = [
            	'title'=> $postAR -> title,
                'content' => $postAR -> content,
                'image' => $postAR -> image,
                'created_at' => $postAR -> created_at,
                'dir'=> 'rtl'
            ];
        }

        else if(!empty(Post::where('slug_fr','=',$slug)->first())) {
        $postFR = Post::where('slug_fr','=',$slug)->first();
        	$posts = [
            	'title'=> $postFR -> title_fr,
                'content' => $postFR -> content_fr,
                'image' => $postFR -> image_fr,
                'created_at' => $postFR -> created_at,
                'dir'=> 'ltr'
            ];
        }

        else if(!empty(Post::where('slug_en','=',$slug)->first())) {

        	$postEN = Post::where('slug_en','=',$slug)->first();
        	$posts = [
            	'title'=> $postEN -> title_en,
                'content' => $postEN -> content_en,
                'image' => $postEN -> image_en,
                'created_at' => $postEN -> created_at,
                'dir'=> 'ltr'
            ];

        }else {
             return abort(404);

        }

    	$settings = Setting::first();

        return view('share',compact('settings','slug'))->with('post', $posts);
   }
}
