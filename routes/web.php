<?php

use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => ['role:admin']], function () {
		Route::resource('user', 'UserController', ['except' => ['show']]);
		Route::post('/formulario/{proposta}', 'ManipulationProposalController@alterProposal')->name('alterProposal');
		Route::get('/formulario/{proposta}/download', 'ManipulationProposalController@downloadDocument')->name('download');
		// Simulator
		Route::get('/simulador', 'SimulatorController@index')->name('simulador');
		Route::get('/simulador/config', 'SimulatorController@ShowAndEditConfiguration')->name('simuladorConfig');
		Route::get('/simulador/update', 'SimulatorController@update')->name('simulatorUpdate');
	});
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('/formulario', 'ProposalController');

	// Profile
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// Notifications
	Route::get('/notifications', 'NotificationsController@notifications');
	Route::put('/notification-read', 'NotificationsController@markAsRead');
	Route::put('/notification-readall', 'NotificationsController@markAllRead');
	// obs obsDestroy
	Route::post('/formulario/{proposta}/obs', 'ObsProposalController@store')->name('obsStore');
	Route::delete('/formulario/{proposta}/obs/{id}', 'ObsProposalController@destroy')->name('obsDestroy');

	// requests inputs range simulator
	Route::get('/simulator/getValueRangeLoan', 'SimulatorController@getValueRangeLoan');
	Route::get('/simulator/getValueRangeTimes', 'SimulatorController@getValueRangeTimes');
});
