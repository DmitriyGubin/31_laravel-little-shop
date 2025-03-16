<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //логин - dimas, пароль - 1Aa$$$#
    public function Log_In(Request $request)
    {
        $formFields = [
            'name' => trim($request->login),
            'password' => trim($request->password)
        ];

        $flag = false;

        if(Auth::attempt($formFields,true))
        {
            $flag = true;
        }
        
        return response()->json([
            'chek_user'=>$flag
          ]);
    }

    public function Log_Out()
    {
        Auth::logout();
        return redirect()->route('orders');
    }
}
