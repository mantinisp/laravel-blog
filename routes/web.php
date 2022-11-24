<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(BlogController::class)->group(function () {
	Route::get('/', [BlogController::class, 'index'])->name('welcome');
	
	Route::get('/home', [BlogController::class, 'myBlogs'])
		->name('home')
		->middleware('auth');
	
	Route::get('/create-blog', 'create')
		->name('blog-create')
		->middleware('auth');
	
	Route::post('/create-blog', 'store')
		->name('blog-store')
		->middleware('auth');
	
	Route::get('/blog/{id}', 'show')->name('blog-show');
	
	Route::get('/edit-blog/{id}', 'edit')
		->name('blog-edit')
		->middleware('auth');
	
	Route::post('/update-blog/{id}', 'update')
		->name('blog-update')
		->middleware('auth');
	
	Route::delete('/delete-blog/{id}', 'destroy')
		->name('blog-delete')
		->middleware('auth');
});

Route::controller(BlogCommentController::class)->group(function () {
	Route::post('/create-blog-comment', 'store')
		->name('create-blog-comment')
		->middleware('auth');
	
	Route::delete('/delete-comment/{id}', 'destroy')
		->name('delete-blog-comment')
		->middleware('auth');
});
