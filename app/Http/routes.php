<?php

use Illuminate\Support\Facades\Log;
use Monolog\Logger;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
 * Auth Facebook
 * https://github.com/adamwathan/eloquent-oauth
 */

Route::get('facebook/authorize', function() {

	return OAuth::authorize('facebook');
});

Route::get('facebook/login', function() {

	try {
		OAuth::login('facebook');

	} catch (ApplicationRejectedException $e) {
		// User rejected application
	} catch (InvalidAuthorizationCodeException $e) {
		// Authorization was attempted with invalid
		// code,likely forgery attempt
	}

	// Current user is now available via Auth facade
	$user = Auth::user();

	return Redirect::intended();
});
