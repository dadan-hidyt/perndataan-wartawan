<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = array(
            "title" => 'auth'
        );
        return view("auth.login", $data);
    }

}
