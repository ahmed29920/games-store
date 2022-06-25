<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\SocialAccountService;


class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccountService $profileService , $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();   
        }catch(\Exception $e){
            return redirect()->to('login');
        }
    
        $authUser = $profileService->findOrCreate($user , $provider);
        
        // auth()->login($authUser, true);
        auth()->login($authUser, true);
        // Auth::login($authUser, $remember = true);
        return redirect()->to('/');
    }

    // ty{}
}
