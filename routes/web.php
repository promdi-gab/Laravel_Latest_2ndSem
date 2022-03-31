<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [
//       'uses' => 'ItemController@Index',
//             'as' => 'Item.index'
//     ]);
Route::get('/', [ItemController::class, 'index']);
Route::get('/index', [ItemController::class, 'index']);
Route::get('/signup', [
        'uses' => 'App\Http\Controllers\UserController@getSignup',
        'as' => 'user.signup',
    ]);
    Route::post('/signup', [
        'uses' => 'App\Http\Controllers\UserController@postSignup',
        'as' => 'user.signup',
    ]);

    Route::get('profile', [
        'uses' => 'App\Http\Controllers\UserController@getProfile',
        'as' => 'user.profile',
    ]);
     Route::get('/signin', [
        'uses' => 'App\Http\Controllers\UserController@getSignin',
        'as' => 'user.signin',
    ]);
     Route::post('/signin', [
        'uses' => 'App\Http\Controllers\UserController@postSignin',
        'as' => 'user.signin',
    ]);
     Route::get('/logout', [
        'uses' => 'App\Http\Controllers\UserController@getLogout',  
        'as' => 'user.logout',
    ]);
     Route::get('shopping-cart', [
    'uses' => 'App\Http\Controllers\ItemController@getCart',
    'as' => 'item.shoppingCart'
    ]);

     Route::get('shopping-cart', [
    'uses' => 'App\Http\Controllers\ItemController@getCart',
    'as' => 'item.shoppingCart'
    ]);

    Route::get('checkout',[
        'uses' => 'App\Http\Controllers\ItemController@postCheckout',
        'as' => 'checkout',
        'middleware' =>'auth'
    ]);

    Route::get('add-to-cart/{id}',[
        'uses' => 'App\Http\Controllers\ItemController@getAddToCart',
        'as' => 'item.addToCart'
    ]);


    Route::get('remove/{id}',[
        'uses'=>'App\Http\Controllers\ItemController@getRemoveItem',
        'as' => 'item.remove'
    ]);

    Route::get('reduce/{id}',[
        'uses' => 'App\Http\Controllers\ItemController@getReduceByOne',
        'as' => 'item.reduceByOne'
    ]);

    Route::get('index', [
        'uses' => 'App\Http\Controllers\ItemController@index',
        'as' => 'item.index',
    ]);
// Route::get('/signup', [UserController::class, 'getSignup']);
// Route::get('/signup', 'App\Http\Controllers\UserController@getSignup')->middleware('guest');
// Route::post('/signup', 'App\Http\Controllers\UserController@postSignup')->middleware('guest');
// Route::get('/profile', 'App\Http\Controllers\UserController@getProfile');
 // Route::get('/signup', [
 //         'uses' => 'UserController@getSignup',
 //         'as' => 'user.signup',
 //        'middleware' => 'guest'
 //  ]);
//     Route::post('/signup', [
//         'uses' => 'userController@postSignup',
//         'as' => 'user.signup',
//         'middleware' => 'guest'
//     ]);

//     Route::get('profile', [
//         'uses' => 'UserController@getProfile',
//         'as' => 'user.profile',
//     ]);