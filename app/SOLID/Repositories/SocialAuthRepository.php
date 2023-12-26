<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\UserResource;
use App\Models\Provider;
use App\Models\User;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthRepository
{
    use JsonTrait;
    public function callbackGithub()
    {
        $user = Socialite::driver('github')->stateless()->user();
        $email = User::where('emails',$user->email)->first();
        if(!$email){
            $userData =  User::create([
                'name' => $user->name,
                'emails' => $user->email,
            ]);
            Provider::create([
                'user_id' => $userData->id,
                'provider' => 'github',
                'provider_id' => $user->id,
            ]);
            return $this->whenDone([
                'token' => 'Bearer '.$userData->createToken('MyApp')->plainTextToken,
                'user' => new UserResource($userData)
            ]);
        }
        Auth::login($email);
        $userData = Auth::user();
        $provider = Provider::where('user_id',$userData->id)->where('provider','github')->count() == 0 ?
            Provider::create([
                'user_id' => $userData->id,
                'provider' => 'github',
                'provider_id' => $user->id,
            ]) : '';
        return $this->whenDone([
            'token' => 'Bearer '.$userData->createToken('MyApp')->plainTextToken,
            'user' => new UserResource($userData)
        ]);
    }

    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $email = User::where('emails',$user->email)->first();
        if(!$email){
            $userData =  User::create([
                'name' => $user->name,
                'emails' => $user->email,
            ]);
            Provider::create([
                'user_id' => $userData->id,
                'provider' => 'google',
                'provider_id' => $user->id,
            ]);
            return $this->whenDone([
                'token' => 'Bearer '.$userData->createToken('MyApp')->plainTextToken,
                'user' => new UserResource($userData)
            ]);
        }
        Auth::login($email);
        $userData = Auth::user();
        $provider = Provider::where('user_id',$userData->id)->where('provider','google')->count() == 0 ?
            Provider::create([
                'user_id' => $userData->id,
                'provider' => 'google',
                'provider_id' => $user->id,
            ]) : '';
        return $this->whenDone([
            'token' => 'Bearer '.$userData->createToken('MyApp')->plainTextToken,
            'user' => new UserResource($userData)
        ]);
    }
}
