<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
      return view('admin.user.login',[
          'title' => 'Dang nhap admin'
      ]);
    }

    public function store(Request $request)
    {

           $this -> validate($request,[
                  'email' => 'required | email:filter',
               'password' => 'required'
           ]);

           if (Auth::attempt(['email' => $request ->input('email'),
               'password'=> $request ->input('password')
           ],$request -> input('remember'))){



           }
        return redirect() -> route('admin');
        return redirect()->back();

    }
}
