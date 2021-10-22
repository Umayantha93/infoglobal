<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;

class UserRegisterController extends Controller
{
    //

    public function Register(Request $request)
    {

        // $uploaded_files = $request->file->store('public/uploads');

        $user_reg = new UserRegister();

        $user_reg->id_number = $request->id_number;
        $user_reg->person_name = $request->person_name;
        $user_reg->date_of_birth = $request->date_of_birth;
        $user_reg->contact_number = $request->contact_number;
        $user_reg->age = $request->age;
        $user_reg->address = $request->address;
        $user_reg->religion = $request->religion;
        $user_reg->nationality = $request->nationality;
        $user_reg->image_path = $request->image_path;
  
        $user_reg->save();

        return response()->json([
            'message' => "succesfully uploaded"
        ]);
    }

    public function list(){
        $user = UserRegister::all('id_number','person_name','date_of_birth','contact_number','age','address'
        ,'religion','nationality','image_path');

        return $user;
    }

    public function search($search){

        return UserRegister::where("person_name","like","%".$search."%")->
        orWhere("address","like","%".$search."%")->
        orWhere("id_number", "like", "%".$search."%")->
        orWhere("date_of_birth","like","%".$search."%")->
        orWhere("contact_number", "like", "%".$search."%")->
        orWhere("age","like","%".$search."%")->
        orWhere("religion", "like", "%".$search."%")->
        orWhere("nationality", "like", "%".$search."%")
        ->get();
    }

    public function dashboard(){

    }
}
