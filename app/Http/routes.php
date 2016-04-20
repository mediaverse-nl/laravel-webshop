<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
    return view('/home');
});

Route::get('contact', function () {
    return 'contact';
});
Route::resource('products', 'ProductController');

//middleware
Route::group(['middleware' => 'web'], function (){

    //auth routes
    Route::auth();
    Route::get('profile', ['middleware' => 'auth', 'uses' => 'UserController@showProfile'])->middleware('auth');
    Route::get('orders', function () {
        $user = App\User::find(Auth::id());
        $data = array(
            'user' => $user,
            'orders' => $user->orders,
        );
        return view('orders', $data);
    })->middleware('auth');

    //Route::get('/profile', function(){
     //   $user = App\User::find(Auth::id());
     //   return view('/auth.user.profile')->with('user', $user);
    //})->middleware('auth');

    //admin routes
    Route::get('admin', function(){
        return view('auth.admin.index');
    })->middleware('isAdmin');
    Route::get('admin/products', 'ProductController@index')->middleware('isAdmin');

    //Route::post('/product/add', array('as' => 'produts', 'uses' => 'ProductController@store'))->middleware('auth');

});





