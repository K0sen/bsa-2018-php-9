<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('currencies', 'CurrencyController', [
    'names' => [
        'index' => 'currency-list',
    ]
]);
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('login/github', 'Auth\GithubLoginController@redirectToProvider')->name('github_login');
Route::get('login/github/callback', 'Auth\GithubLoginController@handleProviderCallback')->name('github_callback');