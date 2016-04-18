<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile()
    {
        return view('auth.user.profile', ['user' => User::findOrFail(Auth::id())]);
    }


    public function editProfile()
    {
        return view('auth.user.edit', ['user' => User::findOrFail(Auth::id())]);
    }
}