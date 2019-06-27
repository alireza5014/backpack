<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(Request $request)
    {

         $data = [
        ];

        return web_response($request,'user', $data);

    }
}
