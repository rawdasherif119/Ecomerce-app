<?php

use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', 'AuthController@register')->name('api.register');
    Route::post('/login', 'AuthController@login')->name('api.login');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'stores',], function () {
       Route::group(['middleware' =>'UserType:' . UserType::MERCHANT], function () {
          Route::post('/', 'StoreController@store');
          Route::put('/{store}', 'StoreController@update')->middleware('can:update,store');
 
          Route::group(['prefix' => '{store}/products'], function () {
            Route::post('/', 'ProductController@store')->middleware('can:createProduct,store');
            Route::put('/{product}', 'ProductController@update');
         });
       });
       Route::get('/{store}', 'StoreController@show');
       Route::get('/', 'StoreController@index');
    });

    Route::group(['prefix' => '/users/products','middleware' =>'UserType:' . UserType::BUYER], function () {
       Route::post('/{product}', 'UserProductController@store');
       Route::delete('/{product}', 'UserProductController@delete');
    });

});
