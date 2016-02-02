<?php

/*
 * |--------------------------------------------------------------------------
 * | Routes File
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you will register all of the routes in an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get( '/', function ()
{
	return view( 'welcome' );
} );

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | This route group applies the "web" middleware group to every route
 * | it contains. The "web" middleware group is defined in your HTTP
 * | kernel and includes session state, CSRF protection, and more.
 * |
 */

Route::group( [ 
	'middleware' => [ 
		'web' 
	] 
], function ()
{
	
	Route::get( '/cartoo', function ()
	{
		return view( 'cartoo' );
	} );

	Route::group( [
			'prefix' => 'oauth'
	], function ()
	{
		// Redirect to Facebook for authorization
		Route::get( 'facebook/authorize', function ()
		{
			return SocialAuth::authorize( 'facebook' );
		} );
		// Facebook redirects here after authorization
		Route::get( 'facebook/login', function ()
		{
			// Automatically log in existing users
			// or create a new user if necessary.
			SocialAuth::login( 'facebook' );
			// Current user is now available via Auth facade
			$user = Auth::user();
			return Redirect::intended();
		} );
		
	});

	/*
	Route::controllers([
		//'auth' => 'Auth\AuthController',
		//'password' => 'Auth\PasswordController',
		//'oauth' => 'Auth\OAuthController',
		//'api/posts' => 'Api\PostsController'
	]);*/

} );
