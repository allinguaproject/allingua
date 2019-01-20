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


/*
    Sites available for guests
*/


   
Route::get('/', 'GuestController@index')->name('home')->middleware('guest');
Route::get('/home', 'GuestController@index')->name('home');
Route::get('/playGame/{index}', 'GuestController@playGame')->name('play.game');
Route::get('/getGame', 'GuestController@getGame')->name('get.game');

/*
    Sites available for  basic member
*/
Route::post('/load/sidebar', 'HomeController@loadSideBar')->name('load.sideBar');


/*
    Sites available for  basic members
*/



/*
    Sites available for  premium members
*/



/*
    Sites available for  admin
*/
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');






Route::get('/lexikon', 'HomeController@lexikon')->name('lexikon');
Route::get('/alt', 'HomeController@alt')->name('alt');
Route::get('/getSolutions/{index}', 'HomeController@getSolutions')->name('getSolutions');


Route::post('/load/practice', 'HomeController@loadPractice')->name('load.practice');
Route::get('/lektion/{lection}', function($lection) {
    return View::make('lex_html.'.$lection);
});
Route::get('/getimage/{img}', 'HomeController@getImage')->name('get.image');
Route::post('/load/table', 'HomeController@loadPracticeTable')->name('load.table');
Route::get('/return/{html}', function($html) {
    $str=file_get_contents(base_path("resources/views/html/".$html));
    return $str;
})->name('load.html');

