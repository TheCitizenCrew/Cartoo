<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Auth;
//use AdamWathan\EloquentOAuth\Facades\OAuth;

class PostsController extends Controller {

	public function __construct()
	{
	}

	public function getFindInBbox()
	{
		$posts = array();
				return response()->json( $posts );
	}

}
