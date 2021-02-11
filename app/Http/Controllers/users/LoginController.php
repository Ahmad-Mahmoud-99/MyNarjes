<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('layouts.login');
    }
    public function Login(){

         
        // $remember_me=$request->has('remember_me')?'true':'false';
        if(auth()->guard('admin')->attempt(['email'=>$request->input('username'),'password'=>$request->input('password')]) ){
            return redirect()->route('admin.dashboard')->with(['success'=>'تم الدخول بنجاح']);
        }
        return redirect()->back()->with(['error'=>'هناك خطأ في البيانات']);
    }
    
}
