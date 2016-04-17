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

Route::get('/contact', function () {
    return 'contact';
});

Route::get('/product', function () {
    $product = App\products::find(1);
    $product->name;
});

Route::get('/orderaa', function () {
    $orders = App\Orders::all();

    foreach ($orders as $order){
        $product = App\User::find($order->name);
        echo $product->name;
    }
});


Route::group(['middleware' => 'web'], function (){

    Route::auth();
    Route::get('/', function(){
        return view('welcome');
    });

    //auth routes
    Route::get('/orders', function () {
        $user = App\User::find(Auth::id());
        $data = array(
            'user' => $user,
            'orders' => $user->orders,
        );
        return view('orders', $data);
    })->middleware('auth');

    Route::get('/admin', function(){
        return view('/auth.admin.index');
    });

    Route::get('/form', function(){
        return view('/form');
    });

    Route::resource('product', 'ProductController');
    Route::get('/admin/products', 'ProductController@index')->middleware('auth');

    //admin routes
    Route::get('gang', function (){
        echo 'gang ';
    })->middleware('isAdmin');

    Route::get('/home', 'HomeController@index');
});





