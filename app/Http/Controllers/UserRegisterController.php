<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    //

    public function register(Request $request)
    {
        $user_reg = new User();

        $user_reg->name = $request->name;
        $user_reg->email = $request->email;
        $user_reg->password = bcrypt($request->password);
        $user_reg->status = $request->status;
        $user_reg->is_admin = $request->is_admin;

        $user->save();
    }
}
