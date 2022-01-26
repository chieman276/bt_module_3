<?php

use App\Http\Controllers\CategoryController;
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
Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/home', function() {
//     return view('BE.home');
// });
// Route::get('/khach-hang', function(){
//     return view('customer');
// });
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
        && $request->password == 'admin') {
        return view('welcome_admin');
    }
    return view('login_error');
});
Route::get('/greeting', function() {
    echo "Hello wordl";
});
Route::get('/url', function () {

    return view('show_discount_amount', compact
    (['discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent']));
    
});
// route::get('/user/{name}/{age?}' , function($name,$age) {
//     echo $name.$age;
// });
// Route::post('/user/{name}/{age?}', function($name, $age = null) {
// })->where(['name'=>'[a-z]+', 'age' => '[0-9+']);

Route::post('/user/{name}/{age?}' , function($name,$age = null) {
echo $name;
echo $age;
})->where(['name'=>'[a-z]+', 'age'=>'[0-9]+']);

Route::get('/', function () {
    echo "<h2>This is Home page</h2>";
});
Route::get('/about', function () {
    echo "<h2>This is About page</h2>";
});
Route::get('/contact', function () {
    echo "<h2>This is Contact page</h2>";
});
Route::get('/user', function () {
    return view('user', ['name'=>'Masud Alam']);
});
Route::get('/user/{name}', function ($name) {
    echo "<h1> User name is  $name </h1>";
});
Route::get('/sv/{name?}', function ($name = 'CodeGym') {
    echo "<h1> Học viên  $name </h1>";
});
Route::get('/','App\Http\Controllers\HomeController@index' );




