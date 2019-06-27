<?php

namespace App\Http\Controllers\User;

use App\Analyze;
use App\Http\Requests\CreateUserRequest;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function getLogout()
    {


        Auth::guard('user')->logout();

        return redirect()->guest(route('user.login'));

//        Auth::logout('admin');
//
//        return back();

    }

    public function modify()
    {

    }


}
