<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\UserResource;
use App\Models\User;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    use JsonTrait;

    public function register(array $data)
    {
       return User::create($data);
    }

    public function login(array $data)
    {
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $user = Auth::user();
            return $this->whenDone([
                'token' => 'Bearer '.$user->createToken('MyApp')->plainTextToken,
                'user' => new UserResource($user)
            ]);
        }
        else{
            return $this->whenError('Error Try Again Later');
        }
    }

    public function updateProfile(array $data)
    {
        User::where('id',auth()->user()->id)->update($data);
        return $this->whenDone([
            'user' => new UserResource(auth()->user()),
        ]);
    }
}
