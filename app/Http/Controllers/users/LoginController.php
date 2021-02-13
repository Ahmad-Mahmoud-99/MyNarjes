<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('layouts.login');
    }
    public function Login(LoginRequest $request){

    // $remember_me=$request->has('remember_me')?'true':'false';
   try{
      $username=$request->input('username');
      $pass=$request->input('password');

      $user=Users::where('username',$username)->selection()->first();
      $role_id=$user->role_id;
        if($role_id==1){
            $permetion='admin';
        }else if($role_id==2){
            $permetion='manager';
        }else if($role_id==3){
            $permetion='employee';
        }else if($role_id==4){
            $permetion='accountant';
        }else{
          return redirect()->back()->with(['error'=>'هناك خطأ في البيانات']);
         }


        // return auth()->guard($permetion)->attempt(['username'=>$username,'password'=>$pass]);

          $req=auth()->guard($permetion)->attempt(['username'=>$username,'password'=>$pass]);
        if($req){
            return redirect()->route($permetion.'.dashboard')->with(['success'=>'تم الدخول بنجاح']);
        }
        return redirect()->back()->with(['error'=>'هناك خطأ في كلمة المرور']);



     }catch(\Exception $ex){
        return redirect()->back()->with(['error'=>'هناك خطأ في اسم المستخدم ']);
    }


}
}
