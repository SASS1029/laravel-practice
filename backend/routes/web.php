<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;//ないと動かない　。post controllerの居場所を記述している
use App\Http\Controllers\Usercontroller;

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

Route::get('/', function () { //--->resources/views/welcome.blade.phpに飛ぶ　（ホームページ）
    return view('welcome');
});

/**** Single route ****/ 
Route::get('/hello/user' , function() {
    return "Hello world!";
});

Route::get('/satoshi' , function() {
    echo "My name is SATOSHI";
});

/**** Route Parameters ***/ 
Route::get('/posts/{post_id}' , function($post_id) { //URLは＄ではなく{}にするにする
    return "This is Post $post_id";                  //URLとfunctionの引数は違くてもいいが複雑になるのでお勧めしない
});

Route::get('/posts/{username}/{post_id}' , function($username,$post_id) {
    return "Post $post_id. This is the post of $username";
});

/****  Nameing Routes ***/ 
Route::get('/dashboard/adimin' , function() {
    return "Welcome admin!";
} )->name('admin');//name() - to create a name for the route.

Route::get('/dashboard/subscriber' ,function(){
    return "Welcome subscriver!";
})->name('sub');

Route::get('/login' , function() {
    return redirect()->route('sub'); //localhost/loginとURLを打ったらー＞localhost/dashboard/subscriverに飛ぶ
});                               // route() - to access the route using the name().




/*** Route-Controller ***/  //上からPost Controllerに行く過程が増えた
Route::get('/post' , [PostController::class, 'index']);  //1

Route::get('/view-post/{post_id}', [PostController::class, 'viewPost']);//2

Route::get('user/{username}/view-post/{post_id}', [PostController::class, 'viewPosts']); //3

//route->controller->view　　と三段階になった 
Route::get('/view-all' , [PostController::class, 'viewallPosts']);//4、６、7

Route::get('/view-post/{username}/{post_id}' , [PostController::class, 'viewPost']);//5

Route::get('/show/{username}' , [PostController::class, 'show']); //Activity１.２



// Model  Elopuent
Route::get('/store', [PostController::class, 'store']);

Route::get('/store/create', [PostController::class, 'storeCreate']);

Route::get('/read-all', [PostController::class, 'index']);

Route::get('/read/{post_id}', [PostController::class, 'index1']);

Route::get('/read-where/{post_id}', [PostController::class, 'showWhere']);

Route::get('/update/{post_id}', [PostController::class, 'update']);

Route::get('/destroy/{post_id}', [PostController::class, 'destroy']);



// user　/ eloquent:relationships
Route::get('/show-phone/{user_id}' , [Usercontroller::class,'showUserPhone']); 