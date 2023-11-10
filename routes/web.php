<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BanerController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\GozreashController;
use App\Http\Controllers\site\siteController;
use App\Http\Controllers\site\searchController;
use App\Http\Controllers\site\BasketController;
use App\Http\Controllers\site\BasketCountController;
use App\Http\Controllers\site\tableBasketController;
use App\Http\Controllers\site\CheckOutController;
use App\Http\Controllers\site\PurchasesController;



//Route::get('/', function () {
    //return view('welcome');


//});

Route::get('/',[AdminController::class, 'index']);

Route::resource('/admin/category',CategoryController::class);

Route::resource('/book',BookController::class);

Route::resource('/video',VideoController::class);

Route::resource('/slider',SliderController::class);

Route::resource('/baner',BanerController::class);

Route::resource('/discount',DiscountController::class);

Route::resource('/gozaresh',GozreashController::class);









Route::get('/', [siteController::class, 'index']);

Route::get('/category/{menu}', [siteController::class, 'menu']);

Route::get('/BookSingle/{id}', [siteController::class, 'BookSingleControll']);

Route::get('/VideoSingle/{id}', [siteController::class, 'VideoSingleControll']);

Route::resource('/search',searchController::class);

Route::get('/VideoSingleDisCount/{id}', [siteController::class, 'VideoSingleDisCount']);

Route::resource('/basket',BasketController::class);

Route::resource('/basketdiscount',BasketCountController::class);

Route::resource('/tablebasket',tableBasketController::class);

Route::get('/checkout',[CheckOutController::class, 'store']);

Route::get('/purchases',[PurchasesController::class,'index']);



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
