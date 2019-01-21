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

// Route::get('/', 'HomeController@index')->name('home');

// authenticate admin
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login/', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
//Route::get('admin/register/', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('admin/register/', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');
//

//admin functional
Route::get('admin', function(){
    return redirect()->route('order.index');
});

Route::resources([
    'admin/product' => 'AdminProductController',
    'admin/order' => 'AdminOrderController',
    'admin/news' => 'AdminNewsController'
]);

/*---frontend---*/
Route::get('/', 'HomeController@index')->name('home');

Route::get('/gioi-thieu-cong-ty', function () {
    return view('introCompany');
});