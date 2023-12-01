<?php

use Illuminate\Support\Facades\Route;



Route::get('who-we-are',[\App\Http\Controllers\BlogController::class,'who'])->name('who-we-are');
// Route::get('members',[\App\Http\Controllers\BlogController::class,'members'])->name('members');
Route::get('author/{author}',[\App\Http\Controllers\BlogController::class,'author'])->name('author');
//Route::get('projects',[\App\Http\Controllers\BlogController::class,'projects'])->name('projects');
//Route::get('projects/{project}',[\App\Http\Controllers\BlogController::class,'projectDonate'])->name('projects.donate');
//Route::post('projects/checkout',[\App\Http\Controllers\ProjectController::class,'checkout'])->name('cart.checkout');
Route::get('volunteer',[\App\Http\Controllers\VolunteerController::class,'create'])->name('faq');
Route::get('payment',[\App\Http\Controllers\PaypalController::class,'payment'])->name('payment');
Route::get('donate',[\App\Http\Controllers\DonateController::class,'index'])->name('donate');
Route::post('donate',[\App\Http\Controllers\PaypalController::class,'donate'])->name('donate.process');
Route::get('cancel',[\App\Http\Controllers\PaypalController::class,'cancel'])->name('payment.cancel');
Route::get('payment/success',[\App\Http\Controllers\PaypalController::class,'success'])->name('payment.success');

Auth::routes();

Route::get('/',[\App\Http\Controllers\BlogController::class,'index']);
Route::get('/change-language/{locale}',[\App\Http\Controllers\BlogController::class,'change_language'])->name('change-lang');

Route::get('contact',[\App\Http\Controllers\MessageController::class,'create'])->name('contact');
Route::post('contact',[\App\Http\Controllers\MessageController::class,'store']);
Route::get('books',[\App\Http\Controllers\MagazineController::class,'books']);
Route::get('cards',[\App\Http\Controllers\CardController::class,'cards']);
Route::get('videos',[\App\Http\Controllers\VideoController::class,'videos']);
Route::get('join-us',[\App\Http\Controllers\JoinController::class,'create'])->name('join-us');
Route::get('posts/{slug?}',[\App\Http\Controllers\BlogController::class,'post'])->name('post.slug');
Route::get('posts/share/{slug?}',[\App\Http\Controllers\BlogController::class,'share']);
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
    Route::resource('posts',\App\Http\Controllers\PostController::class);
    Route::get('post/{title?}',[\App\Http\Controllers\PostController::class,'filtering'])->name('posts.search');
    Route::resource('projects',\App\Http\Controllers\ProjectController::class);
    Route::get('junk',[\App\Http\Controllers\PostController::class,'junk']);
    Route::post('posts/uploadImage',[\App\Http\Controllers\PostController::class,'uploadImage'])->name('posts.uploadImage');
    Route::get('trashed/restore/{id}',[\App\Http\Controllers\PostController::class,'restoredTrashed'])->name('posts.restore');
    Route::get('trashed/delete/{id}',[\App\Http\Controllers\PostController::class,'deleteTrashed'])->name('posts.delete');
    Route::resource('join-us',\App\Http\Controllers\JoinController::class)->name('','join-us');
    Route::resource('organization-members',\App\Http\Controllers\OrganizationMemberController::class);
    Route::resource('messages',\App\Http\Controllers\MessageController::class)->name('','messages')->except('destroyAll');
    Route::delete('removeAllMessages',[\App\Http\Controllers\MessageController::class,'destroyAll'])->name('removeAllMessages');
    Route::resource('magazines',\App\Http\Controllers\MagazineController::class)->name('','magazines');
    Route::resource('cards',\App\Http\Controllers\CardController::class)->name('','cards');
    Route::resource('videos',\App\Http\Controllers\VideoController::class)->name('','videos');
    Route::resource('news',\App\Http\Controllers\NewsController::class)->name('','news');
});
