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

use App\Notifications\NotificationProposals;
use App\User;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => ['role:admin']], function () {
		Route::resource('user', 'UserController', ['except' => ['show']]);
		Route::post('/formulario/{proposta}', 'ManipulationProposalController@alterProposal')->name('alterProposal');
	});
	
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('/formulario', 'ProposalController');
});
Route::get('/notifications', 'NotificationsController@notifications');
