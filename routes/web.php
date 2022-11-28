<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('who-we-are',[\App\Http\Controllers\BlogController::class,'who'])->name('who-we-are');
Route::get('faq',[\App\Http\Controllers\BlogController::class,'questions'])->name('faq');

Auth::routes();


Route::get('/',[\App\Http\Controllers\BlogController::class,'index']);

Route::get('contact',[\App\Http\Controllers\MessageController::class,'create'])->name('contact');
Route::post('contact',[\App\Http\Controllers\MessageController::class,'store']);
Route::get('complaint',[\App\Http\Controllers\ComplaintController::class,'create'])->name('complaint');
Route::post('complaint',[\App\Http\Controllers\ComplaintController::class,'store']);
Route::get('join-us',[\App\Http\Controllers\JoinUsController::class,'create'])->name('join-us');
Route::post('join-us',[\App\Http\Controllers\JoinUsController::class,'store']);
Route::get('posts/{slug}',[\App\Http\Controllers\BlogController::class,'post'])->name('post.slug');
Route::get('category/{title}',[\App\Http\Controllers\BlogController::class,'category'])->name('category.show');
Route::get('tag/{id}',[\App\Http\Controllers\BlogController::class,'tag'])->name('tag.show');
Route::get('search',[\App\Http\Controllers\BlogController::class,'search'])->name('search');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin']);
    Route::post('updateProfile',[\App\Http\Controllers\AdminController::class,'updateProfile'])->name('updateProfile');
    Route::post('updatePassword',[\App\Http\Controllers\AdminController::class,'updatePassword'])->name('updatePassword');
    Route::patch('updateImage',[\App\Http\Controllers\AdminController::class,'updateImage'])->name('updateImage');
    Route::get('profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('admin/profile');
    Route::resource('settings',\App\Http\Controllers\SettingController::class);
    Route::resource('users',\App\Http\Controllers\UserController::class)->name('','users');
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('tags',\App\Http\Controllers\TagController::class);
    Route::resource('faq',\App\Http\Controllers\PopularQuestionController::class)->name('','faq');
    Route::resource('posts',\App\Http\Controllers\PostController::class);
    Route::get('trashed-posts',[\App\Http\Controllers\PostController::class,'junk']);
    Route::get('posts/trashed/restore/{id}',[\App\Http\Controllers\PostController::class,'restoredTrashed'])->name('posts.restore');
    Route::get('posts/trashed/delete/{id}',[\App\Http\Controllers\PostController::class,'deleteTrashed'])->name('posts.delete');
    Route::resource('join-us',\App\Http\Controllers\JoinUsController::class);
    Route::resource('joined-users',\App\Http\Controllers\JoinedUser::class)->name('','joined-users');
    Route::resource('messages',\App\Http\Controllers\MessageController::class)->name('','messages');
    Route::resource('complaints',\App\Http\Controllers\ComplaintController::class)->name('','complaints');
    Route::resource('news',\App\Http\Controllers\NewsController::class)->name('','news');
});
