<?php

use App\Http\Controllers\usercont;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductVali;
use App\Http\Controllers\ResourceForVideo;

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
route::get('/index',function(){
 return "hi...";
});
route::get('/user',function(){
    return view('user',['name'=>'mitz']);
   });
route::get('/product/{pid}/{pname?}',function($pid,$pname='NA'){
    echo "pid=" . $pid . "Uname=" . $pname;
})->where(['pid' => '[0-9]+', 'pname' => '[A-Za-z]+']);

route::get('/home',function(){
    return "hi...";
   });
//    route::get('/dataDispaly',function(){
//    view('displayData');
//    });
route::redirect('/home','/user');
route::get('/indexx',[usercont::class,'home'])->name('indexx');
route::get('/about',[usercont::class,'about'])->name('about');
route::get('/contact',[usercont::class,'contact'])->name('contact');
route::get('/gallery',[usercont::class,'gallery'])->name('gallery');
route::get('/checkage',[usercont::class,'checkAge'])->middleware('checkAge');
Route::prefix('admin')->group(function(){
    route::resource('/product',ProductVali::class);
});

route::resource('/video',ResourceForVideo::class);

