<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Magazine;
use App\Models\News;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index() {

        return view('home')->with('slider_posts',Post::where('is_published','on')->latest()->take(10)->get())
            ->with('last_posts',Post::where('is_published','on')->latest()->take(4)->get())
            ->with('categories',Category::get()->take(5))
            ->with('magazines',Magazine::where('is_published','1')->latest()->get())
            ->with('videos',Video::where('is_published','1')->latest()->get())
            ->with('news_titles',News::where('is_published','1')->latest()->get()->take(10))
            ->with('settings',Setting::first())
            ->with('tags',Tag::get()->take(11));
    }
    public function post($slug) {


        $post = Post::where('is_published','on')->where('slug',$slug)->orWhere('slug_fr',$slug)->orWhere('slug_en',$slug)->first();



        if(empty($post)) {
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


        $category = Category::where('name','=',$title)->orWhere('name_fr','=',$title)->orWhere('name_en','=',$title)->first();



        if(empty($category) || !$title) {
            return  redirect() -> to('/');
        }

        $posts = Post::where('category_id',$category->id)->latest()-> paginate(5);




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
            return  redirect() -> to('/');

        }

        return view('tag') ->with('settings',Setting::first())
            ->with('tag',$tag)
            ->with('tags',$tags)
            ->with('categories',Category::all())
            ->with('posts',$tag  -> posts -> where('is_published','on'));

    }

    public function search() {

        if(empty(request('result'))) {
            return  redirect ()->to('/');
        }

        $posts = Post::where('title','like','%' . request('result') . '%')->where('content','like','%' . request('result') . '%')->get();

        return view('results')->with('posts',$posts)
            ->with('categories',Category::all())
            ->with('word',request('result'))
            ->with('tags',Tag::all())
            ->with('settings',Setting::first());
    }

    public function who() {
        return view('who')->with('settings',Setting::first());
    }

    public function questions() {
        $questions = \App\Models\PopularQuestion::all();
        return view('questions')->with('settings',Setting::first())
            ->with('questions',$questions);
    }


    public function projects() {
        $projects = Project::where('is_published',1)->latest()->get();
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

}
