<?php

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
//     return view('');
// })->name('main');

// Mainnews

use App\Mail\NewarticleMail;

// Route::get('/email', function () {

//     Mail::to('RikkeiSolfNew@Rikkeisolf.com')->send(new NewarticleMail());

//     return new NewarticleMail;
// })->name('NewArticle Send mail');



//Login Finish !!!
Route::get('/hom', function () {
    return view('/user');
})->name('main');

// Route::get('/users_manager', function () {
//     return view('user_manager.showuser');
// })->name('main');

Route::resource('dashboard','DashboardController');

Route::resource('users','UserContoller');

Route::resource('populararticle','PopularArticleController');

Route::resource('type','TypeController');

Route::get('/user/status', function () {
    return view('layouts');
})->name('main');

// steps-register/pic

Route::get('/test', function () {
    return view('user.index2');
})->name('main');

// profile upload URL
// Route::post('/steps-register/pic','RegisterController@uploadImage');

/*Route::get('/login', function () {
    return view('auth.login');
});*/

Route::get('/login','ArticleController@Login');

//seaech
Route::get('/searchuser','UserContoller@searchuser');
Route::get('/searchvideo','VideoController@searchvideo');
Route::get('/searchcategorys','CategoryController@searchcategorys');
Route::get('/searcharticle','ArticleController@searcharticle');
Route::get('/searchtype','TypeController@searchtype');
Route::get('/searchpopulararticle','PopularArticleController@searchpopulararticle');
Route::get('/searchshowarticle','ShowarticleController@searchshowararticle');
Route::get('/searchshowvideo','ShowarticleController@searchshowvideo');




Auth::routes();

Route::resource('articles','ArticleController');
Route::resource('videos','VideoController');

Route::resource('categorys','CategoryController');

Route::group(['middleware' => ['auth']], function () {
Route::post('favorite/{article}/add','FavoriteController@add')->name('article.favorite');
});

Route::resource('/','ShowarticleController');
Route::resource('profile','ProfileController');


Route::get('user/{user}',  ['as' => 'users.edit', 'uses' => 'ProfileController@edit']);
Route::patch('user/{user}/update',  ['as' => 'users.update', 'uses' => 'ProfileController@update']);


Route::get('/article_show/{id}','ShowarticleController@show');
Route::get('/video_show/{id}','VideoController@ShowVideo');
Route::get('/news','ShowarticleController@showarticle');
Route::get('/video_all','ShowarticleController@showvideo_all');
Route::get('/category/{id}','ShowarticleController@showarticle_category');
Route::get('/showcontact','ShowarticleController@showcontact');




Route::post('favorite/{article}', 'ShowarticleController@favoriteArticle');
Route::post('unfavorite/{article}', 'ShowarticleController@unFavoriteArticle');

Route::get('my_favorites', 'UserContoller@myfavorites')->middleware('auth');

Route::get('test2', function(){
    return view('test2');
});

Route::resource('/rating','RatingController');

Route::get("/vote_popular/{id}","PopularArticleController@update_popular");

Route::get('/edit_show/{id}',"PopularArticleController@edit_show");


// only authenticated users
Route::group( ['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index');

    // practicing using forms for sending data to the DB & populating form fields with DB data
    Route::get('profile/{id}', 'UserController@edit1');
    Route::post('profile/{id}', 'UserController@update1');

});

