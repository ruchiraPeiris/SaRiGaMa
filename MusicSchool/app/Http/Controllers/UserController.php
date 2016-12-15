<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController
{
    public function login(Request $request){
        $user_name = $request['user_name'];
        $password = $request['password'];

        $user = User::authenticate($user_name,$password);

        if ($user!=null){
            Auth::login($user);

//            dd(Auth::user());
            if ($user->account_type == 'A'){
                return redirect()->route('admin');
            }else{
                return redirect()->route('teacher');
            }

        }else{
            return redirect()->route('login');

        }

    }
}
