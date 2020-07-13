<?php

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
Auth::routes();

Route::get('/', 'frontend\SiteController@index')->name('index');
Route::get('/home', 'frontend\SiteController@index')->name('home');
Route::get('/frontend/{slug}', 'frontend\FrontendController@pages');
Route::get('/frontend/{slug}/{key}', 'frontend\FrontendController@page');



Route::get('/admin','backend\AdminController@loginForm')->name('admin');
Route::get('/signup','backend\AdminController@signupForm')->name('signup');
Route::post('/logadmin', 'backend\AdminController@login');
Route::post('/signup', 'backend\AdminController@signup');


Route::group(['middleware' => 'admin'], function () {
	Route::get('/dashboard','backend\AdminController@dashboard')->name('dashboard');
    Route::resource('/users','backend\UserController');
    Route::get('/users/status/{id}','backend\UserController@status');
	Route::resource('/menu','backend\MenuController');
    Route::get('/menu/status/{id}','backend\MenuController@status');
    Route::get('/menu/up/{id}','backend\MenuController@up');
    Route::get('/menu/down/{id}','backend\MenuController@down');
	Route::resource('/pages','backend\PagesController');
	Route::get('/pages/up/{id}','backend\PagesController@up');
	Route::get('/pages/down/{id}','backend\PagesController@down');
	Route::get('/pages/status/{id}','backend\PagesController@status');
	Route::resource('/menpage','backend\MenupagesController');
	Route::get('/menu/page/{id}','backend\MenupagesController@index');
	Route::resource('/lang','backend\LangController');
	Route::get('/lang/status/{id}','backend\LangController@status');
	Route::resource('/temp','backend\TemplateController');
	Route::resource('/title','backend\TitleController');
	Route::resource('/text','backend\TextController');
	Route::resource('/settings','backend\SettingsController');
	Route::resource('/setisettings','backend\SitesettingsController');
	Route::get('/users/profile/{id}',['as'=> 'profile','uses'=>'backend\UserController@profile']);

});
Route::get('{slug}', 'frontend\StandardController@index')->where('slug', '[A-Za-z0-9_\-]+');

// Route::get('/dashboard','backend\AdminController@dashboard')->name('dashboard')->middleware('admin');

// Route::resource('/users','backend\UserController');
// Route::resource('/menu','backend\MenuController');
// Route::resource('/menpage','backend\MenupagesController');
// Route::resource('/lang','backend\LangController');
// Route::resource('/pages','backend\PagesController');
// Route::resource('/temp','backend\TemplateController');
// Route::resource('/title','backend\TitleController');
// Route::resource('/text','backend\TextController');
// Route::resource('/settings','backend\SettingsController');

// Route::get('/users/profile/{id}',['as'=> 'profile','uses'=>'backend\UserController@profile']);
