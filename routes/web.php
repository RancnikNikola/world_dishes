<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [MealController::class, 'index']);
Route::get('/meals/{meal:title}', [MealController::class, 'show']);

// Route::get('/', function () {
//     return redirect()->route('home-locale', app()->getLocale());
// })->name('home');

// Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
//     Route::get('/', 'HomeController@index')->name('home-locale');

//     Route::get('article/{id}', 'HomeController@article')->name('article');
// });