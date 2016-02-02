<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;

class PoiController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Doc:
     * - https://laravel.com/docs/5.2/requests#files
     * - http://api.symfony.com/3.0/Symfony/Component/HttpFoundation/File/UploadedFile.html
     * 
     * @param Request $request
     * @return string
     */
	public function addPoi( Request $request )
	{
		if( $request->file('image') !== null && ! $request->file('image')->isValid())
		{
		}
		//return response()->json( $filename );
		return 'Ok';
	}

}
