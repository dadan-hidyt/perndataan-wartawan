<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = array(
            "title" => 'auth'
        );
        return view("auth.login", $data);
    }
    public function loginAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'required' => ':attribute wajib di isi!'
        ]);
        if ($request->get("_token") !== csrf_token()) {
            throw new TokenMismatchException();
        }
        $data = array(
            "username" => $request->get('username'),
            "password" => $request->get('password')
        );
        if(Auth::attempt($data)) {
              session()->
        } else{
           session()->flash("messages", "Login gagal username dan password salah");
            return redirect('/login');
        }
    }

}
