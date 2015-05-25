<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use AdamWathan\EloquentOAuth\Facades\OAuth;

/**
 * OAuth routes handled with with https://github.com/adamwathan/eloquent-oauth
 */
class OAuthController extends Controller
{

    public function __construct()
    {}

    public function getFacebookAuthorize()
    {
        return OAuth::authorize('facebook');
    }

    public function getFacebookLogin()
    {
        try {
            OAuth::login('facebook', function ($user, $details) {
                
                // error_log( 'USER:');
                // error_log( var_export($user,true));
                // error_log( 'DETAILS:');
                // error_log( var_export($details,true));
                
                $user->name = $details->nickname;
                $user->email = $details->email;
                $user->first_name = $details->firstName;
                $user->last_name = $details->lastName;
                $user->profile_image = $details->imageUrl;
                
                $raw = $details->raw();
                if (isset($raw['gender']))
                    $user->gender = $raw['gender'];
                if (isset($raw['locale']))
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
    }

    public function getGoogleAuthorize()
    {
        return OAuth::authorize('google');
    }

    public function getGoogleLogin()
    {
        try {
            OAuth::login('google', function ($user, $details) {
                
                // error_log( 'USER:');
                // error_log( var_export($user,true));
                // error_log('DETAILS:');
                // error_log(var_export($details, true));
                
                $user->name = $details->nickname;
                $user->email = $details->email;
                $user->first_name = $details->firstName;
                $user->last_name = $details->lastName;
                $user->profile_image = $details->imageUrl;
                
                $raw = $details->raw();
                if (isset($raw['gender']))
                    $user->gender = $raw['gender'];
                if (isset($raw['locale']))
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
    }
}
