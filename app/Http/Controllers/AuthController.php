<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;

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
        $user = DB::table('tb_admin')->where(
            'username' ,'=',$request->post('username'))
        ->where(
            'password' ,'=',$request->post('password')
        );
       if($user->count() > 0) {
           session()->put("username", "odada");
           return redirect("admin/dashboard");
       } else {
           Session::flash("messages", 'Login gagal username dan password salah');
           return redirect("login");
       }

    }

}
