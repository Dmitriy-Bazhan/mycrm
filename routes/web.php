<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\MainPageController;
use App\Http\Controllers\Site\CategoryController;

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

Route::get('/laravel', function () {
    return view('welcome');
});


Route::group([
    'prefix' => get_prefix(),
],
    function () {

        Route::get('/', [MainPageController::class,'index']);

        Route::get('/category', [CategoryController::class,'index']);
//        Route::get('/category/{alias}', 'Site\CategoryController@index');
//
//        Route::get('/products/{categoryAlias}/{parameters?}/{page?}', 'Site\ProductController@index');
//        Route::post('/products/{categoryAlias}/{parameters?}/{page?}', 'Site\ProductController@filter');
//
//        Route::get('product/{id}', 'Site\ProductController@show');

    });
