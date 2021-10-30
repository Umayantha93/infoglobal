<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Intervention\Image\ImageServiceProvider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


class UserRegisterController extends Controller
{
    //

    public function register(Request $request)
    {

        // $uploaded_files = $request->file->store('public/uploads');

        error_log($request);

        $user_reg = new UserRegister();

        error_log($request);

        $user_reg->id_number = $request->id_number;
        $user_reg->person_name = $request->person_name;
        $user_reg->date_of_birth = $request->date_of_birth;
        $user_reg->contact_number = $request->contact_number;
        $user_reg->age = $request->age;
        $user_reg->address = $request->address;
        $user_reg->religion = $request->religion;
        $user_reg->nationality = $request->nationality;
        if($request->hasFile("image_path")){
            $img = $request->image_path;
            $img_name = time().'-'.$img->getClientOriginalName();
            Image::make($img)->save(storage_path("app/public/".$img_name));
            $user_reg->image_path = $img_name;
        }
        // $user_reg->image_path = $request->image_path;
  
        if($user_reg->save()){
            return response()->json([
                "data" => $user_reg,
                'message' => "succesfully uploaded"
            ]);
        }else{
            return response()->json([
                "data" => null,
                'message' => "create product failure"
            ]);
        }




    }

    public function list(){
        error_log("..............");
        $users = UserRegister::all('id_number','person_name','date_of_birth','contact_number','age','address'
        ,'religion','nationality','image_path');

        return $users;
    }

    public function search($search){

        error_log($search);
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

    public function userReligion(){
        
        $usersReligion = DB::table('user_registers')->select(DB::raw('count(*) as user_count, religion'))->groupBy('religion')->get();

        return $usersReligion;
    }

    public function userAge(){

        $userAge = DB::table('user_registers')->select(DB::raw('count(*) as user_count, age'))->groupBy('age')->get();

        return $userAge;
    }

    public function userBirthMonth(){

        $userMonth = DB::table('user_registers')->select(DB::raw('count(*) as user_count, date_of_birth'))->groupBy('age')->get();

        return $userMonth;
    }
}
