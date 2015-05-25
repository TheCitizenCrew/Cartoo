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

Route::get('oauth/facebook/authorize', function() {

	return OAuth::authorize('facebook');
});

Route::get('oauth/facebook/login', function() {

	try {
		OAuth::login('facebook', function($user, $details) {
			
			//error_log( 'USER:');
			//error_log( var_export($user,true));
			//error_log( 'DETAILS:');
			//error_log( var_export($details,true));

			$user->name = $details->nickname ;
			$user->email = $details->email ;
			$user->first_name = $details->firstName ;
			$user->last_name = $details->lastName ;
			$user->profile_image = $details->imageUrl ;

			$raw = $details->raw();
			if( isset($raw['gender']) )
				$user->gender = $raw['gender'];
			if( isset($raw['locale']) )
				$user->locale = $raw['locale'];
			$user->save();

		});

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
