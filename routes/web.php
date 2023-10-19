<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//          url     controller      action method            name any
Route::get('/',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/{value}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/{value}',[BlogController::class,'update'])->name('blog.update');
Route::delete('/blog/{value}',[BlogController::class,'destroy'])->name('blog.destroy');