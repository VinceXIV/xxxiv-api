<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $user = User::where('email', request('email'))->first();

        if(Hash::check(request('password'), $user->password)){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }

    public function signup(){

        validator(request()->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $user = User::factory()->create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))        
        ]);

        if($user){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }
}
