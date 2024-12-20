<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');

Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
Route::post('/blogs',[BlogController::class,'store'])->name('blogs.store');

Route::get('/blog_details/{id}',[BlogController::class,'show'])->name('blogs.show');

Route::get('/editblog/{id}',[BlogController::class,'edit'])->name('blogs.edit');
Route::put('/updateblog/{id}',[BlogController::class,'update'])->name('blogs.update');

Route::get('/deleteblog/{id}',[BlogController::class,'destory'])->name('blogs.destory');

Route::get('/searchByName',[BlogController::class,'searchblogname'])->name('blogs.searchblog');
Route::get('/blog_type/{type}',[BlogController::class,'filterblog'])->name('blogs.filter');

Route::get('/blogs/search', [BlogController::class, 'search'])->name('blogs.search');