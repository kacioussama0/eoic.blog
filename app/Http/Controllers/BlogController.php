<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {

        return view('home')->with('first_post',Post::where('is_published','on')->orderByDesc('created_at')->first())
            ->with('second_post',Post::where('is_published','on')->orderByDesc('created_at')->skip(1)->first())
            ->with('third_post',Post::where('is_published','on')->orderByDesc('created_at')->skip(2)->first())
            ->with('last_posts',Post::where('is_published','on')->orderByDesc('created_at')->skip(3)->take(4)->get())
            ->with('categories',Category::get()->take(5))
            ->with('news_title',News::where('is_published','1')->get()->take(10))
            ->with('settings',Setting::first())
            ->with('tags',Tag::get()->take(11));


    }
    public function post($slug) {


        $post = Post::where('is_published','on')->where('slug',$slug)->first();



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


        $category = Category::where('name','=',$title)->first();

        if(empty($category) || !$title) {
            return  redirect() -> to('/');
        }

        $posts = Post::where('category_id',$category->id)->orderByDesc('created_at') -> paginate(5);




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

        $posts = Post::where('title','like','%' . request('result') . '%')->get();
        return view('results')->with('posts',$posts)
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
            ->with('settings',Setting::first());
    }

    public function who() {
        $users = \App\Models\JoinedUser::all();
        return view('who')->with('settings',Setting::first())
            ->with('users',$users);
    }

    public function questions() {
        $questions = \App\Models\PopularQuestion::all();
        return view('questions')->with('settings',Setting::first())
            ->with('questions',$questions);
    }

}
