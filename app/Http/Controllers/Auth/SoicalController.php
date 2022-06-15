<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SoicalController extends Controller
{
    CONST GOOGLE_TYPE   = 'google' ;
    CONST FACEBOOK_TYPE = 'facebook' ;

    // Google Functions
    public function googleRedirect(){

        return Socialite::driver( static::GOOGLE_TYPE )->redirect();

    }

    public function googleCallback(){

        try{

            $user      = Socialite::driver( static::GOOGLE_TYPE )->user();
            $userExist = User::where('oauth_id',$user->id)->where('oauth_type', static::GOOGLE_TYPE )->first();

            if( $userExist ){
                Auth::login($userExist);
                return redirect()->route('home');
            }else{

                $newUser = User::create([
                    'name'       => $user->name,
                    'email'      => $user->email,
                    'password'   => Hash::make( $user->id ),
                    'oauth_type' => static::GOOGLE_TYPE,
                    'oauth_id'   => $user->id,
                ]);

                Auth::login($newUser);
                return redirect()->route('home');


            }

        }catch( Exception $e ){
            dd($e);
        }

    }

    // Google Functions
    public function facebookRedirect(){

        return Socialite::driver( static::FACEBOOK_TYPE )->redirect();

    }

    public function facebookCallback(){

        try{

            $user      = Socialite::driver( static::FACEBOOK_TYPE )->user();
            $userExist = User::where('oauth_id',$user->id)->where('oauth_type', static::FACEBOOK_TYPE )->first();

            if( $userExist ){
                Auth::login($userExist);
                return redirect()->route('home');
            }else{

                $newUser = User::create([
                    'name'       => $user->name,
                    'email'      => $user->email,
                    'password'   => Hash::make( $user->id ),
                    'oauth_type' => static::FACEBOOK_TYPE,
                    'oauth_id'   => $user->id,
                ]);

                Auth::login($newUser);
                return redirect()->route('home');

            }

        }catch( Exception $e ){
            dd($e);
        }

    }




}
